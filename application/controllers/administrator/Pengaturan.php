<?php

Class Pengaturan extends CI_Controller {
    
    private $navigation = "pengaturan";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'PENGATURAN',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/pengaturan',
            'setting' => $this->settings->find(md5(1))
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function pengaturan() {
        $action = 1;
        $data = $this->input->post();
        
        if ($action) {
            $this->settings->update(md5(1), $data);
        }
        
        redirect('/administrator/pengaturan');
    }
    
}