<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accessmanagement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Accessmanagement_model', 'accessmanagement');
		$this->load->library('form_validation');
		is_login();
	}

	public function index()
	{
		check_access();
		$data['title'] = 'Access Management';
		if ($this->session->userdata('useraccess') !== '9') {
			$data['allAccessLevel'] = $this->accessmanagement->getAllAccessLevelWithoutSuperadmin();
		} else {
			$data['allAccessLevel'] = $this->accessmanagement->getAllAccessLevel();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('accessmanagement/access-level', $data);
		$this->load->view('templates/footer', $data);
	}	

	public function menu()
	{	
		check_access();			
		$data['title'] = 'Menu Access';

		if (!$this->input->post('accessMenuSelectLevel')) {
			$data['roleAccess'] = $this->session->userdata('useraccess');
		} else {
			$data['roleAccess'] = $this->input->post('accessMenuSelectLevel');
		}

		$data['role'] = $this->accessmanagement->getRoleByAccessLevel($data['roleAccess']);
		$data['allMenuAccess'] = $this->accessmanagement->getAllMenuAccess($data['roleAccess']);
		$data['allAccessLevel'] = $this->accessmanagement->getAllAccessLevel();
		$data['unassignedMenu'] = $this->accessmanagement->getUnassignedMenu($data['roleAccess']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('accessmanagement/menu-access', $data);
		$this->load->view('templates/footer', $data);
	}

	public function submenu()
	{
		check_access();
		$data['title'] = 'Submenu Access';

		if (!$this->input->post('accessSubmenuSelectLevel')) {
			$data['roleAccess'] = $this->session->userdata('useraccess');
		} else {
			$data['roleAccess'] = $this->input->post('accessSubmenuSelectLevel');
		}

		$data['role'] = $this->accessmanagement->getRoleByAccessLevel($data['roleAccess']);
		$data['allSubmenuAccess'] = $this->accessmanagement->getAllSubmenuAccess($data['roleAccess']);
		$data['allAccessLevel'] = $this->accessmanagement->getAllAccessLevel();
		$data['unassignedSubmenu'] = $this->accessmanagement->getUnassignedSubmenu($data['roleAccess']);
		$data['allMenus'] = $this->accessmanagement->getAllMenus($data['roleAccess']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('accessmanagement/submenu-access', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addMenuAccess()
	{
		$data = $this->input->post('data');
		//var_dump($data);die;
        if ($this->accessmanagement->performAddMenuAccess($data) > 0) {
            $this->session->set_flashdata('message', 'Success|success|Menu access successly added!');
            redirect('accessmanagement/menu');
        }
	}

	public function dismissMenuAccess()
	{
		$menu_id = $this->uri->segment(3);
        $role_access = $this->uri->segment(4);
        if ($this->accessmanagement->performDismissMenuAccess($menu_id, $role_access) > 0) {
            $this->session->set_flashdata('message', 'Success|info|Menu access successly dismissed!');
            redirect('accessmanagement/menu');
        }
	}

	public function toggleSubmenuAccess()
	{
		$submenuid = $this->input->post('submenuid');
        $roleaccess = $this->input->post('roleaccess');
        $checkAccess = $this->input->post('checkAccess');

        if ($checkAccess == 'false') {
            $this->accessmanagement->deleteSubmenuAccess($submenuid, $roleaccess);
        } else {
            $this->accessmanagement->addSubmenuAccess($submenuid, $roleaccess);
        }   
	}

}
