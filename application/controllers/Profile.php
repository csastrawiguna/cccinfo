<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Profile_model', 'profile');
        is_login();        
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata['userid']])->row_array();
        $data['userDetail'] = $this->profile->getUserById($this->session->userdata['userid']);
        $oldPassword = $data['userDetail']['password'];

        $this->form_validation->set_rules('oldPassword', 'Old password', 'trim|required');
        $this->form_validation->set_rules('newPassword', 'New password', 'trim|required|matches[confirmNewPassword]');
        $this->form_validation->set_rules('confirmNewPassword', 'New password', 'trim|required|matches[newPassword]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            if (password_verify($this->input->post('oldPassword'), $oldPassword) == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Old password not matched!</div>');
            } else {
                $data = [
                    'password' => password_hash($this->input->post('newPassword'), PASSWORD_BCRYPT),
                    'user_id' => $this->session->userdata('userid')
                ];

                if ($this->profile->updatePassword($data) > 0) {
                    $this->session->set_flashdata('message', 'Password update|success|New password successly saved!');
                }
            }
            redirect('profile');
        }
    }

}
