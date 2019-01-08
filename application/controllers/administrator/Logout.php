<?php

Class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }

    public function index() {
        session_destroy();
        redirect('/login');
    }

}
