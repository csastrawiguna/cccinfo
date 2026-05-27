<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Partcode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Partcode_model', 'partcode');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Kode Spare Part';
        if (!$_POST) {
            $data['allPartCode'] = $this->partcode->getAllPartcode();
        } else {
            $params = [
                'model' => $this->input->post('partcodeSearchModel'),
                'part_desc' => $this->input->post('partcodeSearchDesc'),
                'part_code' => $this->input->post('partcodeSearchCode'),
            ];
            if ($params['model'] == '' && $params['part_desc'] == '' && $params['part_code'] == '') {
                $data['allPartCode'] = $this->partcode->getAllPartcode();
            } else {
                $data['allPartCode'] = $this->partcode->getPartcodeByParam($params);
                $this->partcode->updateHitByParam($params);
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('partcode/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewlog($id)
    {
        $data['title'] = 'Part Update Log';
        $data['logdata'] = $this->partcode->getPartLog($id);
        $data['partdata'] = $this->partcode->getSinglePartCode($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('partcode/view-log', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addcode()
    {
        part_access();
        $data['title'] = 'Add New Part Code';
        $data['allPartDesc'] = $this->partcode->getAllPartDesc();

        $this->form_validation->set_rules('addPartcodeCode', 'Kode part', 'trim|required');
        $this->form_validation->set_rules('addPartcodeIsnla', 'NLA or not', 'required');
        $this->form_validation->set_rules('addPartcodeDesc', 'Deskripsi part', 'trim|required');
        $this->form_validation->set_rules('addPartcodeModel', 'Model', 'trim|required');

        if ($this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('partcode/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'part_code' => strtoupper($this->input->post('addPartcodeCode')),
                'is_nla' => $this->input->post('addPartcodeIsnla'),
                'is_bht' => $this->input->post('addPartcodeIsbht'),
                'part_desc' => strtoupper($this->input->post('addPartcodeDesc')),
                'model' => strtoupper($this->input->post('addPartcodeModel')),
                'remark' => $this->input->post('addPartcodeRemark'),
                'category' => $this->input->post('addPartcodeCategory'),
                'input_by' => $this->session->userdata('userid'),
                'input_at' => date("Y-m-d H:i:s")
            ];
            if ($this->partcode->checkExisting($newData['part_code']) > 0) {
                $this->session->set_flashdata('message', 'Gagal|error|Kode part sudah ada di database!');
                redirect('partcode/index');
            } else {
                if ($this->partcode->addNew($newData) > 0) {
                    $this->session->set_flashdata('message', 'Berhasil|success|Kode part baru berhasil disimpan!');
                    redirect('partcode/index');
                }
            }
        }
    }

    public function edit($id)
    {
        part_access();
        $data['title'] = 'Edit Part Code';
        $data['allPartDesc'] = $this->partcode->getAllPartDesc();
        $data['partDetail'] = $this->partcode->getSinglePartCode($id);

        $this->form_validation->set_rules('editPartcodeCode', 'Kode part', 'trim|required');
        $this->form_validation->set_rules('editPartcodeIsnla', 'NLA or not', 'required');
        $this->form_validation->set_rules('editPartcodeDesc', 'Deskripsi part', 'trim|required');
        $this->form_validation->set_rules('editPartcodeModel', 'Model', 'trim|required');

        if ($this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('partcode/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $updateData = [
                'id' => $this->input->post('editPartcodeId'),
                'part_code' => strtoupper($this->input->post('editPartcodeCode')),
                'is_nla' => $this->input->post('editPartcodeIsnla'),
                'is_bht' => $this->input->post('editPartcodeIsbht'),
                'part_desc' => strtoupper($this->input->post('editPartcodeDesc')),
                'model' => strtoupper($this->input->post('editPartcodeModel')),
                'remark' => $this->input->post('editPartcodeRemark'),
                'category' => $this->input->post('editPartcodeCategory'),
            ];
            $logdata = [
                'part_id' => $this->input->post('editPartcodeId'),
                'prev_is_nla' => $data['partDetail']['is_nla'],
                'new_is_nla' => $this->input->post('editPartcodeIsnla'),
                'prev_is_bht' => $data['partDetail']['is_bht'],
                'new_is_bht' => $this->input->post('editPartcodeIsbht'),
                'prev_part_desc' => $data['partDetail']['part_desc'],
                'new_part_desc' => strtoupper($this->input->post('editPartcodeDesc')),
                'prev_model' => $data['partDetail']['model'],
                'new_model' => strtoupper($this->input->post('editPartcodeModel')),
                'prev_remark' => $data['partDetail']['remark'],
                'new_remark' => $this->input->post('editPartcodeRemark'),
                'prev_category' => $data['partDetail']['category'],
                'new_category' => $this->input->post('editPartcodeCategory'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            if ($this->partcode->editData($updateData) > 0) {
                if($this->partcode->insertLog($logdata) > 0 ) {
                    $this->session->set_flashdata('message', 'Sukses|succss|Data berhasil diperbaharui!');
                    redirect('partcode/viewlog/' . $id);
                }    
            }
        }
    }

    public function delete($id)
    {
        part_access();
        if ($this->partcode->deleteData($id) > 0) {
            $this->session->set_flashdata('message', 'Data dihapus|info|Kode part dihapus dari database!');
            redirect('partcode/index');
        }
    }

    public function report()
    {
        $data['title'] = 'Part Code Report';
        if (!$this->input->post('partcodeReportDateStart')) {
            $partcodeReportStartPeriod = date("Y-m-01", strtotime("-3 months"));
            $partcodeReportEndPeriod = date("Y-m-01");
        } else {
            $partcodeReportStartPeriod = date("Y-m-01", strtotime($this->input->post('partcodeReportDateStart')));
            $partcodeReportEndPeriod = date("Y-m-d", strtotime($this->input->post('partcodeReportDateEnd')));
        }

        // $data['inputNew'] = $this->partcode->getSummaryNew($partcodeReportStartPeriod, $partcodeReportEndPeriod);
        $data['updater'] = $this->partcode->getSaverUpdate($partcodeReportStartPeriod, $partcodeReportEndPeriod);
        $data['newer'] = $this->partcode->getSaverNew($partcodeReportStartPeriod, $partcodeReportEndPeriod);
        $data['newerCategory'] = $this->partcode->getCategoryNew($partcodeReportStartPeriod, $partcodeReportEndPeriod);
        $newerTotal = $this->partcode->getSaverNewTotal($partcodeReportStartPeriod, $partcodeReportEndPeriod);

        $total = ['agent' => 'Total'];
        $totalCategory = ['category' => 'Total'];
        foreach ($newerTotal as $row) {
            $total[$row['month']] = $row['qty'];
            $totalCategory[$row['month']] = $row['qty'];
        }

        $data['newer'][] = $total;
        $data['newerCategory'][] = $totalCategory;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('partcode/report', $data);
        $this->load->view('templates/footer', $data);
    }
    
}
