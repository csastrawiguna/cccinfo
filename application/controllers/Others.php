<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Others extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Others_model', 'others');
        $this->load->model('Usermanagement_model', 'usermanagement');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'User SAP';
        $data['sapUsers'] = $this->others->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/user-sap', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getsapdata()
    {
        $id = $this->input->post('id');
        echo json_encode($this->others->getSapdataById($id));
    }

    public function serial()
    {
        check_access();
        $data['title'] = 'Identifikasi No.Seri';
        $data['allSerialNumberCode'] = $this->others->getAllSerialNumberCode();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/serial-no', $data);
        $this->load->view('templates/footer', $data);
    }

    public function phoneprefix()
    {
        check_access();
        $data['title'] = 'Kode Awal Telp PSTN';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/phone-prefix', $data);
        $this->load->view('templates/footer', $data);
    }


    public function updatesap()
    {
        $updateData = [
            'id' => $this->input->post('formEditPasswordSapId'),
            'name' => $this->input->post('formEditPasswordSapName'),
            'username' => $this->input->post('formEditPasswordSapUsername'),
            'password' => $this->input->post('formEditPasswordSapPassword1'),
            'access' => $this->input->post('formEditPasswordSapAccess'),
            'share' => $this->input->post('formEditPasswordSapShare'),
            'remark' => $this->input->post('formEditPasswordSapRemark'),
            'updated_by' => $this->session->userdata('userid'),
            'updated_at' => date("Y-m-d h:i:s")
        ];

        if ($this->others->updateSapById($updateData) > 0) {
            $this->session->set_flashdata('message', "Berhasil|success|Data berhasil diubah!");
            redirect('others/index');
        }
    }

    public function checkpassword()
    {
        $this->form_validation->set_rules('formEditPasswordSapPassword1', 'Password', 'required|trim|matches[formEditPasswordSapPassword2]');
        $this->form_validation->set_rules('formEditPasswordSapPassword2', 'Confirm Password', 'required|trim|matches[formEditPasswordSapPassword1]');

        if ($this->form_validation->run() == FALSE) {
            $message = ['error' => 'Password dan Konfirmasi Password tidak sesuai'];
        } else {
            $message = ['error' => 'OK'];
        }

        echo json_encode($message);
    }

    public function gado()
    {
        //check_access();
        $data['title'] = 'Info Gado-Gado';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/gado-gado', $data);
        $this->load->view('templates/footer', $data);
    }

    public function showgado()
    {
        //check_access();
        $data['title'] = 'Show Info Gado2';
        $file = $this->uri->segment(3);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/' . $file, $data);
        $this->load->view('templates/footer', $data);
    }

    public function manageserial()
    {
        admin_access();
        $data['title'] = 'Kelola data no. seri';
        $data['allSerials'] = $this->others->getAllSerialNumberCode();

        $this->form_validation->set_rules('addSerialCategory', 'Category', 'required');
        $this->form_validation->set_rules('addSerialModel', 'Model', 'trim|required');
        $this->form_validation->set_rules('addSerialFirstcode', 'Kode No.Seri', 'trim|required|alpha_numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('others/add-serial', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newdata = [
                'category' => $this->input->post('addSerialCategory'),
                'model' => $this->input->post('addSerialModel'),
                'first_code' => $this->input->post('addSerialFirstcode'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];
            // check existing code
            if ($this->db->get_where('serial_number_code', ['first_code' => $newdata['first_code']])->num_rows() > 0) {
                $this->session->set_flashdata('message', "Data Sudah Ada|error|Kode no.seri sudah ada di database!");
                redirect('others/manageserial');
            } else {
                if ($this->others->addNewSerial($newdata) > 0) {
                    $this->session->set_flashdata('message', "Berhasil|success|Kode no.seri baru disimpan!");
                    redirect('others/manageserial');
                }
            }
        }
    }

    public function singleSerialById()
    {
        $id = $this->input->post('id');
        echo json_encode($this->db->get_where('serial_number_code', ['id' => $id])->row_array());
    }

    public function updateSerial()
    {
        $updatedata = [
                'id' => $this->input->post('addSerialId'),
                'category' => $this->input->post('addSerialCategory'),
                'model' => $this->input->post('addSerialModel'),
                'first_code' => $this->input->post('addSerialFirstcode'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d h:i:s")
            ];
        if ($this->others->updateSerial($updatedata) > 0) {
            $this->session->set_flashdata('message', "Berhasil|success|Kode no.seri berhasil di-update!");
            redirect('others/manageserial');
        }
    }

    public function deleteSerial($id)
    {
        if ($this->others->deleteSerial($id) > 0) {
            $this->session->set_flashdata('message', "Berhasil|info|Kode no.seri sudah dihapus!");
            redirect('others/manageserial');
        }
    }

    public function uploadSerialExcel()
    {
        if (!empty($_FILES['uploadSerialFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadSerialFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            // file path
            $spreadsheet = $reader->load($_FILES['uploadSerialFile']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true);

            // array Count
            $dataUpload = [];
            $numrow = 4;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 4) {
                    if ($row['D'] == '') {
                        continue;
                    } else {
                        $dataUpload[] = [
                            'category' => strtoupper($row['B']),
                            'model' => $row['C'],
                            'first_code' => $row['D'],
                            'saved_by' => $this->session->userdata('userid'),
                            'saved_at' => date("Y-m-d h:i:s")
                        ];
                    }
                }
                $numrow++;
            }
            
            $numsUploaded = $this->others->uploadSerialFromExcel($dataUpload);
            if ($numsUploaded > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success| $numsUploadedPrice Kode no. seri berhasil diunggah!');
                redirect('others/manageserial');
            }       
        }
    }

    public function chartgenerator()
    {
        check_access();
        $data['title'] = 'Chart Generator';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('others/chart-generator', $data);
        $this->load->view('templates/footer', $data);
    }
}
