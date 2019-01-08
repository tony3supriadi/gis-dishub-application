<?php

Class Object_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all() {
        $this->db->order_by("id", "DESC");
        $data = $this->db->get('objek');
        return $data->result();
    }
    
    public function pagination($number, $offset) {
        $array = [];
        $object = $this->db->get('objek', $number, $offset)->result();
        foreach ($object as $itemObject) {
            $itemObjectTipe = $this->objeck_tipe->find($itemObject->kategori_tipe, md5($itemObject->id));
            if (count($itemObjectTipe)) {
                $array[] = [
                    "id" => $itemObject->id,
                    "nama_objek" => $itemObject->nama_objek,
                    "foto" => $itemObjectTipe->foto
                ];
            }
        }
        return $array;
    }


    public function find($id) {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('objek');
        return $data->row();
    }
    
    public function count($cat) {
        $counts = [];
        $this->db->where('kategori_id', $cat);
        $data = $this->db->get('objek')->result();
        foreach ($data as $val) {
            $type = $this->objeck_tipe->find($val->kategori_tipe, md5($val->id));
            if (count($type)) {
                $counts[] = $type;
            }
        }
        return count($counts);
    }
    
    public function where($data = array()) {
        foreach ($data as $k => $v) {
            $this->db->where($k, $v);
        }
        $result = $this->db->get('objek');
        return $result->result();
    }
    
    public function where_kategori_id($data = array()) {
        for ($i = 0; $i < count($data); $i++) {
            $this->db->or_where("kategori_id", $data[$i]);
        }
        $result = $this->db->get('objek');
        return $result->result();
    }


    public function like($src) {
        $this->db->like('nama_objek', $src);
        $result = $this->db->get('objek');
        return $result->result();
    }
    
    public function or_like($src, $tipe, $category) {
        if ($tipe == "objek_tipe_1") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_1` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`koordinat_lat` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_long` LIKE '%$src%' ESCAPE '!' 
                        OR `km` LIKE '%$src%' ESCAPE '!' 
                        OR `posisi` LIKE '%$src%' ESCAPE '!' 
                        OR `lokasi` LIKE '%$src%' ESCAPE '!' 
                        OR `nama_perlengkapan` LIKE '%$src%' ESCAPE '!' 
                        OR `keberadaan` LIKE '%$src%' ESCAPE '!' 
                        OR `nama_jalan` LIKE '%$src%' ESCAPE '!' 
                        OR `status_jalan` LIKE '%$src%' ESCAPE '!' 
                        OR `keterangan` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } else if ($tipe == "objek_tipe_2") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_2` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`koordinat_lat` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_long` LIKE '%$src%' ESCAPE '!' 
                        OR `jenis` LIKE '%$src%' ESCAPE '!' 
                        OR `panjang` LIKE '%$src%' ESCAPE '!' 
                        OR `lokasi` LIKE '%$src%' ESCAPE '!' 
                        OR `keterangan` LIKE '%$src%' ESCAPE '!' 
                        OR `tipe_jalan` LIKE '%$src%' ESCAPE '!' 
                        OR `status_jalan` LIKE '%$src%' ESCAPE '!' 
                        OR `keberadaan` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } else if ($tipe == "objek_tipe_3") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_3` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`nama_simpang` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_lat` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_long` LIKE '%$src%' ESCAPE '!' 
                        OR `jenis` LIKE '%$src%' ESCAPE '!' 
                        OR `lokasi` LIKE '%$src%' ESCAPE '!' 
                        OR `tahun` LIKE '%$src%' ESCAPE '!' 
                        OR `tipe` LIKE '%$src%' ESCAPE '!' 
                        OR `jenis_lampu` LIKE '%$src%' ESCAPE '!' 
                        OR `keterangan` LIKE '%$src%' ESCAPE '!' 
                        OR `waktu_siklus` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } else if ($tipe == "objek_tipe_4") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_4` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`koordinat_lat` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_long` LIKE '%$src%' ESCAPE '!' 
                        OR `nama_ruas` LIKE '%$src%' ESCAPE '!' 
                        OR `status_jalan` LIKE '%$src%' ESCAPE '!' 
                        OR `jumlah_kejadian` LIKE '%$src%' ESCAPE '!' 
                        OR `jumlah_korban` LIKE '%$src%' ESCAPE '!' 
                        OR `jenis_lampu` LIKE '%$src%' ESCAPE '!' 
                        OR `keterangan` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } else if ($tipe == "objek_tipe_5") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_5` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`koordinat_lat` LIKE '%$src%' ESCAPE '!' 
                        OR `koordinat_long` LIKE '%$src%' ESCAPE '!' 
                        OR `trayek` LIKE '%$src%' ESCAPE '!' 
                        OR `jumlah_trayek` LIKE '%$src%' ESCAPE '!' 
                        OR `tipe` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } else if ($tipe == "objek_tipe_6") {
            $result = $this->db->query("SELECT `objek`.* FROM `objek_tipe_6` JOIN `objek` 
                    ON `objek_id`=`objek`.`id` 
                    WHERE md5(kategori_id)='$category' 
                    AND (`nama_trayek` LIKE '%$src%' ESCAPE '!' 
                        OR `jumlah_trayek` LIKE '%$src%' ESCAPE '!' 
                        OR `keterangan` LIKE '%$src%' ESCAPE '!')");
            return $result->result();
        } 
    }

    public function create($data = array()) {
        $this->db->insert('objek', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data = array()) {
        $this->db->where('md5(id)', $id);
        $this->db->update('objek', $data);
    }
    
    public function delete($id) {
        $this->db->where('md5(id)', $id);
        $this->db->delete('objek');
    }
    
}