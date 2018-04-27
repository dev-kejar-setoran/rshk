<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_jadwal_dokter extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "t_jadwal_dokter"; //nama table 
    private $_table2 = "m_data_dokter"; //nama table 

    public function get_all($param1, $param2){
        $this->db->select('a.*, b.nama_dokter');
        $this->db->join($this->_table2 . ' b', 'b.id_dokter = a.id_dokter', 'left');    
        $this->db->like('b.nama_dokter',$param1);
        $this->db->or_where('a.hari_praktek',$param2);
        $this->db->order_by('jam_mulai', 'ASC');

    
        $query = $this->db->get($this->_table1 . ' a');

        if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $query->free_result();
            } else {
                $result = array();
            }
            return $result;

    }

    // combo nama Dokter
    function getDokter() {
        $this->db->select('id_dokter, nama_dokter, foto');
        $q = $this->db->get($this->_table2);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row){
                    $data[] = $row;
                }
        }
        return $data;
    }

    public function get_add($params) {
        return $this->db->insert($this->_table1, $params);
    }

     public function get_detail_data($params) {
        $this->db->select('*');
        $this->db->where('id_jadwal_dokter', $params);

        $query = $this->db->get($this->_table1);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function get_edit($params, $where) {
        return $this->db->update($this->_table1, $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete($this->_table1, $where);
    }

}