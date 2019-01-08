<?php

Class Rencana_tol extends CI_Controller {
    
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
            'title' => 'EDIT RENCANA TOL',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/rencana_tol',
            'page' => $this->pages->find(md5(3))
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function rencana_tol() {
        $action = 1;
        
        if ($action) {
            $config['upload_path'] = './assets/img/peta/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = "rencana-tol_" . time() . ".jpg";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('content')) {
                $this->pages->update(md5(3), ["content" => $config['file_name']]);
            } else {
                echo json_encode($this->upload->display_errors());
            }
        }        
        redirect('/administrator/rencana-tol');
    }
}