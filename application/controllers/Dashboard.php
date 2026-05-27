<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'CCC Info';
		if (!$this->session->userdata('userid')) {
			$this->load->view('dashboard/index', $data);
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('dashboard/dashboard', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}
