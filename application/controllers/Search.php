<?php

Class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $search = [];
        $kategori = $this->object->where(['md5(kategori_id)' => $_GET['kategori']]);

        if (count($kategori)) {
            $search = $this->object->or_like($this->input->get('src'), $kategori[0]->kategori_tipe, $_GET['kategori']);
        }
        
        $data = array(
            'title' => "OBJEK DISHUB",
            'container' => "page/search/index",
            'search' => $search
        );

        $this->load->view('layouts/app', $data);
    }

    public function cetak() {
        $kategori = $this->object->where(['md5(kategori_id)' => $_GET['kategori']]);
        $search = $this->object->or_like($this->input->get('src'), $kategori[0]->kategori_tipe, $_GET['kategori']);
        $data = array(
            'keyword' => $this->input->get('src'),
            'search' => $search
        );
        $this->load->view("page/search/cetak", $data);
    }

}
