<?php

Class Users_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all() {
        $data = $this->db->get('users');
        return $data->result();
    }
    
    public function find($id) {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('users');
        return $data->row();
    }
    
    public function login($uname, $paswd) {
        $this->db->where('username', $uname);
        $this->db->where('password', md5($paswd));
        $data = $this->db->get('users');
        return $data->row();
    }
    
    public function create($data = array()) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data = array()) {
        $this->db->where('md5(id)', $id);
        $this->db->update('users', $data);
        return $this->find($id);
    }
    
    public function delete($id) {
        $this->db->where('md5(id)', $id);
        $this->db->delete('users');
    }
    
}