<?php

Class Settings_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function find($id) {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('settings');
        return $data->row();
    }
    
    public function update($id, $data = array()) {
        $this->db->where('md5(id)', $id);
        $this->db->update('settings', $data);
    }
    
}