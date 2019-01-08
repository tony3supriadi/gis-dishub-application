<?php

Class Password extends CI_Controller {
    
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
            'title' => 'PASSWORD',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/settings/password'
        );
        
        $this->load->view('/administrator/layouts/app.php', $data);
    }
    
    public function password() {
        $action = 1;
        $id = $this->session->userdata('login-id');
        $old = $this->input->post('password');
        $new = $this->input->post('baru_password');
        $konf = $this->input->post('konfirmasi_password');
        
        if (md5($old) != $this->session->userdata('login-password')) {
            $action = 0;
            $this->session->set_flashdata('MsgErrPassword', 'PASSWORD LAMA SALAH..');
        }
        
        if ($old == $new) {
            $action = 0;
            $this->session->set_flashdata('MsgErrNewPassword', 'PASSWORD BARU TIDAK BOLEH SAMA');
        }
        
        if ($new != $konf) {
            $action = 0;
            $this->session->set_flashdata('MsgErrConfPassword', 'KONFIRMASI PASSWORD SALAH');
        }
        
        if ($action) {
            $this->users->update(md5($id), [
                'password' => md5($new)
            ]);
            $this->session->set_userdata(['login-password' => md5($new)]);
            $this->session->set_flashdata('Success', "AKSI UBAH PASSWORD BERHASIL..");
        }
        
        redirect('/administrator/password');
        
    }
    
}