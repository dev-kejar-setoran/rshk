<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_data_pasien extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    // variabel untuk nama tabel
    // public $db_tabel = 'guru';

    // get list kewarganegaraan 
    public function get_kewarganegaraan() {
        $query = $this->db->get('m_kewarganegaraan');
        if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $query->free_result();
            } else {
                $result = array();
            }
        return $result;
    }
    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_pasien, nama_pasien, nomor_kartu, tempat_lahir,tgl_lahir, created_at, created_by 
                FROM m_data_pasien 
                WHERE nama_pasien LIKE ? AND nomor_kartu LIKE ?";
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
        return $this->db->insert('m_data_pasien', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_data_pasien 
                WHERE id_pasien = ?";
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
        return $this->db->update('m_data_pasien', $params, $where);
    }

    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_data_pasien', $where);
    }


}

?>