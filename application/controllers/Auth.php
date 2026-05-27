<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Usermanagement_model', 'usermanagement');
    }

    public function index()
    {
        $userid = $this->input->post('loginUsername');
        $password = $this->input->post('loginPassword');

        $this->_login($userid, $password);
    }

    public function tes()
    {
        var_dump($_POST);
    }

    public function loginfromlogsheet()
    {
        $userid = $this->input->post('logsheetUserid');
        $password = $this->input->post('logsheetPassword');

        //redirect('cost');
        $user = $this->auth->getUser($userid);

        if ($user) {
            //Cek Password            
            if (password_verify($password, $user['password'])) {
                $data = [
                    'userid' => $user['userid'],
                    'useraccess' => $user['access'],
                    'accesslevel' => $user['access_level'],
                    'useraccessname' => $user['role_name'],
                    'userfullname' => $user['name'],
                    'icon' => $user['icon'],
                    'areascope' => $user['area_scope'],
                    'ip_address' => $this->input->ip_address(),
                    'latest_login' => date("Y-m-d H:i:s"),
                ];
                $this->session->set_userdata($data);
                $this->usermanagement->setLoginFrom($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Incorrect password!</div>');
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Invalid Login</div>');
            redirect('dashboard');
        }
    }

    private function _login($userid, $password)
    {
        $user = $this->auth->getUser($userid);

        if ($user) {
            //Cek Password            
            if (password_verify($password, $user['password'])) {
                $data = [
                    'userid' => $user['userid'],
                    'useraccess' => $user['access'],
                    'accesslevel' => $user['access_level'],
                    'useraccessname' => $user['role_name'],
                    'userfullname' => $user['name'],
                    'icon' => $user['icon'],
                    'areascope' => $user['area_scope'],
                    'ip_address' => $this->input->ip_address(),
                    'latest_login' => date("Y-m-d H:i:s"),
                ];

                $this->session->set_userdata($data);
                $this->usermanagement->setLoginFrom($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Incorrect password!</div>');
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Invalid Login</div>');
            redirect('dashboard');
        }
    }

    public function logout()
    {
        $this->usermanagement->deleteLoginFrom($this->session->userdata());
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function noaccess()
    {
        $this->load->view('templates/noaccess');
    }
}
