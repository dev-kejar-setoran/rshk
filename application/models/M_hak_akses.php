<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_hak_akses extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    // variabel untuk nama tabel
    // public $db_tabel = 'guru';

    // fungsi tampil semua
    public function get_all_role() {
        $sql = "SELECT id_role, role, deskripsi, (SELECT COUNT(*) FROM m_role_user b  WHERE b.role = a.role) 'jumlah_menu'
                FROM m_role_master a
                ORDER BY a.role";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    // fungsi tampil semua
    public function get_list_menu($params) {
        $sql = "SELECT a.id_role_menu, id_parent , urutan, nama_role_menu, LEVEL, role,
                    CASE LEVEL
                        WHEN 1 THEN CONCAT('--- ', nama_role_menu) 
                        WHEN 2 THEN CONCAT('--- --- ', nama_role_menu) 
                    END AS nama_menu
                FROM m_role_menu a
                LEFT JOIN (SELECT id_role_menu, role FROM m_role_user WHERE role=?) b ON a.id_role_menu = b.id_role_menu 
                ORDER BY  SUBSTR(a.id_role_menu,1,3) ASC, id_parent ASC, urutan ASC
            ";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    // tambah 
    public function get_add_role($params) {
        return $this->db->insert('m_role_master', $params);
    }
    //  insert_role_user
    public function insert_role_user($params) {
        return $this->db->insert('m_role_user', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_role_master 
                WHERE id_role = ?";
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
    public function get_edit_role($params, $where) {
        return $this->db->update('m_role_master', $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_role_master', $where);
    }

    // delete
    public function get_delete_role_user($where){
        return $this->db->delete('m_role_user', $where);
    }


}

?>