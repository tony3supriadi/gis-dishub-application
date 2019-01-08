<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('login-key')) {
            redirect('/administrator/dashboard');
        }
    }

    public function index() {
        if (isset($_POST['submit'])) {
            $this->login();
        }
        $this->load->view('administrator/login');
    }

    public function login() {
        $action = 1;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->session->set_flashdata('OldUname', $username);

        if (empty($username)) {
            $action = 0;
            $this->session->set_flashdata('MsgUname', 'Username harus diisi!!');
        }

        if (empty($password)) {
            $action = 0;
            $this->session->set_flashdata('MsgPaswd', 'Password harus diisi!!');
        }

        if ($action) {
            $data = $this->users->login($username, $password);

            if ($data && $data->blokir == 'N') {
                $this->session->set_userdata([
                    'login-id' => $data->id,
                    'login-username' => $data->username,
                    'login-password' => $data->password,
                    'login-instansi' => $data->instansi,
                    'login-alamat' => $data->alamat,
                    'login-key' => $data->key
                ]);
            } else {
                $this->session->set_flashdata('failed', 'Username atau Password Salah!!');
            }
        }

        redirect('/login');
    }

}
