<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Branch_model', 'branch');
		is_login();
	}

	public function index()
	{
		check_access();
		$data['title'] = 'Service Center';
		$data['allBranches'] = $this->branch->getAllBranches();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('branch/all-svcbranch', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getDetailServiceBranch()
	{
		$id = $this->input->post('id');
		echo json_encode($this->branch->getDetailServiceBranchById($id));
	}

	public function sales()
	{
		check_access();
		$data['title'] = 'Sales & Marekting Office';
		$data['allBranchesSales'] = $this->branch->getAllBranchesSales();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('branch/all-sales-mkt', $data);
		$this->load->view('templates/footer', $data);
	}

	public function location()
	{
		$data['title'] = 'Ancer-ancer SVC center';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('branch/ancer-ancer', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit()
	{
		$data['title'] = 'Edit SVC center';

		$id = $this->uri->segment(3);
		$data['detailServiceCenter'] = $this->branch->getDetailServiceBranchById($id);
		$data['allUnderBranch'] = $this->branch->getAllUnderBranch();
		$data['allRegion'] = $this->branch->getAllRegion();
		$data['allTechnician'] = $this->branch->getAllTechnician();

		$this->form_validation->set_rules('editServiceType', 'Jenis/Type Service Center', 'required');
		$this->form_validation->set_rules('editServiceName', 'Nama Service', 'required|trim');
		$this->form_validation->set_rules('editServicePhone1', 'No Telepon #1', 'required|trim');
		// $this->form_validation->set_rules('editServiceEmail', 'Alamat Email', 'valid_email');
		$this->form_validation->set_rules('editServiceUnderbranch', 'Cabang Induk', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('branch/edit-svcbranch', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$updateData = [
				'id' => $this->input->post('editServiceId'),
				'svc_type' => $this->input->post('editServiceType'),
				'svc_name' => $this->_serviceNameTager($this->input->post('editServiceType'), $this->input->post('editServiceName')),
				'svc_name_group' => $this->input->post('editServiceNameGroup'),
				'address' => $this->input->post('editServiceAddress'),
				'phone1' => $this->input->post('editServicePhone1'),
				'phone2' => $this->input->post('editServicePhone2'),
				'phone3' => $this->input->post('editServicePhone3'),
				'phone4' => $this->input->post('editServicePhone4'),
				'phone_ext' => $this->input->post('editServiceExtention'),
				'email' => $this->input->post('editServiceEmail'),
				'sap_code' => $this->input->post('editServiceSapcode'),
				'under_branch' => $this->input->post('editServiceUnderbranch'),
				'region' => $this->input->post('editServiceRegion'),
				'timezone' => $this->input->post('editServiceTimezone'),
				'svchead' => $this->input->post('editServiceSvchead'),
				'remark' => $this->input->post('editServiceRemark'),
				'status' => $this->input->post('editServiceStatus'),
				'updated_by' => $this->session->userdata('userid'),
				'updated_at' => date("Y-m-d H:i:s")
			];	

			if ($this->branch->editServiceBranch($updateData) > 0) {
				$this->session->set_flashdata('message', 'Berhasil|success|Data service center di-update!');
				redirect('branch/index');
			} else {
				$this->session->set_flashdata('message', 'Gagal|error|Ada isian yang kurang!');
				redirect('branch/index');
			}
		}

	}

	public function addservice()
	{
		$data['title'] = 'Tambah Service center';

		$this->form_validation->set_rules('addServiceType', 'Jenis/Type Service Center', 'required');
		$this->form_validation->set_rules('addServiceName', 'Nama Service', 'required|trim');
		$this->form_validation->set_rules('addServicePhone1', 'No Telepon #1', 'required|trim');
		// $this->form_validation->set_rules('addServiceEmail', 'Alamat Email', 'valid_email');
		$this->form_validation->set_rules('addServiceUnderbranch', 'Cabang Induk', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['allUnderBranch'] = $this->branch->getAllUnderBranch();
			$data['allRegion'] = $this->branch->getAllRegion();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('branch/add-svcbranch', $data);
			$this->load->view('templates/footer', $data);	
		} else {
			$newData = [
				'svc_type' => $this->input->post('addServiceType'),
				'svc_name' => $this->_serviceNameTager($this->input->post('addServiceType'), $this->input->post('addServiceName')),
				'svc_name_group' => $this->_serviceNameGroup($this->input->post('addServiceType')),
				'address' => $this->input->post('addServiceAddress'),
				'phone1' => $this->input->post('addServicePhone1'),
				'phone2' => $this->input->post('addServicePhone2'),
				'phone3' => $this->input->post('addServicePhone3'),
				'phone4' => $this->input->post('addServicePhone4'),
				'phone_ext' => $this->input->post('addServiceExtention'),
				'email' => $this->input->post('addServiceEmail'),
				'sap_code' => $this->input->post('addServiceSapcode'),
				'under_branch' => $this->input->post('addServiceUnderbranch'),
				'region' => $this->input->post('addServiceRegion'),
				'timezone' => $this->input->post('addServiceTimezone'),
				'remark' => $this->input->post('addServiceRemark'),
				'status' => 'active',
				'saved_by' => $this->session->userdata('userid'),
				'saved_at' => date("Y-m-d H:i:s")
			];

			if ($this->branch->addNewServiceBranch($newData) > 0) {
				$this->session->set_flashdata('message', 'Berhasil|success|Data service center disimpan!');
				redirect('branch/index');
			} else {
				$this->session->set_flashdata('message', 'Gagal|error|Ada isian yang kurang!');
				redirect('branch/index');
			}	
		}
	}

	private function _serviceNameTager($svc_type, $svc_name)
	{
		$editedName = '';
		$addedName = ['SDSS', 'SSR', 'SASS', 'SSC', 'SAAC', 'SAIC'];
		$arr = explode(" ", $svc_name);
		if (in_array(strtoupper($arr[0]), $addedName) || strtoupper($svc_type) == 'BRANCH') {
			$editedName = $svc_name;
		} else {
			$editedName = $svc_type . ' ' . $svc_name;
		}
		return $editedName;
	}

	private function _serviceNameGroup($svc_type)
	{
		$groupName = '';
		if (strtoupper($svc_type) == 'SASS') {
			$groupName = $this->input->post('addServiceNameGroup');
		} else {
			$groupName = $this->input->post('addServiceName');
		}
		return $groupName;
	}

}
