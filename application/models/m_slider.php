<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_slider extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "t_website_slider"; //nama table

    public function get_all($params1, $params2){
    $this->db->select('*');
    $this->db->like('judul', $params1);
    $this->db->or_like('status', $params2);

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
        return $this->db->insert($this->_table1, $params);
    }

    // detail data
    public function get_detail_data($params) {
    $this->db->select('*');
    $this->db->where('id_slider', $params);

    $query = $this->db->get($this->_table1);
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
        return $this->db->update($this->_table1, $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete($this->_table1, $where);
    }

}