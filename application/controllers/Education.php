<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Education extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Education_model', 'education');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Basic Product';
        $data['basicProducts'] = $this->education->getAllBasicProducts();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('education/basic-product', $data);
        $this->load->view('templates/footer', $data);
    }

    public function basiccs()
    {
        check_access();
        $data['title'] = 'Basic CS';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('education/basic-cs', $data);
        $this->load->view('templates/footer', $data);
    }

}
