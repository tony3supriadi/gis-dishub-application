<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Institusi_wilayah extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title' => "INSTITUSI WILAYAH",
            'container' => "page/institusi/index"
        );
        $this->load->view('layouts/app', $data);
    }
    
    public function w($wl = null) {
        
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

}
