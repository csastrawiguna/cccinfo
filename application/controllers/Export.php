<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        // Load kabéh nu diperlukeun di awal
        $this->load->dbutil();
        $this->load->library('zip');
        $this->load->helper('file');
        $this->load->library('ftp');
        
        // Atur waktu éksekusi lila bisi datana loba (Unlimited)
        set_time_limit(0);
        ini_set('memory_limit', '512M');
    }

    // *
    //  * Script Utama: Jalankeun via Task Scheduler unggal subuh - Export Daily, Weekly, Monthly
    //  * URL: http://192.168.188.254/cccinfo/index.php/export/auto_backup_gfs
     
    public function auto_backup_gfs() 
    {
        // 1. KONFIGURASI FTP
        $config['hostname'] = '192.168.180.140';
        $config['username'] = 'gay0900276';
        $config['password'] = '2026Februar!'; 
        $config['debug']    = TRUE;

        // Cek koneksi sakaligus connect
        if (!$this->ftp->connect($config)) {
            log_message('error', 'FTP Backup: Gagal konek ka host ' . $config['hostname']);
            die("Gagal konek ka FTP!");
        }

        $yesterday    = date('Y-m-d', strtotime("-1 days"));
        $day_of_week  = date('N'); 
        $day_of_month = date('j');

        // 2. MENENTUKAN JENIS BACKUP & RETENSI
        if ($day_of_month == 1) {
            $sub = "Monthly";
            $retention = 0; 
        } elseif ($day_of_week == 1) {
            $sub = "Weekly";
            $retention = 45; 
        } else {
            $sub = "Daily";
            $retention = 7; 
        }

        // Path Konfigurasi
        $remote_path = "callcenterdata/Cuparsa/DBBackup/CCCInfo/" . $sub . "/"; 
        $zip_name    = "CCCINFO_Backup_" . $sub . "_" . $yesterday . ".zip";
        $local_temp  = FCPATH . "temp/" . $zip_name; // Pastikeun folder 'temp' aya di root CI

        // 3. PROSES NGUMPULKEUN DATA
        $target_dbs = ['default', 'complaint', 'partcode']; // Daptar grup DB di database.php
        
        $master_summary = "--- CCCINFO BACKUP LOG: " . date('Y-m-d H:i:s') . " ---\n";
        $detail_log = "DETAILED BACKUP REPORT [$sub] - DATA: $yesterday\n";
        $detail_log .= "RUNTIME    : " . date('Y-m-d H:i:s') . "\n";
        $detail_log .= "------------------------------------------\n";
        $data_found = false;

        foreach ($target_dbs as $db_group) {
            // Load database dumasar grupna
            $current_db = $this->load->database($db_group, TRUE);
            $tables = $current_db->list_tables();
            
            $detail_log .= "\nDATABASE: " . $db_group . "\n";
            $db_success_count = 0;

            foreach ($tables as $table) {
                if ($table == 'log_export') continue;

                $col = '';
                // Cek kolom di DB nu keur di-loop
                if ($current_db->field_exists('saved_at', $table)) $col = 'saved_at';
                elseif ($current_db->field_exists('input_at', $table)) $col = 'input_at';
                elseif ($current_db->field_exists('updated_at', $table)) $col = 'updated_at';
                elseif ($current_db->field_exists('last_modified_at', $table)) $col = 'last_modified_at';
                elseif ($current_db->field_exists('absent_date', $table)) $col = 'absent_date';
                elseif ($current_db->field_exists('date', $table)) $col = 'date';

                if ($col != '') {
                    $current_db->where("DATE($col)", $yesterday);
                    $query = $current_db->get($table);

                    if ($query->num_rows() > 0) {
                        $csv_data = $this->dbutil->csv_from_result($query);
                        // Ngaran file di jero ZIP ditambahan awalan ngaran DB meh teu bentrok
                        $this->zip->add_data("{$db_group}_{$table}_{$yesterday}.csv", $csv_data);
                        
                        $detail_log .= "[OK] $table: " . $query->num_rows() . " rows\n";
                        $db_success_count++;
                        $data_found = true;
                    }
                }
            }
            // Master log nyatet ringkesan per DB
            $master_summary .= "- " . strtoupper($db_group) . ": " . $db_success_count . " tables backed up.\n";
            // Tutup koneksi DB sanggeus beres loop tabelna meh teu beurat
            $current_db->close();
        }

        $master_summary .= "Status: SUCCESS | File: " . $zip_name . "\n\n";

        // 4. SIMPEN KA LOKAL SAMENTARA TULUY UPLOAD KA FTP
        if ($data_found) {
            $this->zip->add_data("cccinfo_detail_log_report.txt", $detail_log);
            
            // Simpen di lokal heula
            if ($this->zip->archive($local_temp)) {
                // Upload ka FTP (Parameter ka-4 FALSE meh teu nanya permission)
                if ($this->ftp->upload($local_temp, $remote_path . $zip_name, 'binary', NULL)) {
                    echo "Suksés! File $zip_name geus di-upload ka FTP folder $sub.";
                    log_message('debug', 'FTP Backup: Suksés upload ' . $zip_name);
                } else {
                    echo "Gagal Upload ka FTP. Cek folder $remote_path geus aya acan?";
                    log_message('error', 'FTP Backup: Gagal upload ka ' . $remote_path);
                }
                
                // Hapus file samentara di lokal
                if (file_exists($local_temp)) {
                    unlink($local_temp);
                }
            }
        } else {
            echo "Teu aya data anyar kamari ($yesterday).";
        }

        // 5. FUNGSI BERSIH-BERSIH FTP (SAACAN CLOSE)
        // Fungsi ieu bakal mariksa file mana wae nu geus liwat ti poe retensi
        if ($retention > 0) {
            $deleted = $this->_cleanup_old_files($remote_path, $retention);
            $master_summary .= "- Auto-Clean: $deleted files deleted.\n";
            echo "Auto-Clean: $deleted file lami dihapus tina folder $sub.";
        }

        // 6. PROSES MASTER LOG TXT (Append ka FTP)
        $log_file_name = "CCCInfo_master_log_export.txt"; // Cabak spasi dina ngaran file meh aman
        $local_log_path = FCPATH . "temp/" . $log_file_name;        
        $remote_log_dir = "/callcenterdata/Cuparsa/DBBackup/CCCInfo/"; // Folder utama log

        // Cek daptar file di folder utama log
        $list_ftp_root = $this->ftp->list_files($remote_log_dir);
        $log_content = $master_summary . "\n";

        // Mun file master geus aya di FTP, download heula meh bisa ditambahan
        $file_exists_on_ftp = false;
        if ($list_ftp_root) {
            foreach ($list_ftp_root as $f) {
                if (basename($f) == $log_file_name) {
                    $file_exists_on_ftp = true;
                    break;
                }
            }
        }

        if ($file_exists_on_ftp) {
            // Download file nu lami ka lokal temp
            if ($this->ftp->download($remote_log_dir . $log_file_name, $local_log_path, 'ascii')) {
                $existing_content = read_file($local_log_path);
                // Tambahkeun log anyar di luhur (atawa di handap, bebas)
                $log_content = $log_content . "------------------------------------------\n" . $existing_content;
            }
        }

        // Tulis file log gabungan ka lokal
        write_file($local_log_path, $log_content);

        // Upload deui ka FTP (Nimpah file lami)
        if ($this->ftp->upload($local_log_path, $remote_log_dir . $log_file_name, 'ascii')) {
            echo "Master Log parantos di-update di FTP.<br>";
        }

        // Beberes file log di lokal
        if (file_exists($local_log_path)) { unlink($local_log_path); }

        // tutup koneksi
        $this->ftp->close();
    }

    /**
     * Fungsi Private pikeun ngahapus file kadaluwarsa
     */
    private function _cleanup_old_files($remote_path, $days) 
    {
        // 1. Ambil daptar file ti FTP (Lain glob lokal)
        $files = $this->ftp->list_files($remote_path);
        $now   = time();
        $count = 0;

        if ($files) {
            foreach ($files as $file) {
                // FTP list_files biasana mulangkeun path lengkep, urang pariksa naha file ZIP
                if (pathinfo($file, PATHINFO_EXTENSION) == 'zip') {
                    
                    // 2. Strategi paling aman: Cek tanggal tina ngaran file
                    // Sabab filemtime di FTP sakapeung teu akurat gumantung setting server FTP-na
                    if (preg_match('/(\d{4}-\d{2}-\d{2})/', $file, $matches)) {
                        $file_date = strtotime($matches[1]);
                        $limit_date = $now - ($days * 86400);

                        if ($file_date < $limit_date) {
                            // 3. Mupus file di FTP (Lain unlink lokal)
                            if ($this->ftp->delete_file($file)) {
                                $count++;
                            }
                        }
                    }
                }
            }
        }
        return $count;
    }
    
}
