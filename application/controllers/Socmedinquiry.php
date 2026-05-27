<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Socmedinquiry extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Socmed_model', 'socmed');
        $this->load->model('Activity_model', 'activity');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {        
        check_access();
        $data['title'] = 'Daftar Pertanyaan Socmed';

        if (!$this->input->post('socmedInquiryStartPeriod')) {
            $startPeriod = date("Y-m-d", strtotime("-7 days", strtotime($this->socmed->getLatestDate())));
            $endPeriod = date("Y-m-d", strtotime($this->socmed->getLatestDate()));
        } else {
            $startPeriod = date('Y-m-d', strtotime($this->input->post('socmedInquiryStartPeriod')));
            $endPeriod = date('Y-m-d', strtotime($this->input->post('socmedInquiryEndPeriod')));
        }

        $data['startPeriod'] = $startPeriod;
        $data['endPeriod'] = $endPeriod;

        $data['inquiryDataByPeriod'] = $this->socmed->getInquiryByPeriod($startPeriod, $endPeriod);
        $this->_submitSocmedinquirytoActivity(date("Y-m-d", strtotime("-1 days")));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socmed/inquiry-list', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _submitSocmedinquirytoActivity($lastDate)
    {
        $origin = new DateTimeImmutable($this->socmed->getLatestDate());
        $target = new DateTimeImmutable(date("Y-m-d", strtotime("-30 days")));
        $interval = $origin->diff($target);
        $diffDays = (int) $interval->format('%d');
        
        if ($diffDays >= 0) {
            return;
        } else {
            // count socmed inquiry -1 days
            $countResult = $this->socmed->countYesterdayInquiry(date("Y-m-d", strtotime("-30 days")), $lastDate);
            $arr = [];
            foreach($countResult as $row) {
                $arr[] = [
                    'date' => $row['date'],
                    'socmed_inquiry' => $row['qty']
                ];
            }
            $this->activity->autoUpdateSocmed($arr);
            return $countResult;
        }
    }

    public function insert()
    {
        $data['title'] = 'Insert data pertanyaan';

        $this->form_validation->set_rules('socmedInsertDate', 'Tanggal' , 'required|trim');
        $this->form_validation->set_rules('socmedInsertType', 'Channel socmed' , 'required|trim');
        $this->form_validation->set_rules('socmedInsertCustomerName', 'Nama konsumen' , 'required|trim');
        $this->form_validation->set_rules('socmedInsertCustomerAccount', 'Akun' , 'required|trim');
        $this->form_validation->set_rules('socmedInsertModel', 'Model' , 'trim');
        $this->form_validation->set_rules('socmedInsertIdetail', 'Inquiry detail' , 'trim');
        $this->form_validation->set_rules('socmedInsertActiondetail', 'Action detail' , 'trim');
        $this->form_validation->set_rules('socmedInsertRemark', 'Remark' , 'trim');
        
        if ($this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('socmed/insert-data', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'date' => $this->input->post('socmedInsertDate'),
                'socmed_type' => $this->input->post('socmedInsertType'),
                'customer_account' => $this->input->post('socmedInsertCustomerAccount'),
                'customer_name' => $this->input->post('socmedInsertCustomerName'),
                'customer_phone' => $this->input->post('socmedInsertCustomerPhone'),
                'product_category' => $this->input->post('socmedInsertProductCategory'),
                'model' => $this->input->post('socmedInsertModel'),
                'system_code' => $this->input->post('socmedInsertSystemCode'),
                'inquiry_group' => $this->input->post('socmedInsertInquiryGroup'),
                'i_detail' => $this->input->post('socmedInsertIdetail'),
                'action_detail' => $this->input->post('socmedInsertActiondetail'),
                'remark' => $this->input->post('socmedInsertRemark'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];

            if ($this->socmed->insertNewInquiry($newData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|info|Data berhasil disimpan!');
                redirect('socmedinquiry/index');
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit data pertanyaan';

        $this->form_validation->set_rules('socmedUpdateDate', 'Tanggal' , 'required|trim');
        $this->form_validation->set_rules('socmedUpdateType', 'Channel socmed' , 'required|trim');
        $this->form_validation->set_rules('socmedUpdateCustomerName', 'Nama konsumen' , 'required|trim');
        $this->form_validation->set_rules('socmedUpdateCustomerAccount', 'Akun' , 'required|trim');
        $this->form_validation->set_rules('socmedUpdateModel', 'Model' , 'trim');
        $this->form_validation->set_rules('socmedUpdateIdetail', 'Inquiry detail' , 'trim');
        $this->form_validation->set_rules('socmedUpdateActiondetail', 'Action detail' , 'trim');
        $this->form_validation->set_rules('socmedUpdateRemark', 'Remark' , 'trim');

        $data['toEdit'] = $this->socmed->getInquiryById($id);
        
        if ($this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('socmed/update-data', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $updateData = [
                'id' => $this->input->post('socmedUpdateId'),
                'date' => $this->input->post('socmedUpdateDate'),
                'socmed_type' => $this->input->post('socmedUpdateType'),
                'customer_account' => $this->input->post('socmedUpdateCustomerAccount'),
                'customer_name' => $this->input->post('socmedUpdateCustomerName'),
                'customer_phone' => $this->input->post('socmedUpdateCustomerPhone'),
                'product_category' => $this->input->post('socmedUpdateProductCategory'),
                'model' => $this->input->post('socmedUpdateModel'),
                'system_code' => $this->input->post('socmedUpdateSystemCode'),
                'inquiry_group' => $this->input->post('socmedUpdateInquiryGroup'),
                'i_detail' => $this->input->post('socmedUpdateIdetail'),
                'action_detail' => $this->input->post('socmedUpdateActiondetail'),
                'remark' => $this->input->post('socmedUpdateRemark'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d h:i:s")
            ];

            if ($this->socmed->updateInquiry($updateData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data berhasil diperbaharui!');
                redirect('socmedinquiry/index');
            }
        }
    }

    public function getInquiry()
    {
        $code = $this->input->post('code');
        echo json_encode($this->socmed->getInquiryGroup($code)['inquiry']);
    }

    public function deleteInquiry($id)
    {
        if ($this->socmed->deleteInquiry($id) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|info|Data berhasil dihapus!');
            redirect('socmedinquiry/index');
        }
    }

    public function summary()
    {
        check_access();
        $data['title'] = 'Rangkuman Pertanyaan Socmed';

        if (!$this->input->post()) {
            $startPeriod = date("Y-m-01", strtotime("-6 months"));
            $endPeriod = date("Y-m-d");
        } else {
            $startPeriod = date('Y-m-01', strtotime($this->input->post('socmedSummaryStartPeriod')));
            $endPeriod = date('Y-m-d', strtotime($this->input->post('socmedSummaryEndPeriod')));
        }

        $data['transitionDataBySocmed'] = $this->socmed->getTransitionBySocmed($startPeriod, $endPeriod);
        $data['transitionDataByInquiry'] = $this->socmed->getTransitionByInquiry($startPeriod, $endPeriod);
        $data['inquiryBySocmedtype'] = $this->socmed->getInquiryBySocmedtype($startPeriod, $endPeriod);
        $data['transitionByAgent'] = $this->socmed->getTransitionByAgent($startPeriod, $endPeriod);
        $data['agents'] = $this->socmed->getAgentLists();
        $data['transitionSubtotal'] = $this->socmed->getTransitionSubtotal($startPeriod, $endPeriod);
        $data['socmedtypeSubtotal'] = $this->socmed->getSubtotalBySocmedtype($startPeriod, $endPeriod);
        $data['responseSameDay'] = $this->socmed->getResponseSameDay($startPeriod, $endPeriod);
        $data['responseSameDayTotal'] = $this->socmed->getResponseSameDayTotal($startPeriod, $endPeriod);

        $data['tableHeader'] = array_keys($data['transitionDataBySocmed'][0]);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socmed/summary', $data);
        $this->load->view('templates/footer', $data);
    }

    public function rawtoexcel()
    {
        $startPeriod = $this->uri->segment(3);
        $endPeriod = $this->uri->segment(4);
        $results = $this->socmed->getRawByPeriod($startPeriod, $endPeriod);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //$sheet->mergeCells('A1:S1');
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->setCellValue('A1', 'DATA PERTANYAAN SOCIAL MEDIA');
        // $sheet->mergeCells('A2:W2');
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('B')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $subtitle = 'Periode : ' . date("d M Y", strtotime($startPeriod)) . ' - ' . date("d M Y", strtotime($endPeriod));
        $sheet->setCellValue('A2', $subtitle);

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Source');
        $sheet->setCellValue('C4', 'Bulan');
        $sheet->setCellValue('D4', 'Tanggal');
        $sheet->setCellValue('E4', 'Akun');
        $sheet->setCellValue('F4', 'Nama Konsumen');
        $sheet->setCellValue('G4', 'Telp Konsumen');
        $sheet->setCellValue('H4', 'Sys Code');
        $sheet->setCellValue('I4', 'Inquiry');
        $sheet->setCellValue('J4', 'Kategori');
        $sheet->setCellValue('K4', 'Model');
        $sheet->setCellValue('L4', 'Detail Pertanyaan');
        $sheet->setCellValue('M4', 'Action Detail');
        $sheet->setCellValue('N4', 'Remark');
        $sheet->setCellValue('O4', 'Saved by');
        $sheet->setCellValue('P4', 'Saved at');
        $sheet->setCellValue('Q4', 'Updated by');
        $sheet->setCellValue('R4', 'Updated at');

        $rowCount = 5;
        $rowNumber = 1;
        $spreadsheet->getActiveSheet()->getStyle('L' . $rowCount)->getAlignment()->setWrapText(true);
        foreach ($results as $row) {
            $sheet->setCellValue('A' . $rowCount, $rowNumber++);
            $sheet->setCellValue('B' . $rowCount, $row['socmed_type']);
            $sheet->setCellValue('C' . $rowCount, date("M-Y", strtotime($row['date'])));
            $sheet->setCellValue('D' . $rowCount, date("d-M-Y", strtotime($row['date'])));
            $sheet->setCellValue('E' . $rowCount, $row['customer_account']);
            $sheet->setCellValue('F' . $rowCount, $row['customer_name']);
            $sheet->setCellValue('G' . $rowCount, $row['customer_phone']);
            $sheet->setCellValue('H' . $rowCount, $row['system_code']);
            $sheet->setCellValue('I' . $rowCount, $row['inquiry_group']);
            $sheet->setCellValue('J' . $rowCount, $row['product_category']);
            $sheet->setCellValue('K' . $rowCount, $row['model']);
            $sheet->setCellValue('L' . $rowCount, $row['i_detail']);
            $sheet->setCellValue('M' . $rowCount, $row['action_detail']);
            $sheet->setCellValue('N' . $rowCount, $row['remark']);
            $sheet->setCellValue('O' . $rowCount, $row['saved_by']);
            $sheet->setCellValue('P' . $rowCount, date("d-M-Y", strtotime($row['saved_at'])));
            $sheet->setCellValue('Q' . $rowCount, $row['updated_by']);
            $sheet->setCellValue('R' . $rowCount, $this->_nulltotext($row['updated_at']));
            $rowCount++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(12);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(50);
        $sheet->getColumnDimension('M')->setWidth(50);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(15);
        $sheet->getColumnDimension('P')->setWidth(15);
        $sheet->getColumnDimension('Q')->setWidth(15);
        $sheet->getColumnDimension('R')->setWidth(20);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        ob_end_clean();
        $fileName = 'Pertanyaan via Socmed ' . date("d M Y", strtotime($startPeriod)) . ' - ' . date("d M Y", strtotime($endPeriod)) . '.xlsx';

        $sheet->setTitle("Raw Pertanyaan via Social Media");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename= . $fileName"); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    private function _nulltotext($data)
    {
        if ($data == null) {
            return '-';
        } else {
            return date("d-M-Y H:i", strtotime($data));
        }
    }

    public function emaillist()
    {
        check_access();
        $data['title'] = 'List Pertanyaan Email';
        
        if (!$this->input->post()) {
            $startPeriod = date("Y-m-01");
            $endPeriod = date("Y-m-d");
        } else {
            $startPeriod = date('Y-m-d', strtotime($this->input->post('emailInquiryStartPeriod')));
            $endPeriod = date('Y-m-d', strtotime($this->input->post('emailInquiryEndPeriod')));
        }

        $data['emailDataByPeriod'] = $this->socmed->getEmailDetailByPeriod($startPeriod, $endPeriod);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socmed/email-list', $data);
        $this->load->view('templates/footer', $data);
    }    

    public function emaillisttoexcel()
    {
        $startPeriod = $this->uri->segment(3);
        $endPeriod = $this->uri->segment(4);
        $results = $this->socmed->getEmailDetailByPeriod($startPeriod, $endPeriod);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //$sheet->mergeCells('A1:S1');
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->setCellValue('A1', 'DATA PERTANYAAN VIA EMAIL SHARP CS');
        // $sheet->mergeCells('A2:W2');
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('B')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $subtitle = 'Periode : ' . date("d M Y", strtotime($startPeriod)) . ' - ' . date("d M Y", strtotime($endPeriod));
        $sheet->setCellValue('A2', $subtitle);

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Bulan');
        $sheet->setCellValue('C4', 'Tanggal');
        $sheet->setCellValue('D4', 'Alamat Email');
        $sheet->setCellValue('E4', 'Data Konsumen');
        $sheet->setCellValue('F4', 'Tanggal Reply');
        $sheet->setCellValue('G4', 'Same day?');
        $sheet->setCellValue('H4', 'Sys Code');
        $sheet->setCellValue('I4', 'Inquiry');
        $sheet->setCellValue('J4', 'Kategori');
        $sheet->setCellValue('K4', 'Model');
        $sheet->setCellValue('L4', 'Detail Pertanyaan');
        $sheet->setCellValue('M4', 'Action Detail');
        $sheet->setCellValue('N4', 'Remark');
        $sheet->setCellValue('O4', 'Saved by');
        $sheet->setCellValue('P4', 'Saved at');
        $sheet->setCellValue('Q4', 'Updated by');
        $sheet->setCellValue('R4', 'Updated at');

        $rowCount = 5;
        $rowNumber = 1;
        $spreadsheet->getActiveSheet()->getStyle('L' . $rowCount)->getAlignment()->setWrapText(true);
        foreach ($results as $row) {
            $sheet->setCellValue('A' . $rowCount, $rowNumber++);
            $sheet->setCellValue('B' . $rowCount, date("M-Y", strtotime($row['datetime'])));
            $sheet->setCellValue('C' . $rowCount, date("d-M-Y", strtotime($row['datetime'])));
            $sheet->setCellValue('D' . $rowCount, $row['customer_email']);
            $sheet->setCellValue('E' . $rowCount, $row['customer_data']);
            $sheet->setCellValue('F' . $rowCount, date("d-M-Y", strtotime($row['datetime'])));
            $sheet->setCellValue('G' . $rowCount, $this->_samedaymark($row['distributed_date'], $row['replied_date']));
            $sheet->setCellValue('H' . $rowCount, $row['system_code']);
            $sheet->setCellValue('I' . $rowCount, $row['inquiry_group']);
            $sheet->setCellValue('J' . $rowCount, $row['product_category']);
            $sheet->setCellValue('K' . $rowCount, $row['model']);
            $sheet->setCellValue('L' . $rowCount, $row['i_detail']);
            $sheet->setCellValue('M' . $rowCount, $row['action_detail']);
            $sheet->setCellValue('N' . $rowCount, $this->_nulltotext($row['remark']));
            $sheet->setCellValue('O' . $rowCount, $row['saved_by']);
            $sheet->setCellValue('P' . $rowCount, date("d-M-Y", strtotime($row['saved_at'])));
            $sheet->setCellValue('Q' . $rowCount, $this->_nulltotext($row['updated_by']));
            $sheet->setCellValue('R' . $rowCount, $this->_nulltotext($row['updated_at']));
            $rowCount++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(12);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(50);
        $sheet->getColumnDimension('M')->setWidth(30);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(15);
        $sheet->getColumnDimension('P')->setWidth(15);
        $sheet->getColumnDimension('Q')->setWidth(15);
        $sheet->getColumnDimension('R')->setWidth(20);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        ob_end_clean();
        $fileName = 'Pertanyaan via Socmed ' . date("d M Y", strtotime($startPeriod)) . ' - ' . date("d M Y", strtotime($endPeriod)) . '.xlsx';

        $sheet->setTitle("Raw Pertanyaan via Email");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename= . $fileName"); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    private function _samedaymark($dateDist, $dateOut) {
        if (date("Y-m-d", strtotime($dateDist)) == date("Y-m-d", strtotime($dateOut))) {
            return 'Yes';
        } else {
            return 'X';
        }
    }

    public function newemailinquiry()
    {
        $data['title'] = 'Insert pertanyaan Email';

        $this->form_validation->set_rules('emailInsertDatetime', 'Tanggal' , 'required|trim');
        $this->form_validation->set_rules('emailInsertCustomerEmail', 'Email konsumen' , 'required|trim');
        $this->form_validation->set_rules('emailInsertSubjectmail', 'Subjek email' , 'required|trim');
        $this->form_validation->set_rules('emailInsertRepliedDate', 'Tanggal balas' , 'required');
        $this->form_validation->set_rules('emailInsertSystemCode', 'system code' , 'required');
        $this->form_validation->set_rules('emailInsertProductCategory', 'Kategori produk' , 'trim');
        
        if ($this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('socmed/insert-email', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'datetime' => date("Y-m-d H:i:s", strtotime($this->input->post('emailInsertDatetime'))),
                'customer_email' => $this->input->post('emailInsertCustomerEmail'),
                'customer_data' => $this->input->post('emailInsertCustomerData'),
                'email_subject' => $this->input->post('emailInsertSubjectmail'),
                'replied_date' => $this->input->post('emailInsertRepliedDate'),
                'product_category' => $this->input->post('emailInsertProductCategory'),
                'model' => $this->input->post('emailInsertModel'),
                'system_code' => $this->input->post('emailInsertSystemCode'),
                'inquiry_group' => $this->input->post('emailInsertInquiryGroup'),
                'i_detail' => $this->input->post('emailInsertIdetail'),
                'action_detail' => $this->input->post('emailInsertActiondetail'),
                'remark' => $this->input->post('emailInsertRemark'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];

            // var_dump($newData);die;

            if ($this->socmed->insertNewEmail($newData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|sucess|Data berhasil disimpan!');
                redirect('socmedinquiry/emaillist');
            }
        }
    }

    public function emailedit()
    {
        $data['title'] = 'Edit pertanyaan Email';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socmed/update-email', $data);
        $this->load->view('templates/footer', $data);
    }

    public function deleteEmail($id)
    {
        if ($this->socmed->deleteEmail($id) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|info|Data berhasil dihapus!');
            redirect('socmedinquiry/emaillist');
        }
    }
    
}
