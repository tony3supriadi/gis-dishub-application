<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class P extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function tentang_kami() {
        $data = array(
            'title' => "TENTANG KAMI",
            'container' => "page/p/tentang_kami"
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function kontak() {
        $data = array(
            'title' => "KONTAK",
            'container' => "page/p/kontak",
            'social' => $this->settings->find(md5(1))
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function contact() {
        $action = 1;
        $data = $this->input->post();
        if ($action) {
            $this->contact->create($data);
            $this->session->set_flashdata('success', 'PESAN BERHASIL DIKIRIM. <br /> TUNGGU BALASAN DARI KAMI MELALUI EMAIL YANG ANDA CANTUMKAN!! TERIMA KASIH.');
        }
        redirect('/p/kontak');
    }

}
