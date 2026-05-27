<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cost_model', 'cost');
        $this->load->library('form_validation');
        // is_login();
    }

    public function index()
    {        
        check_access();
        $data['title'] = 'Service cost';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/service-cost-2024', $data);
        $this->load->view('templates/footer', $data);
    }

    public function general()
    {
        $data['title'] = 'Service cost';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/service-cost', $data);
        $this->load->view('templates/footer', $data);
    }

    public function freonac()
    {
        check_access();
        $data['title'] = 'Biaya isi Freon AC';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/freon-ac', $data);
        $this->load->view('templates/footer-freonac', $data);
    }

    public function freonacByModel()
    {
        $model = strtoupper($this->input->post('model'));
        //$model = '9VEYx';
        echo json_encode($this->cost->getFreonacCostByModel($model)->row_array());
        // if ($this->cost->getFreonacCostByModel($model)->num_rows() > 1) {
        //     echo 'null';
        //     // $this->session->set_flashdata('message', "GAGAL|error|Model harus spesifik atau kurang lengkap!");
        //     // redirect('cost/freonac');
        // } else {
        //     echo json_encode($this->cost->getFreonacCostByModel($model)->row_array());
        // }
    }

    public function freonreff()
    {
        check_access();
        $data['title'] = 'Biaya isi Freon Lemari Es';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/freon-reff', $data);
        $this->load->view('templates/footer', $data);
    }

    public function partprice()
    {
        check_access();
        $data['title'] = 'Kode Harga Part';
        
        $data['partpricePeriod'] = $this->cost->getPeriod();
        is_null($this->input->post('partpriceSelectPeriod')) ? $period = $this->cost->getLatestPeriod() : $period = $this->input->post('partpriceSelectPeriod');

        $data['partPriceByPeriod'] = $this->cost->getAllPartPrice($period);        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/part-price', $data);
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

    public function freonacaddmodel()
    {
        admin_access();
        $data['title'] = 'Tambah model AC';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cost/freon-ac-add-model', $data);
        $this->load->view('templates/footer', $data);
    }
}
