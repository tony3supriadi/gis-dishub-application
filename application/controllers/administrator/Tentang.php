<?php

Class Tentang extends CI_Controller {
    
    private $navigation = "tentang";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'EDIT TENTANG',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/tentang',
            'page' => $this->pages->find(md5(1))
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function tentang() {
        $action = 1;
        $data = $this->input->post();
        
        if ($action) {
            $this->pages->update(md5(1), $data);
        }
        
        redirect('/administrator/tentang');
    }
    
}