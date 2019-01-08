<?php

Class Kontak extends CI_Controller {
    
    private $navigation = "kontak";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'KONTAK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/kontak/index'
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function view($id) {
        $this->contact->update($id, ['action' => '1']);
        $data = array(
            'title' => 'KONTAK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/kontak/view',
            'contact' => $this->contact->find($id)
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function delete($id) {
        $this->contact->delete($id);
        redirect('/administrator/kontak');
    }
    
}