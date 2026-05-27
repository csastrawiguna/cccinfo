<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model', 'schedule');
        $this->load->library('form_validation');
        $this->_autoDelete();
        is_login();
    }

    public function index()
    {        
        check_access();
        $data['title'] = 'Jadwal Kunjungan Teknisi';
        //$branch = $this->uri->segment(3);
        //$data['branches'] = $this->schedule->getAllBranches();
        $data['branchesLit'] = $this->schedule->getBranchesOnSchedule();

        if (!$this->input->post('scheduleStartDate') || !$this->input->post('scheduleEndDate') || !$this->input->post('scheduleSelectBranch')) {
            $startDate = date("Y-m-d", strtotime("-7 days"));
            $endDate = date("Y-m-d");
            $branch = $this->schedule->getLatestBranchOnSchedule($startDate, $endDate)[0]['branch'];
        } else {
            $startDate = $this->input->post('scheduleStartDate');
            $endDate = $this->input->post('scheduleEndDate');
            $branch = strtoupper($this->input->post('scheduleSelectBranch'));
        }
        $data['scheduleRepair'] = $this->schedule->getScheduleByDateByBranch($branch, $startDate, $endDate);
        $data['branchInfo'] = strtoupper($branch);

        $this->form_validation->set_rules('addSingleScheduleBranch', 'Cabang', 'trim|required|alpha');
        $this->form_validation->set_rules('addSingleScheduleNotif', 'Notif', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('addSingleScheduleStatus', 'Status', 'trim|numeric');
        $this->form_validation->set_rules('addSingleScheduleName', 'Customer', 'trim|required');
        $this->form_validation->set_rules('addSingleScheduleAddress', 'Alamat', 'trim');
        $this->form_validation->set_rules('addSingleSchedulePhone', 'Telepon', 'trim|numeric');
        $this->form_validation->set_rules('addSingleScheduleModel', 'Model', 'trim');
        $this->form_validation->set_rules('addSingleScheduleDescription', 'Kerusakan', 'trim');
        $this->form_validation->set_rules('addSingleScheduleTechnician', 'Teknisi', 'trim');
        $this->form_validation->set_rules('addSingleScheduleSchedule', 'Tanggal kunjungan', 'trim');

        // $this->form_validation->set_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('schedule/schedule-repair', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'branch' => strtoupper($this->input->post('addSingleScheduleBranch')),
                'notif' => $this->input->post('addSingleScheduleNotif'),
                'notif_status' => $this->input->post('addSingleScheduleStatus'),
                'customer_name' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleName'))),
                'customer_address' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAddress'))),
                'customer_phone' => $this->input->post('addSingleSchedulePhone'),
                'model' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleModel'))),
                'description' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleDescription'))),
                'technician' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleTechnician'))),
                'visit_schedule' => date("Y-m-d", strtotime($this->input->post('addSingleScheduleSchedule'))),
                'remark' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleRemark'))),
            ];

            if ($this->schedule->performAddSingleScheduleRepair($newData) > 0) {
                $this->session->set_flashdata('message', 'Success|success|Technician visit schedule Added!');
                $branchLink = 'schedule/index/' . $branch;
                redirect($branchLink);
            }
        }
    }

    private function _autoDelete()
    {
        $limitDate = '-9 months';
        $this->schedule->performAutoDeleteOldRepairData(date("Y-m-d", strtotime($limitDate)));
        $this->schedule->performAutoDeleteOldInstallData(date("Y-m-d", strtotime($limitDate)));
    }

    public function deleterepair()
    {
        $id = $this->uri->segment(3);
        if ($this->schedule->performDeleteSchedule($id) > 0) {
            $this->session->set_flashdata('message', 'Success deleted|info|Technician visit schedule deleted!');
            redirect('schedule');
        }
    }

    public function updateScheduleRepair()
    {
        $branch = $this->uri->segment(3);

        $this->form_validation->set_rules('addSingleScheduleBranch', 'Cabang', 'trim|required|alpha');
        $this->form_validation->set_rules('addSingleScheduleNotif', 'Notif', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('addSingleScheduleStatus', 'Status', 'trim|numeric');
        $this->form_validation->set_rules('addSingleScheduleName', 'Customer', 'trim|required');
        $this->form_validation->set_rules('addSingleScheduleAddress', 'Alamat', 'trim');
        $this->form_validation->set_rules('addSingleSchedulePhone', 'Telepon', 'trim|numeric');
        $this->form_validation->set_rules('addSingleScheduleModel', 'Model', 'trim');
        $this->form_validation->set_rules('addSingleScheduleDescription', 'Kerusakan', 'trim');
        $this->form_validation->set_rules('addSingleScheduleTechnician', 'Teknisi', 'trim');
        $this->form_validation->set_rules('addSingleScheduleSchedule', 'Tanggal kunjungan', 'trim');

        // $this->form_validation->set_rules();

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal update!|error|Data isian tidak valid!');
            redirect('schedule/index/' . $branch);
        } else {
            $updateData = [
                'id' => strtoupper($this->input->post('addSingleScheduleId')),
                'branch' => strtoupper($this->input->post('addSingleScheduleBranch')),
                'notif' => $this->input->post('addSingleScheduleNotif'),
                'notif_status' => $this->input->post('addSingleScheduleStatus'),
                'customer_name' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleName'))),
                'customer_address' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAddress'))),
                'customer_phone' => $this->input->post('addSingleSchedulePhone'),
                'model' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleModel'))),
                'description' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleDescription'))),
                'technician' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleTechnician'))),
                'visit_schedule' => date("Y-m-d", strtotime($this->input->post('addSingleScheduleSchedule'))),
                'remark' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleRemark'))),
            ];

            if ($this->schedule->performUpdateScheduleRepair($updateData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil!|success|Data berhasil diupdate!');
                $branchLink = 'schedule/index/' . $branch;
                redirect($branchLink);
            }
        }
    }

    public function scheduleRepairById()
    {
        $id = $this->input->post('scheduleId');
        echo json_encode($this->schedule->getSingleScheduleRepair($id));
    }

    public function acinstall()
    {
        $data['title'] = 'Jadwal Install AC';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('schedule/schedule-acinstall', $data);
        $this->load->view('templates/footer', $data);
    }

    // Previous AC Install 
    // public function acinstall()
    // {
    //     check_access();
    //     $data['title'] = 'Jadwal Install AC';
    //     $data['contractors'] = $this->schedule->getAllAccontractors();

    //     if (!$this->input->post('scheduleAcinstallStartDate') || !$this->input->post('scheduleAcinstallEndDate')) {
    //         $startDate = date("Y-m-d", strtotime("-7 days"));
    //         $endDate = date("Y-m-d");
    //     } else {
    //         $startDate = $this->input->post('scheduleAcinstallStartDate');
    //         $endDate = $this->input->post('scheduleAcinstallEndDate');
    //     }
    //     $data['scheduleAcinstall'] = $this->schedule->getScheduleAcinstallByDate($startDate, $endDate);

    //     $this->form_validation->set_rules('addSingleScheduleAcinstallDate', 'Tanggal install', 'trim');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallContractor', 'Kontraktor', 'trim|required');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallSpk', 'SPK', 'trim|required');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallName', 'Customer name', 'trim|required');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallPhone', 'Telepon', 'trim|numeric');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallAddress', 'Alamat', 'trim');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallModel', 'Model', 'trim');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallPurchasement', 'Pembelian', 'trim');
    //     $this->form_validation->set_rules('addSingleScheduleAcinstallRemark', 'Notif', 'trim');

    //     // $this->form_validation->set_rules();
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/navbar', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('schedule/schedule-acinstall', $data);
    //         $this->load->view('templates/footer', $data);
    //     } else {
    //         $newData = [
    //             'install_date' => date("Y-m-d", strtotime($this->input->post('addSingleScheduleAcinstallDate'))),
    //             'contractor_id' => $this->input->post('addSingleScheduleAcinstallContractor'),
    //             'spk_letter' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallSpk'))),
    //             'customer_name' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallName'))),
    //             'customer_phone' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallPhone'))),
    //             'customer_address' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallAddress'))),
    //             'model' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallModel'))),
    //             'purchasement' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallPurchasement'))),
    //             'remark' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallRemark')))
    //         ];
    //         if ($this->schedule->performAddSingleScheduleAcinstall($newData) > 0) {
    //             $this->session->set_flashdata('message', 'Berhasil|success|Data berhasil ditambah!');
    //             redirect('schedule/acinstall');
    //         }
    //     }
    // }

    public function deleteacinstall()
    {
        $id = $this->uri->segment(3);
        if ($this->schedule->performDeleteScheduleAcinstall($id) > 0) {
            $this->session->set_flashdata('message', 'Berhasil dihapus|success|Jadwal install AC dihapus!');
            redirect('schedule/acinstall');
        }
    }

    public function scheduleAcinstallById()
    {
        $id = $this->input->post('scheduleId');
        echo json_encode($this->schedule->getSingleScheduleAcinstall($id));
    }

    public function updateScheduleAcinstall()
    {
        $this->form_validation->set_rules('addSingleScheduleAcinstallDate', 'Tanggal install', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallContractor', 'Kontraktor', 'required');
        $this->form_validation->set_rules('addSingleScheduleAcinstallSpk', 'SPK', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallName', 'Customer name', 'trim|required');
        $this->form_validation->set_rules('addSingleScheduleAcinstallPhone', 'Telepon', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallAddress', 'Alamat', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallModel', 'Model', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallPurchasement', 'Pembelian', 'trim');
        $this->form_validation->set_rules('addSingleScheduleAcinstallRemark', 'Keterangan', 'trim');

        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal update!|error|Data isian tidak valid!');
            redirect('schedule/acinstall');
        } else {
            $updateData = [
                'id' => $this->input->post('addSingleScheduleAcinstallId'),
                'install_date' => date("Y-m-d", strtotime($this->input->post('addSingleScheduleAcinstallDate'))),
                'contractor_id' => $this->input->post('addSingleScheduleAcinstallContractor'),
                'spk_letter' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallSpk'))),
                'customer_name' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallName'))),
                'customer_phone' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallPhone'))),
                'customer_address' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallAddress'))),
                'model' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallModel'))),
                'purchasement' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallPurchasement'))),
                'remark' => htmlspecialchars(strtoupper($this->input->post('addSingleScheduleAcinstallRemark')))
            ];

            if ($this->schedule->performUpdateSingleScheduleAcinstall($updateData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Jadwal install AC berhasil update!');
                redirect('schedule/acinstall');
            }
        }
    }

    // file upload functionality
    public function uploadScheduleRepair()
    {
        // Load form validation library
        // $this->form_validation->set_rules('uploadScheduleFile', 'Upload File', 'callback_checkFileValidation');
        // if($this->form_validation->run() == false) {
        //   $this->load->view('spreadsheet/index', $data);
        // } else {
        // If file uploaded
        // var_dump($_FILES);
        // die;
        if (!empty($_FILES['uploadScheduleFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadScheduleFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            // file path
            $spreadsheet = $reader->load($_FILES['uploadScheduleFile']['tmp_name']);
            //$reader->getSheetByName('Upload');
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true);
            // $allDataInSheet = $spreadsheet->getSheetByName('Upload')->toArray(true, true, true, true, true, true, true, true, true, true, null);

            // array Count
            $dataUploaded = [];
            $numrow = 1;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 1) {
                    $dataUploaded[] = [
                        'branch' => strtoupper($this->input->post('uploadScheduleCabang')),
                        'notif' => $row['B'],
                        'notif_status' => $row['C'],
                        'customer_name' => strtoupper($row['D']),
                        'customer_address' => strtoupper($row['E']),
                        'customer_phone' => $row['F'],
                        'model' => strtoupper($row['G']),
                        'description' => strtoupper($row['H']),
                        'technician' => strtoupper($row['I']),
                        'visit_schedule' => $row['J'],
                        'remark' => strtoupper($row['K'])
                    ];
                }
                $numrow++;
            }

            // upload to database
            if ($this->schedule->uploadScheduleFromExcel($dataUploaded) > 0) {
                $this->session->set_flashdata('message', 'Success|success|Technician visit schedule uploaded!');
                redirect('schedule');
            }
        }
    }   

    // Previous Function (upload Excel stored to DB)
    public function uploadScheduleAcinstall()
    {
        if (!empty($_FILES['uploadScheduleAcinstallFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadScheduleAcinstallFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
            } elseif ($extension == 'xlsx') {
                // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            } else {
                // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
            }
            $reader->setReadDataOnly(true);

            // file path
            $spreadsheet = $reader->load($_FILES['uploadScheduleAcinstallFile']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true);

            // array Count
            $dataUploaded = []; 
            $numrow = 1;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 30) {
                    $dataUploaded[] = [
                        'install_date' => $row['A'],
                        'contractor_id' => $row['B'],
                        'spk_letter' => strtoupper($row['C']),
                        'customer_name' => strtoupper($row['D']),
                        'customer_phone' => strtoupper($row['E']),
                        'customer_address' => strtoupper($row['F']),
                        'model' => strtoupper($row['G']),
                        'purchasement' => strtoupper($row['H']),
                        'remark' => strtoupper($row['I'])
                    ];
                }
                $numrow++;
            }                        

            // upload to database
            if ($this->schedule->uploadScheduleAcinstallFromExcel($dataUploaded) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Jadwal install AC berhasil di-upload!');
                redirect('schedule/acinstall');
            }
        }
    }

    public function uploadExcelAcinstall()
    {
        //check upload folder
        $yrs = date("Y", strtotime($this->input->post('uploadScheduleAcinstallDate')));
        if (!is_dir('./files/upload/source/'.$yrs)) {
            mkdir('./files/upload/source/' . $yrs, 0777, TRUE);
        }

        $config['upload_path'] = './files/upload/source/'.$yrs;
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = 2048;
        $config['file_name'] = 'Jadwal_Install_AC.xlsx';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadScheduleAcinstallFile')) {
            $this->session->set_flashdata('message', 'Gagal Upload|error|' . strip_tags($this->upload->display_errors()));
            redirect('schedule/acinstall');
        }
        else {
            $this->session->set_flashdata('message', 'Berhasil Upload|success|Jadwal install AC di-upload!');
            redirect('schedule/acinstall');
        }
    }
}
