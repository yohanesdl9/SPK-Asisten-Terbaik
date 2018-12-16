<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
    }

    public function index(){
        $this->load->view('login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $remember_username = $this->input->post('remember_username');
        if ($remember_username == 'on'){
            $this->input->set_cookie('username', $email, 60000 * 240);
        }
        if ($email == 'baa@stiki.ac.id' && $password == 'baastikielang'){
            $session_data = ['isLogin' => TRUE];
            $this->session->set_userdata($session_data);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('login_error', 'Email atau password salah. Silahkan mencoba lagi');
            redirect('login');
        }
    }
}

?>