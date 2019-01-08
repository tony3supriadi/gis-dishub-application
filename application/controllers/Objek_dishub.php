<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Objek_dishub extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title' => "OBJEK DISHUB",
            'container' => "page/objek/index",
            'offset' => 1,
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function o($objeck_name) {
        $exp = explode("-", $objeck_name);
        $data = array(
            'title' => strtoupper($exp[0]),
            'container' => "page/objek/objek",
            'objects' => $this->object->where(['md5(kategori_id)' => $exp[1]])
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function d($objeck_name) {
        $exp = explode("-", $objeck_name);
        $data = array(
            'title' => str_replace("_", " ", strtoupper($exp[0])),
            'container' => "page/objek/detail",
            'objek' => $this->object->find($exp[1])
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function page($offset = null) {
        $data = array(
            'title' => "OBJEK DISHUB",
            'container' => "page/objek/index",
            'offset' => $offset
        );
        $this->load->view('layouts/app', $data);
    }

}
