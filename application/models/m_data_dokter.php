<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_data_dokter extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "m_data_dokter"; //nama table 
    private $_table2 = "m_spesialisasi"; //nama table 
    private $_table3 = "m_jabatan_dokter"; //nama table 

    public function get_all($params1, $params2, $params3){

        // print_r($params[0]); die();
    $this->db->select('a.*, b.nama_spesialisasi, c.nama_jabatan_dokter');
    $this->db->join($this->_table2 . ' b', 'b.id_spesialisasi = a.id_spesialisasi', 'left');    
    $this->db->join($this->_table3 . ' c', 'c.id_jabatan_dokter = a.id_jabatan_dokter', 'left');  
    $this->db->like('a.nama_dokter',$params1);
    $this->db->or_where('a.id_spesialisasi',$params2);
    $this->db->or_where('a.id_jabatan_dokter',$params3);
    
    $query = $this->db->get($this->_table1 . ' a');

    if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;

   	}

    // combo spesialisasi
    function getSpesialisasi() {
        $query = "SELECT id_spesialisasi, nama_spesialisasi FROM m_spesialisasi";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row){
                    $data[] = $row;
                }
        }
        return $data;
    }

    // combo Jabatan
    function getJabatan() {
        $query = "SELECT id_jabatan_dokter, nama_jabatan_dokter FROM m_jabatan_dokter";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row){
                    $data[] = $row;
                }
        }
        return $data;
    }

   	
    // tambah
    public function get_add($params) {
        return $this->db->insert('m_data_dokter', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_data_dokter 
                WHERE id_dokter = ?";
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
        return $this->db->update('m_data_dokter', $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_data_dokter', $where);
    }

}