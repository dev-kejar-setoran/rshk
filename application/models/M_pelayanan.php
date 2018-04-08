<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_pelayanan extends CI_Model {

    function __construct() {
        parent::__construct();
    }
  
    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_pelayanan, judul, deskripsi, icon, created_at,created_by
                FROM t_website_pelayanan 
                WHERE judul LIKE ? AND deskripsi LIKE ?";
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
       return $this->db->insert('t_website_pelayanan', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM t_website_pelayanan 
                WHERE id_pelayanan = ?";
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
        return $this->db->update('t_website_pelayanan', $params, $where);
    }
    
    // delete
    public function get_delete($where){
        return $this->db->delete('t_website_pelayanan', $where);
    }

}

?>