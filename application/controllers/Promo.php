<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Promo_model', 'promo');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Info Promo & Iklan';
        $data['promoList'] = $this->promo->getAllActivePromo();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function infoblast()
    {
        check_access();
        $data['title'] = 'Info Blast';        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/blast-info', $data);
        $this->load->view('templates/footer', $data);
    }

    public function others()
    {
        check_access();
        $data['title'] = 'Info lain';        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/others-info', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id)
    {
        $data['title'] = 'Promo';
        //$promolist = $this->uri->segment(3);
        $data['promoDetail'] = $this->promo->getPromoById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/view-promo', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($id)
    {
        is_login();
        $data['title'] = 'Promo';
        $data['promoDetail'] = $this->promo->getPromoById($id);

        $this->form_validation->set_rules('promoEditPromoTextarea', 'Konten promo', 'required');
        $this->form_validation->set_rules('promoEditPromoStatus', 'Status promo', 'required');
        $this->form_validation->set_rules('promoEditPromoDate', 'Tanggal promo', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('promo/promo-edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $updateData = [
                'id' => $this->input->post('promoEditPromoId'),
                'title' => $this->input->post('promoEditPromoTitle'),
                'description' => $this->input->post('promoEditPromoTextarea'),
                'date' => $this->input->post('promoEditPromoDate'),
                'date_end' => $this->input->post('promoEditPromoDateEnd'),
                'remark' => $this->input->post('promoEditPromoRemark'),
                'is_active' => $this->input->post('promoEditPromoStatus'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d h:i:s")
            ];

            if ($this->promo->editPromo($updateData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data Promo berhasil diperbaharui!");
                redirect('promo/view/' . $updateData['id']);
            }
        } 
    }

    public function deleteimage(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

    public function add()
    {
        is_login();
        $data['title'] = 'Tambah Promo/iklan';

        $this->form_validation->set_rules('promoAddformAddPromoTextarea', 'Konten promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoStatus', 'Status promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoDate', 'Tanggal promo', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('promo/promo-add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'title' => $this->input->post('promoAddformAddPromoTitle'),
                'description' => $this->input->post('promoAddformAddPromoTextarea'),
                'date' => $this->input->post('promoAddformAddPromoDate'),
                'date_end' => $this->input->post('promoEditPromoDateEnd'),
                'remark' => $this->input->post('promoAddformAddPromoRemark'),
                'is_active' => $this->input->post('promoAddformAddPromoStatus'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];
            if ($this->promo->insertNewPromo($newData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data Promo berhasil ditambah!");
                redirect('promo/index');
            }
        }        
    }

    public function addblast()
    {
        is_login();
        $data['title'] = 'Tambah Data Blast';

        $this->form_validation->set_rules('promoAddformAddPromoTextarea', 'Konten promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoStatus', 'Status promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoDate', 'Tanggal promo', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('promo/blast-add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'title' => $this->input->post('promoAddformAddPromoTitle'),
                'description' => $this->input->post('promoAddformAddPromoTextarea'),
                'date' => $this->input->post('promoAddformAddPromoDate'),
                'date_end' => $this->input->post('promoEditPromoDateEnd'),
                'remark' => $this->input->post('promoAddformAddPromoRemark'),
                'is_active' => $this->input->post('promoAddformAddPromoStatus'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];
            if ($this->promo->insertNewPromo($newData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data Promo berhasil ditambah!");
                redirect('promo/index');
            }
        }        
    }

    public function addothers()
    {
        is_login();
        $data['title'] = 'Tambah Info';

        $this->form_validation->set_rules('promoAddformAddPromoTextarea', 'Konten promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoStatus', 'Status promo', 'required');
        $this->form_validation->set_rules('promoAddformAddPromoDate', 'Tanggal promo', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('promo/others-add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'title' => $this->input->post('promoAddformAddPromoTitle'),
                'description' => $this->input->post('promoAddformAddPromoTextarea'),
                'date' => $this->input->post('promoAddformAddPromoDate'),
                'date_end' => $this->input->post('promoEditPromoDateEnd'),
                'remark' => $this->input->post('promoAddformAddPromoRemark'),
                'is_active' => $this->input->post('promoAddformAddPromoStatus'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];
            if ($this->promo->insertNewPromo($newData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data Promo berhasil ditambah!");
                redirect('promo/index');
            }
        }        
    }

    public function memo()
    {
        $data['title'] = 'Memo';
        $data['allMemos'] = $this->promo->getAllMemos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/memo', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bopart()
    {
        check_access();

        $data['title'] = 'Estimasi Part (BO)';
        $data['allInfos'] = $this->promo->getAllGeneralInfos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/bopart', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sassar()
    {
        check_access();
        $data['title'] = 'Info SASS OD/OL';
        $data['sassar'] = $this->promo->getSassAr();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/sassar', $data);
        $this->load->view('templates/footer', $data);
    }

    // file upload functionality
    public function uploadPricelistExcel()
    {
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
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, null);

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

    // upload data AR SASS
    public function uploadExcelSassAr()
    {
        if (!empty($_FILES['uploadSassArFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadSassArFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            // file path
            $spreadsheet = $reader->load($_FILES['uploadSassArFile']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, null);

            // array Count
            // $dataUploaded = [];

            $numrow = 2;
            $updatedArData = 0;
            $newArData = 0;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 2) {
                    if ($row['B'] != 1) {
                        $singleRow = [
                            'date' => date("Y-m-d", strtotime($this->input->post('uploadSassArDate'))),
                            'sass_csmsid' => $row['B'],
                            'sass_sapid' => $this->_trueToNone(strtoupper($row['C'])),
                            'sass_name' => strtoupper($row['D']),
                            'under_branch' => strtoupper($row['F']),
                            'remain_limit' => (int)trim($row['N'], ' '),
                            'tat' => $row['O'],
                            'status' => $row['P'],
                            'remark' => $this->_trueToNone($row['T']),
                            'saved_by' => $this->session->userdata('userid'),
                            'saved_at' => date("Y-m-d H:i:s"),
                        ];
                        if ($this->promo->updateArById($singleRow) > 0) {
                            $updatedArData += 1;
                        } else {
                            $this->promo->addArById($singleRow);
                            $newArData += 1;
                        }
                    }
                }
                $numrow++;
            }
            $this->session->set_flashdata('message', 'Success|success|Update data AR SASS, Baru: ' . $newArData . ' Update: ' . $updatedArData);
            redirect('promo/sassar');
        } else {
            $this->session->set_flashdata('message', 'Cek Lagi!|error|Tidak ada file yang di-upload!');
            redirect('promo/sassar');
        }
    }

    private function _trueToNone($data)
    {
        if (strlen($data) < 2) {
            return '';
        } else {
            return $data;
        }
    }

    public function uploadBopart()
    {
        //check upload folder
        $yrs = date("Y", strtotime($this->input->post('uploadBopartDate')));
        if (!is_dir('./files/upload/source/'.$yrs)) {
            mkdir('./files/upload/source/' . $yrs, 0777, TRUE);
        }

        $config['upload_path'] = './files/upload/source/'.$yrs;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 4096;
        $config['file_name'] = 'bo_part_' . date("Ymd", strtotime($this->input->post('uploadBopartDate'))) . '.pdf';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadBopartFile')) {
            $this->session->set_flashdata('message', 'Gagal Upload|error|' . strip_tags($this->upload->display_errors()));
            redirect('schedule/acinstall');
        }
        else {
            $newData = [
                'type' => 'Estimasi Part',
                'title' => 'Estimasi Kedatangan Part per ' . date("d.m.Y", strtotime($this->input->post('uploadBopartDate'))),
                'description' => '<p>Estimasi Kedatangan Part per Jumat ' . date("d.m.Y", strtotime($this->input->post('uploadBopartDate'))) . ':<br><a href="http://192.168.188.254/cccinfo//files/upload/source/' . $yrs . '/' . $config['file_name'] .'" target="_blank"><i class="fas fa-file-pdf"></i> format PDF</a></p>',
                'date' => date("Y-m-d", strtotime($this->input->post('uploadBopartDate'))),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d H:i:s")
            ];

            $this->db->insert('info_bopart', $newData);
            $this->session->set_flashdata('message', 'Berhasil Upload|success|Jadwal install AC di-upload!');
            redirect('promo/bopart');
        }
    }

    public function deleteBopartData()
    {
        $date = date("Ymd", strtotime($this->uri->segment(3)));
        $dateX = date("d M Y", strtotime($this->uri->segment(3)));
        $id = $this->uri->segment(4);
        $yrs = substr($this->uri->segment(3), 0, 4);
        unlink(realpath('./files/upload/source/' . $yrs . '/bo_part_' . $date . '.pdf'));
        
        if ($this->promo->deleteBopartById($id) > 0) {
            $this->session->set_flashdata('message', 'Berhasil Dihapus|info|BO Part tanggal ' . $dateX . ' sudah hangus');
            redirect('promo/bopart');
        }
    }
}
