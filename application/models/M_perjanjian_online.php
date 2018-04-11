<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_perjanjian_onine extends CI_Model {

    function __construct() {
        parent::__construct();
    }
   
    // get list kewarganegaraan 
    public function get_kewarganegaraan() {
       
    }
    // fungsi tampil semua
    public function get_all($data_id) {
        $sql = "SELECT id_pasien, nama_pasien, nomor_kartu, tempat_lahir,tgl_lahir, created_at, created_by 
                FROM m_data_pasien 
                WHERE nama_pasien";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    // fungsi tampil data riwayat
    public function get_all($data_id) {
        
    }

    // tambah
    public function get_add($params) {
        
    }

    // detail data
    public function get_detail_data($params) {
     
    }

    // ubah
    public function get_edit($params, $where) {
       
    }

    

    // delete
    public function get_delete($where){

    }


}

?>