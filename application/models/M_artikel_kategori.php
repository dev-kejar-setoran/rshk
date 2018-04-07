<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_artikel_kategori extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_artikel_kategori, nama_kategori, deskripsi, cover, created_at, created_by 
                FROM t_artikel_kategori 
                WHERE nama_kategori LIKE ? ";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    // tambah
    public function get_add($params) {
        return $this->db->insert('t_artikel_kategori', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM t_artikel_kategori 
                WHERE id_artikel_kategori = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // ubah
    public function get_edit($params, $where) {
        return $this->db->update('t_artikel_kategori', $params, $where);
    }
    
    // delete
    public function get_delete($where){
        return $this->db->delete('t_artikel_kategori', $where);
    }


}

?>