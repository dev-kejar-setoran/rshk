<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_data_dokter extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "m_data_dokter"; //nama table 

    public function get_all(){
    $query = $this->db->get($this->_table1);

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