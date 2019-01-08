<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Error404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title' => "404 ERROR - Page Not Found",
            'container' => "page/error/pagenotfound"
        );
        $this->load->view('layouts/app', $data);
    }

}
