<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_artikel_list extends CI_Model {

    function __construct() {
        parent::__construct();
    }
  
    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_artikel_list, judul_artikel, isi, deskripsi_singkat, id_artikel_kategori, slug,created_at,created_by
                FROM t_artikel_list 
                WHERE judul_artikel LIKE ? AND deskripsi_singkat LIKE ?";
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
       return $this->db->insert('t_artikel_list', $params);
    }

    // detail data
    public function get_detail_data($params) {
         $sql = "SELECT *
                FROM t_artikel_list 
                WHERE id_artikel_list = ?";
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
        return $this->db->update('t_artikel_list', $params, $where);
    }
    
    // delete
    public function get_delete($where){
        return $this->db->delete('t_artikel_list', $where);
    }

}

?>