<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicearea extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Servicearea_model', 'servicearea');
		$this->load->model('Servicearea2_model', 'servicearea2');
		is_login();
	}

	public function index()
	{
		check_access();
		$data['title'] = 'Service Area';
		// $data['allArea'] = $this->servicearea->getAllArea();
		// $data['allSvccenter'] = $this->servicearea->getAllSvccenter();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('servicearea/all-area', $data);
		$this->load->view('templates/footer', $data);
	}

	public function get_data() {
	    $list = $this->servicearea->get_datatables();
	    $data = [];
	    $no = $this->input->post('start');

	    foreach ($list as $field) {
	        $no++;
	        $row = [];
	        $row[] = $no;
	        $row[] = $field->address;
	        $row[] = $field->subdistrict;
	        $row[] = $field->district;
	        $row[] = $field->city;
	        $row[] = $field->province;
	        $row[] = $field->postal_code;
	        $row[] = '<span class="text-danger">' . $field->remark . '</span>';
	        $row[] = '<span class="badge badge-info">' . $field->sap_code .'</span> <span class="text-info">' . $field->under_svc . '</span>';
	        $row[] = $this->_stringButtonEdit($field->id, $field->notif_type);
	        // $row[] = $field->sap_code;
	        $data[] = $row;
	    }

	    $output = [
	        "draw" => $this->input->post('draw'),
	        "recordsTotal" => $this->servicearea->count_all(),
	        "recordsFiltered" => $this->servicearea->count_filtered(),
	        "data" => $data,
	    ];
	    echo json_encode($output);
	}

	public function ajax_list()
    {
        $list = $this->servicearea->get_datatables();
        $data = [];
        $no = $this->input->post('start');

        //looping data
        foreach ($list as $row) {
            $groupButtonString = '';
            $no++;
            $rows = [];
            //row terakhir digunakan untuk btn edit dan delete
            $rows[] = $row['address'];
            $rows[] = $row['subdistrict'];
            $rows[] = $row['district'];
            $rows[] = $row['city'];
            $rows[] = $row['province'];
            $rows[] = '<span class="text-danger">' . $row['remark'] . '</span>';
            $rows[] = '<span class="badge badge-info">' . $row['sap_code'] .'</span> <span class="text-info">' . $row['under_svc'] . '</span>';
            $rows[] =  $this->_stringButtonEdit($row['id'], $row['notif_type']);
            $data[] = $rows;
        }
        $output = [
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->servicearea->count_all(),
            "recordsFiltered" => $this->servicearea->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    private function _stringButtonEdit($id, $notiftype)
    {
        $allowedAccess = [1, 9];
        $out = '';
        if (in_array ($this->session->userdata('useraccess'), $allowedAccess)){
            $out = '<a href="' . base_url('servicearea/edit/') . $id . '" class="text-secondary" title="Edit data"><i class="fas fa-edit"></i></span></a> <a href="' . base_url('servicearea/delete/') . $id . '" class="text-danger buttonServiceareaDelete" title="Delete data" style="cursor: pointer; text-decoration: none;"><i class="fas fa-times"></i></a>';
        } else {
            $out = '<span class="badge badge-secondary font-weight-normal">' . $notiftype .'</span>';
        }
        return $out;
    }

    // 2nd DB
    public function servicearea()
	{
		check_access();
		$data['title'] = 'Service Area';
		// $data['allArea'] = $this->servicearea2->getAllArea();
		// $data['allSvccenter'] = $this->servicearea2->getAllSvccenter();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('servicearea/all-area-old', $data);
		$this->load->view('templates/footer', $data);
	}

	public function get_data_db2() {
	    $list = $this->servicearea2->get_datatables();
	    $data = [];
	    $no = $this->input->post('start');

	    foreach ($list as $field) {
	        $no++;
	        $row = [];
	        $row[] = $no;
	        $row[] = $field->address;
	        $row[] = $field->subdistrict;
	        $row[] = $field->district;
	        $row[] = $field->city;
	        $row[] = $field->province;
	        $row[] = $field->postal_code;
	        $row[] = '<span class="text-danger">' . $field->remark . '</span>';
	        $row[] = '<span class="badge badge-info">' . $field->sap_code .'</span> <span class="text-info">' . $field->under_svc . '</span>';
	        $row[] = $this->_stringButtonEdit($field->id, $field->notif_type);
	        // $row[] = $field->sap_code;
	        $data[] = $row;
	    }

	    $output = [
	        "draw" => $this->input->post('draw'),
	        "recordsTotal" => $this->servicearea2->count_all(),
	        "recordsFiltered" => $this->servicearea2->count_filtered(),
	        "data" => $data,
	    ];
	    echo json_encode($output);
	}

	public function ajax_list_db2()
    {
        $list = $this->servicearea2->get_datatables();
        $data = [];
        $no = $this->input->post('start');

        //looping data
        foreach ($list as $row) {
            $groupButtonString = '';
            $no++;
            $rows = [];
            //row terakhir digunakan untuk btn edit dan delete
            $rows[] = $row['address'];
            $rows[] = $row['subdistrict'];
            $rows[] = $row['district'];
            $rows[] = $row['city'];
            $rows[] = $row['province'];
            $rows[] = '<span class="text-danger">' . $row['remark'] . '</span>';
            $rows[] = '<span class="badge badge-info">' . $row['sap_code'] .'</span> <span class="text-info">' . $row['under_svc'] . '</span>';
            $rows[] =  $this->_stringButtonEdit($row['id'], $row['notif_type']);
            $data[] = $rows;
        }
        $output = [
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->servicearea2->count_all(),
            "recordsFiltered" => $this->servicearea2->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

	public function add()
	{
		$data['title'] = 'Add Service Area';
		$data['allSvccenter'] = $this->servicearea->getAllSvccenter();

		$this->form_validation->set_rules('addServiceareaAddress', 'Alamat/gedung/jalan', 'trim');
		$this->form_validation->set_rules('addServiceareaCity', 'Kota/kabupaten', 'trim|required');
		$this->form_validation->set_rules('addServiceareaProvince', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('addServiceareaPostalcode', 'Kode Pos', 'trim|numeric');
		$this->form_validation->set_rules('addServiceareaUnderservice', 'Service center', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('servicearea/add-area', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$newData = [
				'address' => $this->input->post('addServiceareaAddress'),
				'subdistrict' => $this->input->post('addServiceareaSubdistrict'),
				'district' => $this->input->post('addServiceareaDistrict'),
				'city' => $this->input->post('addServiceareaCity'),
				'province' => $this->input->post('addServiceareaProvince'),
				'postal_code' => $this->input->post('addServiceareaPostalcode'),
				'under_svc' => $this->input->post('addServiceareaUnderservice'),
				'notif_type' => $this->input->post('addServiceareaNotiftype'),
				'sap_code' => $this->input->post('addServiceareaSapcode'),
				'remark' => $this->input->post('addServiceareaRemark'),
				'saved_by' => $this->session->userdata('userid'),
				'saved_at' => date("Y-m-d H:i:s")
			];

			if ($this->servicearea->addArea($newData) > 0) {
				$this->session->set_flashdata('message', "Berhasil|success|Service Area berhasil ditabahkan!");
				redirect('servicearea/index');
			}
		}

	}

	public function editarea()
	{
		admin_access();
		$data['title'] = 'Edit Service Area';

		$this->form_validation->set_rules('editServiceAreaNewUnderservice', 'Area Servis', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['allProvinces'] = $this->servicearea->getAllProvinces();
			$data['allSvccenter'] = $this->servicearea->getAllSvccenter();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('servicearea/edit-area-multi', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$updateData = [
				'province' => $this->input->post('editServiceAreaNewProvince') ?? '',
				'cityList' => $this->input->post('editServiceAreaNewCity[]') ?? '',
				'districtList' => $this->input->post('editServiceAreaNewDistrict[]') ?? '',
				'subdistrictList' => $this->input->post('editServiceAreaNewSubdistrict[]') ?? '',
				'under_svc' => $this->input->post('editServiceAreaNewUnderservice') ?? '',
				'notif_type' => $this->input->post('editServiceAreaNewNotiftype') ?? '',
				'sap_code' => $this->input->post('editServiceAreaNewSapcode') ?? '',
				'remark' => $this->input->post('editServiceAreaNewRemark') ?? ''
			];

			if ($this->servicearea->updateMultiArea($updateData) > 0) {
				$this->session->set_flashdata('message', "Berhasil|success|Service Area berhasil diperbaharui!");
				redirect('servicearea/index');
			}	
		}
	}

	public function areabypostalcode()
	{
		echo json_encode($this->servicearea->getAreaByPostalcode($this->input->post('postalcode')));
	}

	public function citybyprovice()
	{
		$result = $this->servicearea->getCityByProvince($this->input->post('province'));
		$out = '';
		foreach($result as $row) {
			$out .= '<option value="' . $row['city'] .'">' . $row['city'] . '</option>';
		}
		echo $out;
	}

	public function districtsbycites()
	{
		echo json_encode($this->servicearea->getDistrictByCity($this->input->post('province'), $this->input->post('cityid')));
	}

	public function subdistrictsbydistrict()
	{
		echo json_encode($this->servicearea->getSubdistrictByDistrict($this->input->post('province'), $this->input->post('cityid'), $this->input->post('districts')));
	}

	public function getservicearebycitydistrict()
	{
		$province = $this->input->post('province') ?? '';
		$cityList = $this->input->post('city') ?? '';
		$districtList = $this->input->post('district') ?? '';
		$result = $this->servicearea->getCoveredServiceCenter($cityList, $districtList);

		$out = '';
		if (count($result) > 1) {
			$out = [
				'under_svc' => '',
				'notif_type' => '',
				'sap_code' => '',
				'remark' => ''
			];
		} else {
			$out = $result[0];
		}
		echo json_encode($out);
	}

	public function edit($id)
	{
		admin_access();
		$data['title'] = 'Edit Service Area';
		$data['area'] = $this->servicearea->getAreaById($id);
		$data['allSvccenter'] = $this->servicearea->getAllSvccenter($id);

		$this->form_validation->set_rules('editServiceareaAddress', 'Alamat/gedung/jalan', 'trim');
		$this->form_validation->set_rules('editServiceareaCity', 'Kota/kabupaten', 'trim|required');
		$this->form_validation->set_rules('editServiceareaProvince', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('editServiceareaPostalcode', 'Kode Pos', 'trim|numeric');
		$this->form_validation->set_rules('editServiceareaUnderservice', 'Service center', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('servicearea/edit-area', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$updateData = [
				'id' => $this->input->post('editServiceareaId'),
				'address' => $this->input->post('editServiceareaAddress'),
				'subdistrict' => strtoupper($this->input->post('editServiceareaSubdistrict')),
				'district' => strtoupper($this->input->post('editServiceareaDistrict')),
				'city' => strtoupper($this->input->post('editServiceareaCity')),
				'province' => strtoupper($this->input->post('editServiceareaProvince')),
				'postal_code' => $this->input->post('editServiceareaPostalcode'),
				'under_svc' => $this->input->post('editServiceareaUnderservice'),
				'notif_type' => $this->input->post('editServiceareaNotiftype'),
				'sap_code' => $this->input->post('editServiceareaSapcode'),
				'remark' => $this->input->post('editServiceareaRemark'),
				'updated_by' => $this->session->userdata('userid'),
				'updated_at' => date("Y-m-d H:i:s")
			];

			if ($this->servicearea->updateArea($updateData) > 0) {
				$this->session->set_flashdata('message', "Berhasil|success|Service Area berhasil diperbaharui!");
				redirect('servicearea/index');
			}
		}
	}

	public function delete($id)
	{
		if ($this->servicearea->delete($id) > 0) {
			$this->session->set_flashdata('message', "Berhasil|info|Data berhasil dihapus!");
			redirect('servicearea/index');
		}
	}

}
