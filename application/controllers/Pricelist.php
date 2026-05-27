<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Pricelist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pricelist_model', 'pricelist');
        $this->load->library('form_validation'); 
        is_login();       
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Price list';
        if (!$this->input->post('pricelistSelectPeriod')) {
            $period = $this->pricelist->getLatestPeriod();
        } else {
            $period = date("Y-m-01", strtotime($this->input->post('pricelistSelectPeriod')));
        }
        $data['pricelistByPeriod'] = $this->pricelist->getPricelistByPeriod($period);
        $this->form_validation->set_rules('editPricelistModel', 'Model', 'trim|required');
        $data['periodList'] = $this->pricelist->getPeriod();

        // $this->form_validation->set_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pricelist/pricelist', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->_addData();
        }
    }

    private function _addData()
    {
        is_login();
        $newData = [            
            'period' => date("Y-m-01", strtotime($this->input->post('editPricelistPeriod'))),
            'category' => $this->input->post('editPricelistCategory'),
            'model' => $this->input->post('editPricelistModel'),
            'specification' => $this->input->post('editPricelistSpecification'),
            'debut' => $this->input->post('editPricelistDebut'),
            'price' => $this->input->post('editPricelistPrice'),
            'is_nla' => $this->input->post('editPricelistIsnla'),
            'remark' => $this->input->post('editPricelistRemark'),
            'upload_by' => $this->session->userdata('userid'),
            'upload_at' => date("Y-m-d h:i:s")
        ];
        if ($this->pricelist->insertSingleData($newData) > 0) {
            $this->session->set_flashdata('message', "Berhasil|success|Data berhasil ditambah!");
            redirect('pricelist/index');
        }
    }

    private function _dataByModelByPeriod($period, $model)
    {
        return $this->pricelist->getDataByModelByPeriod($period, $model);
    }

    public function getSingleData()
    {
        $period = $this->input->post('period');
        $model = $this->input->post('model');
        echo json_encode($this->pricelist->getDataByModelByPeriod($period, $model));
    }

    public function updateData()
    {
        is_login();
        $updateData = [
            'id' => $this->input->post('editPricelistId'),
            'period' => date("Y-m-01", strtotime($this->input->post('editPricelistPeriod'))),
            'category' => $this->input->post('editPricelistCategory'),
            'model' => $this->input->post('editPricelistModel'),
            'specification' => $this->input->post('editPricelistSpecification'),
            'debut' => $this->input->post('editPricelistDebut'),
            'price' => $this->input->post('editPricelistPrice'),
            'is_nla' => $this->input->post('editPricelistIsnla'),
            'remark' => $this->input->post('editPricelistRemark'),
            'updated_by' => $this->session->userdata('userid'),
            'updated_at' => date("Y-m-d h:i:s")
        ];
        
        if ($this->pricelist->updateSingleData($updateData) > 0) {
            $this->session->set_flashdata('message', "Berhasil|success|Data berhasil diperbaharui!");
            redirect('pricelist/index');
        }
    }

    public function deletePricelist()
    {
        is_login();
        $period = $this->uri->segment(3);
        $model = $this->uri->segment(4);
        
        if ($this->pricelist->deleteSinglePricelist($period, $model) > 0) {
            $this->session->set_flashdata('message', "Berhasil|info|Data berhasil dihapus!");
            redirect('pricelist/index');
        }

    }
    public function dealer()
    {
        check_access();
        $data['title'] = 'Daftar Dealer';

        // $this->form_validation->set_rules('addSingleScheduleAcinstallRemark', 'Notif', 'trim');

        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {            
            $this->input->post('dealerSelectDealerByCity') ? $data['selectedCity'] = $this->input->post('dealerSelectDealerByCity') : $data['selectedCity'] = '';
            $this->input->post('dealerSelectDealerByCategory') ? $data['selectedCategory'] = $this->input->post('dealerSelectDealerByCategory') : $data['selectedCategory'] = '';
            $data['allDealers'] = $this->pricelist->getDealers($data['selectedCity'], $data['selectedCategory']);
            $data['allCities'] = $this->pricelist->getCities();
            $data['allCategories'] = [
                ['category' => 'STS'],
                ['category' => 'Air Conditioner'],
                ['category' => 'Air Purifier'],
                ['category' => 'Audio'],
                ['category' => 'Laptop'],
                ['category' => 'Refrigerator'],
                ['category' => 'Small Home Applicances'],
                ['category' => 'Smartphone'],
                ['category' => 'Television'],
                ['category' => 'Washing Machine']
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pricelist/dealer', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                // 'area' => date("Y-m-d", strtotime($this->input->post('addSingleScheduleAcinstallDate'))),
            ];
            if ($this->schedule->performAddSingleDealer($newData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data Dealer berhasil ditambah!');
                redirect('pricelist/dealer');
            }
        }
    }

    public function deleteDealer()
    {
        // $id = $this->uri->segment(3);
        // if ($this->schedule->performDeleteScheduleAcinstall($id) > 0) {
        //     $this->session->set_flashdata('message', 'Berhasil dihapus|success|Jadwal install AC dihapus!');
        //     redirect('schedule/acinstall');
        // }
    }

    public function dealerById()
    {
        // $id = $this->input->post('scheduleId');
        // echo json_encode($this->schedule->getSingleScheduleAcinstall($id));
    }

    public function updateDealer()
    {
        is_login();
        $this->form_validation->set_rules('addSingleScheduleAcinstallRemark', 'Keterangan', 'trim');

        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal update!|error|Data isian tidak valid!');
            redirect('schedule/acinstall');
        } else {
            $updateData = [
                // 'id' => $this->input->post('addSingleScheduleAcinstallId'),
            ];

            if ($this->schedule->performUpdateDealer($updateData) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data Dealer berhasil update!');
                redirect('pricelist/dealer');
            }
        }
    }

    // file upload functionality
    public function uploadPricelistExcel()
    {
        // Load form validation library
        // $this->form_validation->set_rules('uploadScheduleFile', 'Upload File', 'callback_checkFileValidation');
        // if($this->form_validation->run() == false) {
        //   $this->load->view('spreadsheet/index', $data);
        // } else {
        // If file uploaded
        // var_dump($_FILES);
        // die;
        if (!empty($_FILES['uploadPricelistFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadPricelistFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            // file path
            $spreadsheet = $reader->load($_FILES['uploadPricelistFile']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true);

            // array Count
            $dataUpload = [];
            $numrow = 1;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 4) {
                    $dataUpload[] = [
                        'period' => date("Y-m-01", strtotime($this->input->post('uploadPricelistPeriod'))),
                        'category' => $row['A'],
                        'model' => $row['B'],
                        'specification' => $row['C'],
                        'debut' => $row['D'],
                        'price' => $row['E'],
                        'is_nla' => $row['F'],
                        'remark' => $row['G'],
                        'upload_by' => $this->session->userdata('userid'),
                        'upload_at' => date("Y-m-d h:i:s")
                    ];
                }
                $numrow++;
            }
            // cek upload type NEW data or Update
            $uploadType = 'new';
            if ($this->input->post('uploadPricelistType') == $uploadType) {
                $numsUploaded = $this->pricelist->uploadPricelistFromExcel($dataUpload);
                if ($numsUploaded > 0) {
                    $this->session->set_flashdata('message', 'Success|success| $numsUploadedPrice Data pricelist berhasil diunggah!');
                    redirect('pricelist/index');
                }
            } else {
                $numsNew = 0;
                $numsUpdate = 0;
                foreach ($dataUpload as $row) {
                    if (is_null ($this->_dataByModelByPeriod($row['period'], $row['model']))) {
                        $newData = [
                            'period' => date("Y-m-01", strtotime($this->input->post('uploadPricelistPeriod'))),
                            'category' => $row['category'],
                            'model' => $row['model'],
                            'specification' => $row['specification'],
                            'debut' => $row['debut'],
                            'price' => $row['price'],
                            'is_nla' => $row['is_nla'],
                            'remark' => $row['remark'],
                            'upload_by' => $this->session->userdata('userid'),
                            'upload_at' => date("Y-m-d h:i:s")
                        ];
                        if ($this->pricelist->insertSingleData($newData) > 0) {
                            $numsNew++;
                        }

                    } else {
                        $updateData = [
                            'period' => $this->_dataByModelByPeriod($row['period'], $row['model'])['period'],
                            'category' => $row['category'],
                            'model' => $this->_dataByModelByPeriod($row['period'], $row['model'])['model'],
                            'specification' => $row['specification'],
                            'debut' => $row['debut'],
                            'price' => $row['price'],
                            'is_nla' => $row['is_nla'],
                            'remark' => $row['remark'],
                            'updated_by' => $this->session->userdata('userid'),
                            'updated_at' => date("Y-m-d h:i:s")
                        ];
                        if ($this->pricelist->updateSingleData($updateData) > 0) {
                            $numsUpdate++;
                        }
                    }
                }

                $this->session->set_flashdata('message', "Berhasil|success|$numsNew data diunggah. $numsUpdate data di-update!");
                redirect('pricelist/index');
            }
        }
    }
    
}
