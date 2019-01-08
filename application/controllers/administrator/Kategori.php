<?php

Class Kategori extends CI_Controller {

    private $navigation = "kategori";

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('login-key')) {
            $this->session->set_flashdata('failed', 'Harus Login Dahulu!!');
            redirect('/login');
        }
    }

    public function index() {
        $data = array(
            'title' => 'KATEGORI',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/kategori/index'
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function create() {
        $name = $this->input->post('name');
        $type = $this->input->post('type');

        $config['upload_path'] = './assets/img/icons/marker/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = str_replace(" ", "-", strtolower($name)) . "_" . time() . ".png";
        $config['max_size'] = '100';
        $config['max_width'] = '20';
        $config['max_height'] = '20';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('icon')) {
            $this->category->create([
                'name' => $name,
                'icon' => $config['file_name'],
                'type' => $type
            ]);
        }
        redirect('/administrator/kategori');
    }

    public function edit($id) {
        $data = array(
            'title' => 'EDIT | KATEGORI',
            'navigation' => $this->navigation,
            'container' => '/administrator/page/kategori/edit',
            'category' => $this->category->find($id)
        );

        $this->load->view('/administrator/layouts/app.php', $data);
    }

    public function update($id) {
        $name = $this->input->post('name');
        $icon = $_FILES['icon']['name'];
        $type = $this->input->post('type');

        if (!empty($icon)) {
            $config['upload_path'] = './assets/img/icons/marker/';
            $config['allowed_types'] = 'png';
            $config['file_name'] = str_replace(" ", "-", strtolower($name)) . "_" . time() . ".png";
            $config['max_size'] = '100';
            $config['max_width'] = '20';
            $config['max_height'] = '20';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                $this->category->update($id, [
                    'name' => $name,
                    'icon' => $config['file_name'],
                    'type' => $type
                ]);

                $this->db->where('md5(kategori_id)', $id)->update('objek', [
                    "kategori_nama" => $name,
                    "kategori_icon" => $config['file_name'],
                    "kategori_tipe" => $type
                ]);
            }
        } else {
            $this->category->update($id, [
                'name' => $name,
                'type' => $type
            ]);

            $this->db->where('md5(kategori_id)', $id)->update('objek', [
                "kategori_nama" => $name,
                "kategori_tipe" => $type
            ]);
        }
        redirect('/administrator/kategori/edit/' . $id);
    }

    public function delete($id) {
        $this->category->delete($id);
        redirect('/administrator/kategori');
    }

    public function findget($id) {
        $data = $this->category->find(md5($id));
        echo json_encode($data);
    }

}
