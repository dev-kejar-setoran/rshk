<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_tautan extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // fungsi tampil semua
    public function get_all() {
        $sql = "SELECT * FROM m_tautan ";
        $query = $this->db->query($sql);
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
        return $this->db->insert('m_tautan', $params);
    }

}

?>