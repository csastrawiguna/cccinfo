<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Acloyalty extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Acloyalty_model', 'acloyalty');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'AC Loyalty Program';
        $data['allRegistration'] = $this->acloyalty->getAllRegistration();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('acloyalty/registered', $data);
        $this->load->view('templates/footer', $data);
    }

    

    // file upload functionality
    // public function uploadPricelistExcel()
    // {        
    //     if (!empty($_FILES['uploadScheduleFile']['name'])) {
    //         // get file extension
    //         $extension = pathinfo($_FILES['uploadScheduleFile']['name'], PATHINFO_EXTENSION);

    //         if ($extension == 'csv') {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    //         } elseif ($extension == 'xlsx') {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //         } else {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //         }

    //         // file path
    //         $spreadsheet = $reader->load($_FILES['uploadScheduleFile']['tmp_name']);
    //         $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, null);

    //         // array Count
    //         $dataUploaded = [];
    //         $numrow = 1;
    //         foreach ($allDataInSheet as $row) {
    //             if ($numrow > 1) {
    //                 $dataUploaded[] = [
    //                     'branch' => strtoupper($this->input->post('uploadScheduleCabang')),
    //                     'notif' => $row['B'],
    //                     'notif_status' => $row['C'],
    //                     'customer_name' => strtoupper($row['D']),
    //                     'customer_address' => strtoupper($row['E']),
    //                     'customer_phone' => $row['F'],
    //                     'model' => strtoupper($row['G']),
    //                     'description' => strtoupper($row['H']),
    //                     'technician' => strtoupper($row['I']),
    //                     'visit_schedule' => $row['J'],
    //                     'remark' => strtoupper($row['K'])
    //                 ];
    //             }
    //             $numrow++;
    //         }

    //         // upload to database
    //         if ($this->schedule->uploadScheduleFromExcel($dataUploaded) > 0) {
    //             $this->session->set_flashdata('message', 'Success|success|Technician visit schedule uploaded!');
    //             redirect('schedule');
    //         }
    //     }
    // }
}
