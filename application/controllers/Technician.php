<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Technician extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Technician_model', 'technician');
        $this->load->model('Branch_model', 'branch');
        $this->load->library('form_validation');
        is_login();
    }
    
    public function index()
    {
        check_access();
        $data['title'] = 'Daftar Teknisi';
        if (!$this->input->post('technicianSelectTechnicianByBranch')) {
            $data['allTechnician'] = $this->technician->getAllTechnician();
        } else {
            $selectedBranch = $this->input->post('technicianSelectTechnicianByBranch');
            $data['allTechnician'] = $this->technician->getAllTechnicianByBranch($selectedBranch);
        }
        $data['allSvcBranch'] = $this->technician->getAllSvcBranch();

        //$this->form_validation->set_rules('formAddTechnicianSvctype', 'Service type', 'required');
        $this->form_validation->set_rules('formAddTechnicianSvcbranch', 'Cabang', 'required|trim');
        $this->form_validation->set_rules('formAddTechnicianName', 'Nama PIC', 'required|trim');
        $this->form_validation->set_rules('formAddTechnicianPhone1', 'Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('technician/all-active', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                //'svc_branch' => $this->input->post('formAddTechnicianSvctype'),
                'svc_group' => $this->input->post('formAddTechnicianSvcbranch'),
                'name' => $this->input->post('formAddTechnicianName'),
                'phone1' => $this->_checkPhone(trim($this->input->post('formAddTechnicianPhone1'))),
                'phone1_remark' => $this->input->post('formAddTechnicianPhone1Remark'),
                'phone2' => $this->_checkPhone(trim($this->input->post('formAddTechnicianPhone2'))),
                'phone2_remark' => $this->input->post('formAddTechnicianPhone2Remark'),
                'phone3' => $this->_checkPhone(trim($this->input->post('formAddTechnicianPhone3'))),
                'phone3_remark' => $this->input->post('formAddTechnicianPhone3Remark'),
                'phone4' => $this->_checkPhone(trim($this->input->post('formAddTechnicianPhone4'))),
                'phone4_remark' => $this->input->post('formAddTechnicianPhone4Remark'),
                'remark' => $this->input->post('formAddTechnicianRemark'),
                'is_active' => 1,
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];

            if ($this->technician->insertSingleData($newData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data PIC SVC center berhasil ditambah!");
                redirect('technician/index');
            } else {
                $this->session->set_flashdata('message', "Gagal|error|Tidak ada data yang ditambahkan!");
                redirect('technician/index');
            }
        }
    }

    public function ajax_list()
    {
        $list = $this->technician->get_datatables();
        $data = [];
        $no = $this->input->post('start');

        //looping data
        foreach ($list as $row) {
            $groupButtonString = '';
            $no++;
            $rows = [];
            //row pertama akan kita gunakan untuk btn edit dan delete
            $rows[] = $row['svc_group'];
            $rows[] = $row['name'];
            $rows[] = '<div class="my-1">' . $row['phone1'] . ' ' . $this->_remark2icon($row['phone1_remark']). '</div>' . $this->_phoneString($row['phone2'], $row['phone2_remark'], $row['phone3'], $row['phone3_remark'], $row['phone4'], $row['phone4_remark']);
            $rows[] = $row['remark'];
            $rows[] =  $this->_stringButtonEdit($row['id']);
            $data[] = $rows;
        }
        $output = [
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->technician->count_all(),
            "recordsFiltered" => $this->technician->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    private function _stringButtonEdit($id)
    {
        $allowedAccess = [1, 9];
        $out = '';
        if (in_array ($this->session->userdata('useraccess'), $allowedAccess)){
            $out = '<a href="' . base_url('technician/edit/') . $id . '" class="text-secondary" title="Edit data"><i class="fas fa-edit"></i></span></a> <a href="' . base_url('technician/delete/') . $id . '" class="text-danger buttonServiceareaDelete" title="Delete data" style="cursor: pointer; text-decoration: none;"><i class="fas fa-times"></i></a>';
        } else {
            $out = '';
        }
        return $out;
    }

    private function _phoneString($ph2, $rem2, $ph3, $rem3, $ph4, $rem4)
    {
        $out = '';
        $x2 = '';
        $x3 = '';
        $x4 = '';
        if ($ph2 == '' || $ph2 == null) {
            $x2 = '';
        } else {
            $x2 = '<div class="my-1">' . $ph2 . ' ' . $this->_remark2icon($rem2) . '</div>';
        }

        if ($ph3 == '' || $ph3 == null) {
            $x3 = '';
        } else {
            $x3 = '<div class="my-1">' . $ph3 . ' ' . $this->_remark2icon($rem3) . '</div>';
        }

        if ($ph4 == '' || $ph4 == null) {
            $x4 = '';
        } else {
            $x4 = '<div class="my-1">' . $ph4 . ' ' . $this->_remark2icon($rem4) . '</div>';
        }

        $out = $x2 . $x3 . $x4;
        return $out;
    }

    private function _remark2icon($remark)
    {
        if (strtolower($remark) == 'call & whatsapp') {
            return ' <span class="badge badge-primary" style="font-weight: normal;"><i class="fas fa-phone"></i> <i class="fab fa-whatsapp"></i></span>';
        } else if (strtolower($remark) == 'call only') {
            return ' <span class="badge badge-dark" style="font-weight: normal;"><i class="fas fa-phone"></i></span>';
        } else if (strtolower($remark) == 'whatsapp only') {
            return ' <span class="badge badge-success" style="font-weight: normal;"><i class="fab fa-whatsapp"></i></span>';
        } else if (strtolower($remark) == 'inactive') {
            return ' <i class="text-danger fas fa-times-circle"></i>';
        } else {
            return '';
        }
    }

    public function edit($id)
    {
        admin_access();
        $data['title'] = 'Daftar Teknisi';
        $data['technicianDetail'] = $this->technician->getTechnicianById($id);

        $this->form_validation->set_rules('formEditTechnicianSvcbranch', 'Cabang', 'required|trim');
        $this->form_validation->set_rules('formEditTechnicianName', 'Nama PIC', 'required|trim');
        $this->form_validation->set_rules('formEditTechnicianPhone1', 'Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('technician/edit-technician', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $updateData = [
                'id' => $this->input->post('formEditTechnicianId'),
                'svc_group' => $this->input->post('formEditTechnicianSvcbranch'),
                'name' => $this->input->post('formEditTechnicianName'),
                'phone1' => trim($this->input->post('formEditTechnicianPhone1')),
                'phone1_remark' => $this->input->post('formEditTechnicianPhone1Remark'),
                'phone2' => trim($this->input->post('formEditTechnicianPhone2')),
                'phone2_remark' => $this->input->post('formEditTechnicianPhone2Remark'),
                'phone3' => trim($this->input->post('formEditTechnicianPhone3')),
                'phone3_remark' => $this->input->post('formEditTechnicianPhone3Remark'),
                'phone4' => trim($this->input->post('formEditTechnicianPhone4')),
                'phone4_remark' => $this->input->post('formEditTechnicianPhone4Remark'),
                'remark' => $this->input->post('formEditTechnicianRemark'),
                'is_active' => $this->input->post('formEditTechnicianStatus'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d h:i:s")
            ];
            
            if ($this->technician->updateSingleData($updateData) > 0) {
                $this->session->set_flashdata('message', "Berhasil|success|Data PIC SVC diperbaharui!");
                redirect('technician/index');
            }
        }

    }

    public function inactive()
    {
        $data['title'] = 'Teknisi Tidak Aktif';
        $data['inactives'] = $this->technician->getAllInactiveTechnician();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('technician/inactive', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if ($this->technician->deleteTechnician($id) > 0) {
            $this->session->set_flashdata('message', "Berhasil|info|Data PIC SVC berhasil dihapus!");
            redirect('technician/index');
        }
    }

    public function update()
    {
        $updateData = [
            'id' => $this->input->post('formAddTechnicianId'),
            'svc_group' => $this->input->post('formAddTechnicianSvcbranch'),
            'name' => $this->input->post('formAddTechnicianName'),
            'phone1' => $this->input->post('formAddTechnicianPhone1'),
            'phone2' => $this->input->post('formAddTechnicianPhone2'),
            'phone3' => $this->input->post('formAddTechnicianPhone3'),
            'phone4' => $this->input->post('formAddTechnicianPhone4'),
            'remark' => $this->input->post('formAddTechnicianRemark'),
            'is_active' => $this->input->post('formAddTechnicianIsactive'),
            'updated_by' => $this->session->userdata('userid'),
            'updated_at' => date("Y-m-d h:i:s")
        ];

        if ($this->technician->updateSingleData($updateData) > 0) {
            $this->session->set_flashdata('message', "Berhasil|success|Data PIC SVC berhasil diedit!");
            redirect('technician/index');
        }
    }

    public function technicianDetail()
    {
        $id = $this->input->post('technicianid');        
        echo json_encode($this->technician->getTechnicianById($id));
    }

    public function servicenamebytype()
    {
        $svcType = $this->input->post('svcType');
        $result = $this->branch->getSvcnameByType($svcType);

        foreach ($result as $row) {
            echo '<option value="' . $row['svc_name_group'] . '">' . $row['svc_name_group'] . '</option>';
        }
    }

    private function _checkPhone($phone)
    {
        if ($phone == '') {
            return NULL;
        } else {
            if ($this->technician->checkExisting(trim($this->input->post('formAddTechnicianPhone1'))) > 0 ) {
                $this->session->set_flashdata('message', "Data Existing!|error|No. Telp #1 ada di database!");
                redirect('technician/index');
            } else {
                return $phone;
            }
        }       
    }
}
