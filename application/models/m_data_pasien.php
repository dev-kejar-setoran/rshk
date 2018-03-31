<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_data_pasien extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    // variabel untuk nama tabel
    // public $db_tabel = 'guru';

    // fungsi tampil semua
    public function get_all() {
        $sql = "SELECT * FROM m_data_pasien ";
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
    public function create2($params) {
        return $this->db->insert('m_data_pasien', $params);
    }

}

?>