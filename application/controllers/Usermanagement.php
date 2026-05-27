<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usermanagement_model', 'usermanagement');
		$this->load->model('Branch_model', 'branch');
		$this->load->library('form_validation');
		is_login();
	}

	public function index()
	{		
		check_access();
		$data['title'] = 'User Management';
		$data['users'] = $this->usermanagement->getAllUser();
		$data['accessLevels'] = $this->usermanagement->getAllAccessLevel();
		// $data['scopes'] = $this->usermanagement->getAllScopes();

		$this->form_validation->set_rules('addUserUserid', 'User ID', 'required|trim');
		$this->form_validation->set_rules('addUserName', 'Fullname', 'required');
		$this->form_validation->set_rules('addUserAccess', 'Access', 'required');

		if ($this->form_validation->run() ==  false ) {	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('usermanagement/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'id' => $this->input->post('addUserUserid'),
				'name' => $this->input->post('addUserName'),
				'access' => $this->input->post('addUserAccess'),
				'area_scope' => $this->input->post('addUserScope'),
				'password' => password_hash('sharp1234', PASSWORD_BCRYPT),
			];

			if ($this->usermanagement->addNewUser($data) > 0 ) {
				$this->session->set_flashdata('message', 'New User|success|You have been successly add new user!');
				redirect('usermanagement/index');
			}
		}
	}

	public function addUserFromLogsheet($data)
	{
		$this->usermanagement->addNewUser($data);
	}

	public function deleteUserById()
	{
		$id = $this->uri->segment(3);
		if ($this->usermanagement->deleteUserById($id) > 0 ) {
			$this->session->set_flashdata('message', 'Delete success|info|User has been successly deleted!');
			redirect('usermanagement');
		}
	}

	public function reset()
	{
		check_access();
		$data['title'] = 'Reset Password User';
		$data['allUsers'] = $this->usermanagement->getAllUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('usermanagement/reset', $data);
		$this->load->view('templates/footer', $data);			
	}

	public function directReset()
	{
		$this->_resetPassword($this->input->post('resetPasswordSelectUserid'));
	}

	private function _resetPassword($userid)
	{
		$resetData = [
			'userid' => $userid,
			'password' => password_hash('sharp1234', PASSWORD_BCRYPT),
		];
		if ($this->usermanagement->resetDefaultPassword($resetData) > 0) {
			$this->session->set_flashdata('message', 'Password di-reset|info|Password berhasil di-reset!');
			redirect('usermanagement/reset');
		}
	}

}
