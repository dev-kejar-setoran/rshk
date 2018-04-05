<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_data_pengguna extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function get_all($params) {
        $sql = "SELECT id_user, nama_lengkap, email, tlp, role, created_at, created_by 
                FROM m_users
                WHERE nama_lengkap LIKE ? ";
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
        return $this->db->insert('m_users', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_users 
                WHERE id_user = ?";
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
        return $this->db->update('m_users', $params, $where);
    }

    // delete
    public function get_delete($where){
        return $this->db->delete('m_users', $where);
    }


}

?>