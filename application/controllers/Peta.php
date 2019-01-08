<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Peta extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect("/peta/trayek");
    }
    
    public function trayek() {
    	$data = array(
            'title' => "HOME",
            'container' => "page/peta/trayek"
        );
        $this->load->view('layouts/app', $data);
    }

    public function rencana_tol() {
        $data = array(
            'title' => "HOME",
            'container' => "page/peta/rencana_tol"
        );
        $this->load->view('layouts/app', $data);
    }

    public function wilayah_jalan() {
        $data = array(
            'title' => "HOME",
            'container' => "page/peta/wilayah_jalan"
        );
        $this->load->view('layouts/app', $data);
    }

}
