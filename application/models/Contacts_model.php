<?php

Class Contacts_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('contact');
        return $data->result();
    }

    public function find($id) {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('contact');
        return $data->row();
    }

    public function count() {
        $this->db->where('action', '0');
        $data = $this->db->get('contact');
        return $data->num_rows();
    }

    public function create($data = array()) {
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data = array()) {
        $this->db->where('md5(id)', $id);
        $this->db->update('contact', $data);
    }

    public function delete($id) {
        $this->db->where('md5(id)', $id);
        $this->db->delete('contact');
    }

}
