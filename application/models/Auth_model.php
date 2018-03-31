<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    // function get_validation($username=null,$password=null)
    // {
        
    //     $sql = "SELECT id_user, username, nama_lengkap, role, status FROM m_user WHERE email='$username' AND password='$password' ";
    //     $query = $this->db->query($sql);
    //     return $query->result();

    // }

    function get_validation($params) {
        $sql = "SELECT id_user, username, nama_lengkap, status FROM m_user 
                WHERE email= ? AND password = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function set_pass($pass)
    {
       //return $this->db->call_function('BBOPROD28.F$MD5', $pass);
       return $pass;
    }
    function role($ID_USER=null){
        $osql ="ACAN EY";
        $result = $this->db->query($osql)->result();

        return $result;
    }

    function set_session()
    {

    }


}