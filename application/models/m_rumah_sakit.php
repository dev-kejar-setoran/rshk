<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_rumah_sakit extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    // private $_table1 = "m_data_dokter"; //nama table 

    public function tampil_data(){
        $queryGet= $this->db->get('m_rumah_sakit');
        return $queryGet;

   	}

   	function input_data($data){
		
		$this->db->insert('m_rumah_sakit', $data);
        return true;
	}

	// function edit_data($where,$table){		
	// 	return $this->db->get_where($table,$where);
	// }

}