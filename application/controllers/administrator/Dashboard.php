<?php

Class Dashboard extends CI_Controller {
    
    private $navigation = "dashboard";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'DASHBOARD',
            'navigation' => $this->navigation,
            'container' => '/administrator/dashboard'
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
}