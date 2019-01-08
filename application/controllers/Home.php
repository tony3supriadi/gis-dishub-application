<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title' => "HOME",
            'container' => "page/home"
        );
        $this->load->view('layouts/app', $data);
    }

    public function beaches() {
        $beaches = [];
        foreach ($this->object->all() as $ob) {
            $obt = $this->objeck_tipe->find($ob->kategori_tipe, md5($ob->id));
            $beaches[] = [
                $ob->kategori_id,
                $ob->nama_objek,
                $obt->koordinat_lat,
                $obt->koordinat_long,
                $ob->id,
                $ob->kategori_icon,
                $ob->kategori_tipe
            ];
        }
        echo json_encode($beaches);
    }

    public function set_beaches() {
        $where = array();
        $beaches = [];

        $ids = [];
        $data = $this->input->post('data');
        $expData = explode(",", $data);
        $objek_tipe_6 = "";

        for ($i = 0; $i < count($expData); $i++) {
            $expItem = explode("-", $expData[$i]);
            $ids[] = $expItem[0];

            if ($expItem[1] == "objek_tipe_6") {
                $objek_tipe_6 = "objek_tipe_6";
            }
        }

        if ($objek_tipe_6) {
            $obt = $this->objeck_tipe->find("objek_tipe_6", md5($ob->id));
            if (count($obt)) {
                $beaches[] = [
                    $obt->koordinat_lat,
                    $obt->koordinat_long,
                ];
            }
        } else {
            foreach ($this->object->where_kategori_id($ids) as $ob) {
                $obt = $this->objeck_tipe->find($ob->kategori_tipe, md5($ob->id));
                if ($obt) {
                    $beaches[] = [
                        $ob->kategori_id,
                        $ob->nama_objek,
                        $obt->koordinat_lat,
                        $obt->koordinat_long,
                        $ob->id,
                        $ob->kategori_icon,
                        $ob->kategori_tipe
                    ];
                }
            }
        }

        echo json_encode($beaches);
    }

    public function category() {
        $data = $this->category->all();
        echo json_encode($data);
    }

    public function infoWindow($id) {
        $this->load->view('/layouts/partials/infoWindow', ['id' => $id]);
    }

    public function polyline($id = null) {
        $polyline = [];

        if ($id) {
            foreach ($this->koordinat->find(md5($id)) as $value) {
                $polyline[] = array(
                    "lat" => (float) $value->lat,
                    "lng" => (float) $value->lng
                );
            }
        } else {
            foreach ($this->objeck_tipe->all("objek_tipe_6") as $val) {
                $objek = [];
                foreach ($this->koordinat->find(md5($val->id)) as $value) {
                    $objek[] = array(
                        "lat" => (float) $value->lat,
                        "lng" => (float) $value->lng
                    );
                }
                $polyline[] = $objek;
            }
        }
        echo json_encode($polyline);
    }

}
