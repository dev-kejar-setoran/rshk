<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_spesialisasi extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_spesialisasi, nama_spesialisasi, deskripsi, created_at, created_by 
                FROM m_spesialisasi 
                WHERE nama_spesialisasi LIKE ?";
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
        return $this->db->insert('m_spesialisasi', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_spesialisasi 
                WHERE id_spesialisasi = ?";
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
        return $this->db->update('m_spesialisasi', $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_spesialisasi', $where);
    }

}