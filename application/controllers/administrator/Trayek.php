<?php

Class Trayek extends CI_Controller {
    
    private $navigation = "trayek";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'EDIT TRAYEK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/trayek',
            'page' => $this->pages->find(md5(2))
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function trayek() {
        $action = 1;
        
        if ($action) {
            $config['upload_path'] = './assets/img/peta/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = "trayek_" . time() . ".jpg";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('content')) {
                $this->pages->update(md5(2), ["content" => $config['file_name']]);
            } else {
                echo json_encode($this->upload->display_errors());
            }
        }        
        redirect('/administrator/trayek');
    }

    public function files() {
        $action = 1;
        
        if ($action) {
            $config['upload_path'] = './assets/files/';
            $config['allowed_types'] = 'xls|xlsx|csv|ods';
            $config['file_name'] = "file-trayek_" . time() . ".xls";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $this->pages->update(md5(4), [
                    "content" => "file-trayek_" . time() . ".xls"
                ]);
            } else {
                echo json_encode($this->upload->display_errors());
            }
        }        
        redirect('/administrator/trayek');
    }
    
}