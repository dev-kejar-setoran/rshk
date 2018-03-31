<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_data_dokter extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    private $_table1 = "m_data_dokter"; //nama table 

    public function tampil_data(){
		return $this->db->get($this->_table1);

   	}

   	function add($data){
		$this->db->insert($this->_table1, $data);
      	return $this->db->insert_id();
	}


}