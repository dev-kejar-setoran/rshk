<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_jabatan_dokter extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    // variabel untuk nama tabel
    // public $db_tabel = 'guru';

    // fungsi tampil semua
    public function get_all($params) {
       $sql = "SELECT id_jabatan_dokter, nama_jabatan_dokter, deskripsi, created_at, created_by 
                FROM m_jabatan_dokter
                WHERE nama_jabatan_dokter LIKE ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    public function get_spesialsisasi() {
      return $this->db->get('m_spesialisasi');  
    }    

    // tambah
    public function get_add($params) {
        return $this->db->insert('m_jabatan_dokter', $params);
    }

    // detail data
    public function get_detail_data($params) {
       $sql = "SELECT *
                FROM m_jabatan_dokter 
                WHERE id_jabatan_dokter = ?";
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
       return $this->db->update('m_jabatan_dokter', $params, $where);
    }

    // delete
    public function get_delete($where){
        return $this->db->delete('m_jabatan_dokter', $where);
    }


}

?>