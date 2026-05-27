<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partorder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
		check_access();
		$data['title'] = 'Part Order';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('partorder/all-order', $data);
		$this->load->view('templates/footer', $data);
	}

	public function bybranch()
	{
		check_access();
		$data['title'] = 'Order Part per Branch';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('partorder/all-order', $data);
		$this->load->view('templates/footer', $data);
	}

	public function report()
	{
		check_access();
		$data['title'] = 'Part Order Report';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('partorder/all-order', $data);
		$this->load->view('templates/footer', $data);
	}
}
