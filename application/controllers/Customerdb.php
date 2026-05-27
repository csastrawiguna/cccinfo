<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Customerdb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customerdb_model', 'customerdb');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Konsumen';

        $data['totalCustomers'] = $this->customerdb->getTotalCustomers($this->_getParams()['params']);
        $data['allProvinces'] = $this->customerdb->getAllProvince($this->_getParams()['params']);
        //$data['allRegions'] = $this->customerdb->getAllRegion($this->_getParams()['params']);
        $data['customerByAge'] = $this->_fieldToRecord($this->customerdb->getAllCustomersByAge($this->_getParams()['params']), ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years']);;
        $data['customerByAgeMale'] = $this->_fieldToRecord($this->customerdb->getAllCustomersByAgeMale($this->_getParams()['params'])[0], ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years']);;
        $data['customerByAgeFemale'] = $this->_fieldToRecord($this->customerdb->getAllCustomersByAgeFemale($this->_getParams()['params'])[0], ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years']);;
        $data['customerByAgeOthers'] = $this->_fieldToRecord($this->customerdb->getAllCustomersByAgeOthers($this->_getParams()['params'])[0], ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years']);;
        $data['customerByCategory'] = $this->customerdb->getAllCustomersByProductCategory($this->_getParams()['params']);
        $data['minMaxDateReg'] = $this->customerdb->getMinMaxDate($this->_getParams()['params']);
        $data['minMaxDateRegProduct'] = $this->customerdb->getMinMaxRegDateProduct($this->_getParams()['params']);
        $data['customerByUnitQty'] = $this->_fieldToRecord($this->getAllCustomersByUnitQty($this->_getParams()['params']), ['> 10 unit', '5 ~ 10 unit', '5 unit', '4 unit', '3 unit', '2 unit', '1 unit']);
        $newPurchaseValueLabels = [
            '> 20,000,000',
            '15,000,000 ~ 20,000,000',
            '10,000,000 ~ 15,000,000',
            '8,000,000 ~ 10,000,000',
            '6,000,000 ~ 8,000,000',
            '5,000,000 ~ 6,000,000',
            '4,000,000 ~ 5,000,000',
            '3,000,000 ~ 4,000,000',
            '2,000,000 ~ 3,000,000',
            '1,000,000 ~ 2,000,000',
            '< 1,000,000'
        ];
        $data['customerByPurchaseValue'] = $this->_fieldToRecord($this->customerdb->getAllCustomersByPurchaseValue($this->_getParams()['params'])[0], $newPurchaseValueLabels);
        $data['params'] = $this->_getParams()['params'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/view-customer', $data);
        $this->load->view('templates/footer', $data);
    }

    public function testsearch()
    {
        $params = $this->_getParams()['params'];
        var_dump($params);
    }

    public function addcustomer()
    {
        //check_access();
        $data['title'] = 'Tambah data Konsumen';
        $data['monthlyTransition'] = $this->customerdb->getMonthlyTransition(date("Y-m-01", strtotime("-3 months")), date("Y-m-01"));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/add-customer', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addproduct()
    {
        //check_access();
        $data['title'] = 'Tambah data Produk';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/add-product', $data);
        $this->load->view('templates/footer', $data);
    }

    public function product()
    {
        check_access();
        $data['title'] = 'Data produk/unit';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/list-product', $data);
        $this->load->view('templates/footer', $data);
    }

    public function blast()
    {
        check_access();
        $data['title'] = 'Daftar blast';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/list-blast', $data);
        $this->load->view('templates/footer', $data);
    }

    public function blasthistory()
    {
        check_access();
        $data['title'] = 'Riwayat blast';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customerdb/history-blast', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getAllCustomersByArea()
    {
        $query = $this->customerdb->getAllCustomersByArea($this->_getParams()['params']);

        foreach ($query as $row) {
            $data['labels'][] = $row['province'];
            $data['values'][] = $row['qty'];
        }
        echo json_encode($data);
    }

    public function customersByAge()
    {
        $query = $this->customerdb->getAllCustomersByAge($this->_getParams()['params']);
        $data['values'][] = $query[0]['below20'];
        $data['values'][] = $query[0]['20to25'];
        $data['values'][] = $query[0]['26to30'];
        $data['values'][] = $query[0]['31to35'];
        $data['values'][] = $query[0]['36to40'];
        $data['values'][] = $query[0]['41to45'];
        $data['values'][] = $query[0]['46to50'];
        $data['values'][] = $query[0]['51to55'];
        $data['values'][] = $query[0]['56to60'];
        $data['values'][] = $query[0]['60above'];
        $data['labels'] = ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years'];
        echo json_encode($data);
    }

    public function customersByAgeByGender()
    {
        $query = $this->customerdb->getAllCustomersByAgeByGender($this->_getParams()['params']);
        $data['female'][] = $query[0]['femalebelow20'];
        $data['female'][] = $query[0]['female20to25'];
        $data['female'][] = $query[0]['female26to30'];
        $data['female'][] = $query[0]['female31to35'];
        $data['female'][] = $query[0]['female36to40'];
        $data['female'][] = $query[0]['female41to45'];
        $data['female'][] = $query[0]['female46to50'];
        $data['female'][] = $query[0]['female51to55'];
        $data['female'][] = $query[0]['female56to60'];
        $data['female'][] = $query[0]['female60above'];
        $data['male'][] = $query[0]['malebelow20'];
        $data['male'][] = $query[0]['male20to25'];
        $data['male'][] = $query[0]['male26to30'];
        $data['male'][] = $query[0]['male31to35'];
        $data['male'][] = $query[0]['male36to40'];
        $data['male'][] = $query[0]['male41to45'];
        $data['male'][] = $query[0]['male46to50'];
        $data['male'][] = $query[0]['male51to55'];
        $data['male'][] = $query[0]['male56to60'];
        $data['male'][] = $query[0]['male60above'];
        $data['labels'] = ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years'];
        echo json_encode($data);
    }

    public function getAllCustomersByCategory()
    {
        $result = $this->customerdb->getAllCustomersByProductCategory();
        foreach ($result as $row) {
            $data['values'][] = $row['qty'];
            $data['labels'][] = $row['category'];
        }
        echo json_encode($data);
    }

    public function getAllCustomersByUnitQty()
    {
        $result = $this->customerdb->getAllCustomersByUnitQty();
        $dataList = [
            'above10' => 0,
            'qty5to10' => 0,
            'qty5' => 0,
            'qty4' => 0,
            'qty3' => 0,
            'qty2' => 0,
            'qty1' => 0,
        ];

        foreach ($result as $row) {
            switch ($row['qty']) {
                case ($row['qty'] > 10):
                    $dataList['above10']++;
                    break;
                case ($row['qty'] > 5 && $row['qty'] <= 10):
                    $dataList['qty5to10']++;
                    break;
                case 5:
                    $dataList['qty5']++;
                    break;
                case 4:
                    $dataList['qty4']++;
                    break;
                case 3:
                    $dataList['qty3']++;
                    break;
                case 2:
                    $dataList['qty2']++;
                    break;
                default:
                    $dataList['qty1']++;
                    break;
            }
        }

        return $dataList;
    }

    public function getAllCustomersByUnitQtyToChart()
    {
        $result = $this->customerdb->getAllCustomersByUnitQty();
        $dataList = [
            'above10' => 0,
            'qty5to10' => 0,
            'qty5' => 0,
            'qty4' => 0,
            'qty3' => 0,
            'qty2' => 0,
            'qty1' => 0,
        ];

        foreach ($result as $row) {
            switch ($row['qty']) {
                case ($row['qty'] > 10):
                    $dataList['above10']++;
                    break;
                case ($row['qty'] > 5 && $row['qty'] <= 10):
                    $dataList['qty5to10']++;
                    break;
                case 5:
                    $dataList['qty5']++;
                    break;
                case 4:
                    $dataList['qty4']++;
                    break;
                case 3:
                    $dataList['qty3']++;
                    break;
                case 2:
                    $dataList['qty2']++;
                    break;
                default:
                    $dataList['qty1']++;
                    break;
            }
        }

        $data['values'][] = $dataList['above10'];
        $data['values'][] = $dataList['qty5to10'];
        $data['values'][] = $dataList['qty5'];
        $data['values'][] = $dataList['qty4'];
        $data['values'][] = $dataList['qty3'];
        $data['values'][] = $dataList['qty2'];
        $data['values'][] = $dataList['qty1'];
        $data['labels'] = ['>10 unit', '5-10 unit', '5 unit', '4 unit', '3 unit', '2 unit', '1 unit'];

        echo json_encode($data);
    }

    public function getAllCustomersByPurchaseValue()
    {
        $result = $this->customerdb->getAllCustomersByPurchaseValue();
        $data['values'][] = $result[0]['above20mil'];
        $data['values'][] = $result[0]['15to20mil'];
        $data['values'][] = $result[0]['10to15mil'];
        $data['values'][] = $result[0]['8to10mil'];
        $data['values'][] = $result[0]['6to8mil'];
        $data['values'][] = $result[0]['5to6mil'];
        $data['values'][] = $result[0]['4to5mil'];
        $data['values'][] = $result[0]['3to4mil'];
        $data['values'][] = $result[0]['2to3mil'];
        $data['values'][] = $result[0]['1to2mil'];
        $data['values'][] = $result[0]['below1mil'];
        $data['labels'] = ['>20 juta', '15-20 juta', '10-15 juta', '8-10 juta', '6-8 juta', '5-6 juta', '4-5 juta', '3-4 juta', '2-3 juta', '1-2 juta', '< 1 juta',];
        echo json_encode($data);
    }

    public function cekparam()
    {
        var_dump($this->_getParams()['params']);
        $result = $this->_fieldToRecord($this->customerdb->getAllCustomersByAgeMale($this->_getParams()['params']), ['<20 years', '20 ~ 25 years', '26 ~ 30 years', '31 ~ 35 years', '36 ~ 40 years', '41 ~ 45 years', '46 ~ 50 years', '51 ~ 55 years', '56 ~ 60 years', '>60 years']);;

        echo "<br>";
        echo "<pre>";
        var_dump($result[0]['values']);
    }


    private function _getParams()
    {
        if (!$this->input->post('customerdbCustomerFormStartPeriod')) {
            $data['params'] = [
                'startPeriod' => date("Y-m-01 00:00:01", strtotime("-1 months")),
                'endPeriod' => date("Y-m-d H:i:s")
                //'endPeriod' => date("Y-m-d h:i:s")
            ];

            $data['paramsCategory'] = [
                'startPeriod' => date("Y-m-01 00:00:01", strtotime("-1 months")),
                'endPeriod' => date("Y-m-d H:i:s")
            ];
        } else {
            $data['params'] = [
                'startPeriod' => $this->input->post('customerdbCustomerFormStartPeriod'),
                'endPeriod' => $this->input->post('customerdbCustomerFormEndPeriod'),
                'province' => $this->input->post('customerdbCustomerFormProvince'),
                'city' => $this->input->post('customerdbCustomerFormCity'),
                'ageMin' => $this->input->post('customerdbCustomerFormAgemin'),
                'ageMax' => $this->input->post('customerdbCustomerFormAgemax'),
                'unitQtyMin' => $this->input->post('customerdbCustomerFormUnitqtymin'),
                'unitQtyMax' => $this->input->post('customerdbCustomerFormUnitqtymax'),
                'purchaseValueMin' => $this->input->post('customerdbCustomerFormPurchasevaluemin'),
                'purchaseValueMax' => $this->input->post('customerdbCustomerFormPurchasevaluemax'),
                'blastExist' => $this->input->post('customerdbCustomerFormBlasthistoryExist'),
                'blastHistoryStart' => $this->input->post('customerdbCustomerFormBlasthistoryStart'),
                'blastHistoryEnd' => $this->input->post('customerdbCustomerFormBlasthistoryEnd'),
                'customerPhone' => $this->input->post('customerdbCustomerFormPhone'),
                'customerEmail' => $this->input->post('customerdbCustomerFormEmail')
            ];

            $data['paramsCategory'] = [
                'categoryAirconditioner' => $this->input->post('customerdbCustomerFormCategoryAirconditioner'),
                'categoryAircooler' => $this->input->post('customerdbCustomerFormCategoryAircooler'),
                'categoryAirpurifier' => $this->input->post('customerdbCustomerFormCategoryAirpurifier'),
                'categoryAudio' => $this->input->post('customerdbCustomerFormCategoryAudio'),
                'categoryBicycle' => $this->input->post('customerdbCustomerFormCategoryBicycle'),
                'categoryHairdryer' => $this->input->post('customerdbCustomerFormCategoryHairdryer'),
                'categoryHealsiocookware' => $this->input->post('customerdbCustomerFormCategoryHealsiocookware'),
                'categoryHealsiowateroven' => $this->input->post('customerdbCustomerFormCategoryHealsiowateroven'),
                'categoryLaptop' => $this->input->post('customerdbCustomerFormCategoryLaptop'),
                'categoryLcdtv' => $this->input->post('customerdbCustomerFormCategoryLcdtv'),
                'categoryMicrowaveoven' => $this->input->post('customerdbCustomerFormCategoryMicrowaveoven'),
                'categorySmartphone' => $this->input->post('customerdbCustomerFormCategorySmartphone'),
                'categoryRefrigerator' => $this->input->post('customerdbCustomerFormCategoryRefrigerator'),
                'categorySha' => $this->input->post('customerdbCustomerFormCategorySha'),
                'categoryWashingmachine' => $this->input->post('customerdbCustomerFormCategoryWashingmachine'),
                'categoryWaterdispenser' => $this->input->post('customerdbCustomerFormCategoryWaterdispenser'),
                'categoryWaterpump' => $this->input->post('customerdbCustomerFormCategoryWaterpump'),
                'startPeriod' => $this->input->post('customerdbCustomerFormStartPeriod'),
                'endPeriod' => $this->input->post('customerdbCustomerFormEndPeriod'),
                'province' => $this->input->post('customerdbCustomerFormProvince'),
                'city' => $this->input->post('customerdbCustomerFormCity'),
                'ageMin' => $this->input->post('customerdbCustomerFormAgemin'),
                'ageMax' => $this->input->post('customerdbCustomerFormAgemax'),
                'unitQtyMin' => $this->input->post('customerdbCustomerFormUnitqtymin'),
                'unitQtyMax' => $this->input->post('customerdbCustomerFormUnitqtymax'),
                'purchaseValueMin' => $this->input->post('customerdbCustomerFormPurchasevaluemin'),
                'purchaseValueMax' => $this->input->post('customerdbCustomerFormPurchasevaluemax'),
                'blastExist' => $this->input->post('customerdbCustomerFormBlasthistoryExist'),
                'blastHistoryStart' => $this->input->post('customerdbCustomerFormBlasthistoryStart'),
                'blastHistoryEnd' => $this->input->post('customerdbCustomerFormBlasthistoryEnd'),
                'customerName' => $this->input->post('customerdbCustomerFormPhone'),
                'customerEmail' => $this->input->post('customerdbCustomerFormEmail')
            ];
        }

        return $data;
    }

    // file upload functionality
    public function uploadCustomerExcel()
    {
        if (!empty($_FILES['addCustomerUploadFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['addCustomerUploadFile']['name'], PATHINFO_EXTENSION);
            $allowedExtension = ['csv', 'xls', 'xlsx', 'ods', 'xml'];

            if (!in_array($extension, $allowedExtension)) {
                $this->session->set_flashdata('message', 'GAGAL!|error|Format file tidak sesuai!');
                redirect('customerdb/addcustomer');
            } else {
                switch ($extension) {
                    case 'csv':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                        break;
                    case 'ods':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
                        break;
                    case 'xml':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
                        break;
                    case 'xlsx':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        break;                    
                    default:
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        break;
                }                

                // file path
                $reader->setLoadSheetsOnly('Upload');
                $spreadsheet = $reader->load($_FILES['addCustomerUploadFile']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, null, true, true, true, true, true, null, true, true, true, true, true, true, true);            

                // array Count
                $dataUploaded = [];
                $numrow = 1;
                $rowsLimit = 4000;
                foreach ($allDataInSheet as $row) {
                    if ($numrow > 1) {
                        if ($row['C'] == null || $row['C'] == '' || empty($row['C']) ) {
                            continue;
                        } else {
                            $dataUploaded[] = [
                                'customer_name' => $row['C'],
                                'nik' => $row['D'],
                                'gender' => $this->_generalizedGender($row['E']),
                                'birthdate' => date("Y-m-d", strtotime($row['F'])),
                                'email' => $row['G'],
                                'phone1' => $row['H'],
                                'phone_others' => $this->_phoneToText($row['I']),
                                'ktp_address' => $row['J'],
                                'ktp_city' => $row['K'],
                                'ktp_province' => $row['L'],
                                'current_address' => $row['M'],
                                'current_city' => $row['N'],
                                'current_province' => $row['O'],
                                'sales_branch' => $this->_getSalesBranch($row['N'], $row['O']),
                                'reg_date' => date("Y-m-d h:i:s", strtotime($row['P'])),
                                'remark' => strtoupper($row['A']),
                                'data_source' => strtoupper($this->input->post('addCustomerUploadSource')),
                                'saved_by' => $this->session->userdata('userid'),
                                'saved_at' => date("Y-m-d h:i:s")
                            ];
                        }
                    }
                    $numrow++;
                }

                $countDataUploaded = count($dataUploaded);

                if ($countDataUploaded > $rowsLimit) {
                    $this->session->set_flashdata("message", "GAGAL!|error|Jumlah data lebih dari '$rowsLimit'");
                    redirect('customerdb/addcustomer');
                } else {                
                    $rowsUploaded = $this->customerdb->uploadCustomerFromExcel($dataUploaded);
                    if ($rowsUploaded > 0) {
                        $this->session->set_flashdata('message', "BERHASIL|success|Data berhasil diunggah: $countDataUploaded");
                        redirect('customerdb/index');
                    }
                } 
            }

        } else {
            $this->session->set_flashdata('message', 'GAGAL!|error|Belum ada/file untuk diunggah!');
            redirect('customerdb/addcustomer');
        }
    }

    // file upload functionality
    public function uploadProductExcel()
    {
        if (!empty($_FILES['addProductUploadFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['addProductUploadFile']['name'], PATHINFO_EXTENSION);
            $allowedExtension = ['csv', 'xls', 'xlsx', 'ods', 'xml'];

            if (!in_array($extension, $allowedExtension)) {
                $this->session->set_flashdata('message', 'GAGAL!|error|Format file tidak sesuai!');
                redirect('customerdb/addcustomer');
            } else {
                switch ($extension) {
                    case 'csv':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                        break;
                    case 'ods':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
                        break;
                    case 'xml':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
                        break;
                    case 'xlsx':
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        break;                    
                    default:
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        break;
                }                

                // file path
                $reader->setLoadSheetsOnly('Upload');
                $spreadsheet = $reader->load($_FILES['addProductUploadFile']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, null);            

                // array Count
                $dataUploaded = [];
                $numrow = 1;
                $rowsLimit = 4000;
                foreach ($allDataInSheet as $row) {
                    if ($numrow > 1) {
                        if ($row['B'] == null || $row['B'] == '' || empty($row['B']) ) {
                            continue;
                        } else {
                            $dataUploaded[] = [
                                'category_main' => strtoupper($row['H']),
                                'category_subclass' => strtoupper($row['I']),
                                'category_subspec' => strtoupper($row['J']),
                                'model' => strtoupper($row['C']),
                                'serial_number' => strtoupper($row['D']),
                                'purchase_date' => date("Y-m-d", strtotime($row['E'])),
                                'purchase_value' => (int) $row['I'],
                                'customer_id' => $this->_customerIdByPhone($row['B']),
                                'reg_date' => date("Y-m-d h:i:s", strtotime($row['G'])),
                                'remark' => $row['K'],
                                'saved_by' => $this->session->userdata('userid'),
                                'saved_at' => date("Y-m-d h:i:s")
                            ];
                        }
                    }
                    $numrow++;
                }

                // var_dump($dataUploaded);
                // die;

                $countDataUploaded = count($dataUploaded);

                if ($countDataUploaded > $rowsLimit) {
                    $this->session->set_flashdata("message", "GAGAL!|error|Jumlah data lebih dari '$rowsLimit'");
                    redirect('customerdb/addcustomer');
                } else {                
                    $rowsUploaded = $this->customerdb->uploadProductFromExcel($dataUploaded);
                    if ($rowsUploaded > 0) {
                        $this->session->set_flashdata('message', "BERHASIL|success|Data berhasil diunggah: $countDataUploaded");
                        redirect('customerdb');
                    }
                } 
            }

        } else {
            $this->session->set_flashdata('message', 'GAGAL!|error|Belum ada/file untuk diunggah!');
            redirect('customerdb/addcustomer');
        }
    }

    public function cityByProvince()
    {
        $province = $this->input->post('province');
        $result = $this->customerdb->getCityByProvince($province);

        foreach ($result as $row) {
            echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
        }
    }

    private function _fieldToRecord($rawdata, $newlabels)
    {
        $keys = array_keys($rawdata);

        $result = [];
        for ($i = 0; $i < count($rawdata); $i++) {
            $result[] = [
                'keys' => $keys[$i],
                'labels' => $newlabels[$i],
                'values' => $rawdata[$keys[$i]]
            ];
        }
        return $result;
    }

    private function _generalizedGender($gender)
    {
        $male = ['m', 'l', 'pria', 'laki-laki', 'lakilaki'];
        if (in_array(strtolower($gender), $male)) {
            return 'M';
        } else {
            return 'F';
        }
    }

    private function _getSalesBranch($city, $province)
    {
        $result = $this->customerdb->getSalesBranchByCityProvince($city, $province);
        if ($result == NULL) {
            return NULL;
        } else {
            return $result['sales_branch'];
        }
    }

    private function _phoneToText($phone)
    {
        $check = ['', NULL];
        if (in_array($phone, $check)) {
            return NULL;
        } else {
            return $phone;
        }
    }

    private function _customerIdByPhone($phone)
    {
        return $this->customerdb->getCustomerIdByPhone($phone)['customer_id'];
    }

}
