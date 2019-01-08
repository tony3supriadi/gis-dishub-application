<?php

Class Users extends CI_Controller {
    
    private $navigation = "users";
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }
    
    public function index() {
        $data = array(
            'title' => 'USERS',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/users/index'
        );
        
        $this->load->view('/administrator/layouts/app', $data);
    }
    
    public function view($id) {
        $data = array(
            'title' => 'USERS',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/users/view',
            'user' => $this->users->find($id)
        );
        
        $this->load->view('/administrator/layouts/app', $data);
    }

    public function add() {
        
        if (isset($_POST['submit'])) {
            $this->create();
        }
        
        $data = array(
            'title' => 'ADD - USERS',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/users/add'
        );
        
        $this->load->view('/administrator/layouts/app', $data);
    }
    
    public function create() {
        $action = 1;
        $data = $this->input->post();
        $this->session->set_flashdata($data);
        
        $data['password'] = md5($data['password']);
        
        if ($this->db->where('username', $data['username'])->get('users')->row()) {
            $action = 0;
            $this->session->set_flashdata('MsgErrUsername', 'USERNAME SUDAH DIGUNAKAN.');
            redirect('/administrator/users/add');
        }
        
        if ($action) {
            $this->users->create($data);
            redirect('/administrator/users');
        }
    }
    
    public function edit($id) {
        $data = array(
            'title' => 'USERS',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/users/edit',
            'user' => $this->users->find($id)
        );
        
        $this->load->view('/administrator/layouts/app', $data);
    }
    
    public function update($id) {
        $action = 1;
        $data = $this->input->post();
        
        if ($action) {
            $this->users->update($id, $data);
        }
        redirect('/administrator/users');
    }
    
    public function delete($id) {
        $this->users->delete($id);
        redirect('/administrator/users');
    }
    
}