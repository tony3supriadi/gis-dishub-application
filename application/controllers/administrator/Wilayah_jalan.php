<?php

Class Wilayah_jalan extends CI_Controller {
    
    private $navigation = "rencana_tol";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'EDIT WILAYAH & JALAN',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/wilayah_jalan',
            'page' => $this->pages->find(md5(5))
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function wilayah_jalan() {
        $action = 1;
        
        if ($action) {
            $config['upload_path'] = './assets/img/peta/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = "wilayah-jalan_" . time() . ".jpg";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('content')) {
                $this->pages->update(md5(5), ["content" => $config['file_name']]);
            } else {
                echo json_encode($this->upload->display_errors());
            }
        }        
        redirect('/administrator/wilayah-jalan');
    }
}