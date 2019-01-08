<?php

Class Categories_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all() {
        $this->db->order_by('name', 'ASC');
        $data = $this->db->get('categories');
        return $data->result();
    }
    
    public function find($id) {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('categories');
        return $data->row();
    }
    
    public function create($data = array()) {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data = array()) {
        $this->db->where('md5(id)', $id);
        $this->db->update('categories', $data);
    }
    
    public function delete($id) {
        $this->db->where('md5(id)', $id);
        $this->db->delete('categories');
    }
    
}