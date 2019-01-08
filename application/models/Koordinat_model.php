<?php

Class Koordinat_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function find($id) {
        $this->db->where("md5(objek_tipe_6_id)", $id);
        $data = $this->db->get("objek_tipe_6_koordinat");
        return $data->result();
    }
    
    public function create($data = array()) {
        $this->db->insert("objek_tipe_6_koordinat", $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data = array()) {
        $this->db->where("md5(objek_tipe_6_id)", $id);
        $this->db->update("objek_tipe_6_koordinat", $data);
    }
    
    public function delete($id) {
        $this->db->where("md5(objek_tipe_6_id)", $id);
        $this->db->delete("objek_tipe_6_koordinat");
    }
    
}