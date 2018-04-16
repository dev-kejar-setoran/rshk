<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_cara_bayar extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    // variabel untuk nama tabel
    // public $db_tabel = 'guru';

    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT *
                FROM m_cara_bayar 
                WHERE nama_cara_bayar LIKE ?";
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
        return $this->db->insert('m_cara_bayar', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_cara_bayar 
                WHERE id_cara_bayar = ?";
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
        return $this->db->update('m_cara_bayar', $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_cara_bayar', $where);
    }


}

?>