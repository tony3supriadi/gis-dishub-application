<?php

Class Objek extends CI_Controller {

    private $navigation = "objek";

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }

    public function index() {
        $data = array(
            'title' => 'MARKER OBJEK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/objek/index'
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function view($id) {
        $object = $this->object->find($id);

        $data = array(
            'title' => 'SHOW | MARKER OBJEK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/objek/show',
            'objek' => $object,
            'objekTipe' => $this->objeck_tipe->find($object->kategori_tipe, $id)
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function add() {
        $data = array(
            'title' => 'MARKER OBJEK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/objek/add'
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function create() {
        $action = 1;
        $objek = $this->input->post('objek');
        $objek_tipe = $this->input->post('objek_tipe');
        $latitude = $this->input->post('koordinat_lat');
        $longitude = $this->input->post('koordinat_lng');

        if ($action) {
            $config['upload_path'] = './assets/img/images/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']  = '0';
            $config['file_name'] = str_replace(" ", "-", strtolower($objek['nama_objek'])) . "_" . time() . ".jpg";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $objId = $this->object->create($objek);
                $objek_tipe['objek_id'] = $objId;

                $objek_tipe['foto'] = $config['file_name'];
                $typeId = $this->objeck_tipe->create($objek['kategori_tipe'], $objek_tipe);

                for ($i = 0; $i < count($latitude); $i++) {
                    $this->koordinat->create([
                        "objek_tipe_6_id" => $typeId,
                        "lat" => $latitude[$i],
                        "lng" => $longitude[$i]
                    ]);
                }
            } else {
                echo json_encode($this->upload->display_errors());
            }
            redirect('/administrator/objek');
        }
    }

    public function edit($id) {
        $object = $this->object->find($id);

        $data = array(
            'title' => 'MARKER OBJEK',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/objek/edit',
            'objek' => $object,
            'objekTipe' => $this->objeck_tipe->find($object->kategori_tipe, $id)
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function update($id) {
        $action = 1;
        $objek = $this->input->post('objek');
        $objek_tipe = $this->input->post('objek_tipe');

        if ($action) {
            $this->object->update($id, $objek);
            $objek_tipe['objek_id'] = $objek['id'];

            if ($_FILES['foto']['name']) {
                $config['upload_path'] = './assets/img/images/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = str_replace(" ", "-", strtolower($objek['nama_objek'])) . "_" . time() . ".jpg";

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $objek_tipe['foto'] = $config['file_name'];
                    $this->objeck_tipe->update($objek['kategori_tipe'], $id, $objek_tipe);

                    if ($objek['kategori_tipe'] == "objek_tipe_6") {
                        $koordinat_lat = $this->input->post("koordinat_lat");
                        $koordinat_lng = $this->input->post("koordinat_lng");
                        $this->koordinat->delete(md5($this->input->post("objek_tipe_id")));
                        for ($i = 0; $i < count($koordinat_lat); $i++) {
                            $this->koordinat->create([
                                "objek_tipe_6_id" => $this->input->post("objek_tipe_id"),
                                "lat" => $koordinat_lat[$i],
                                "lng" => $koordinat_lng[$i]
                            ]);
                        }
                    }
                }
            } else {
                $this->objeck_tipe->update($objek['kategori_tipe'], $id, $objek_tipe);

                if ($objek['kategori_tipe'] == "objek_tipe_6") {
                    $koordinat_lat = $this->input->post("koordinat_lat");
                    $koordinat_lng = $this->input->post("koordinat_lng");
                    $this->koordinat->delete(md5($this->input->post("objek_tipe_id")));
                    for ($i = 0; $i < count($koordinat_lat); $i++) {
                        $this->koordinat->create([
                            "objek_tipe_6_id" => $this->input->post("objek_tipe_id"),
                            "lat" => $koordinat_lat[$i],
                            "lng" => $koordinat_lng[$i]
                        ]);
                    }
                }
            }
            redirect('/administrator/objek');
        }
    }

    public function delete($id) {
        $data = $this->object->find($id);
        $this->object->delete($id);
        $find = $this->objeck_tipe->find($data->kategori_tipe, $id);
        $this->koordinat->delete(md5($find->id));
        $this->objeck_tipe->delete($data->kategori_tipe, $id);
        redirect('/administrator/objek');
    }

}
