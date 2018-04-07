<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_media_center extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "t_website_media_center"; //nama table 
    private $_table2 = "m_tipe_media"; //nama table 

     public function get_all($params1, $params2, $params3){

        // print_r($params[0]); die();
    $this->db->select('a.*, b.nama_tipe_media');
    $this->db->join($this->_table2 . ' b', 'b.id_tipe_media = a.id_tipe_media', 'left');    
    $this->db->like('a.nama_media_center',$params1);
    $this->db->or_where('a.deskripsi',$params2);
    $this->db->or_where('a.id_tipe_media',$params3);
    
    $query = $this->db->get($this->_table1 . ' a');

    if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;

    }

    function getTipe() {
        $query = "SELECT id_tipe_media, nama_tipe_media FROM m_tipe_media";
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
        return $this->db->insert($this->_table1, $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM t_website_media_center 
                WHERE id_media_center = ?";
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
        return $this->db->update($this->_table1, $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete($this->_table1, $where);
    }
}