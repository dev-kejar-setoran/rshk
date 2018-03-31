<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori_diskusi extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "m_kategori_diskusi"; //nama table 

    public function tampil_data(){
		return $this->db->get($this->_table1);
   	}

   	public function add($data) {
   		$this->db->insert($this->_table1, $data);
      return $this->db->insert_id();
   	}

    public function get_by_id($id)
    {
        $this->db->from($this->_table1);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->_table1, $data, $where);
        return $this->db->affected_rows();
    }
}