<?php

Class Object_tipe_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all($table) {
        $data = $this->db->get($table);
        return $data->result();
    }
    
    public function find($table, $id) {
        $this->db->where('md5(objek_id)', $id);
        $data = $this->db->get($table);
        return $data->row();
    }
    
    public function create($table, $data = array()) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function update($table, $id, $data = array()) {
        $this->db->where('md5(objek_id)', $id);
        $this->db->update($table, $data);
    }
    
    public function delete($table, $id) {
        $this->db->where('md5(objek_id)', $id);
        $this->db->delete($table);
    }
    
}