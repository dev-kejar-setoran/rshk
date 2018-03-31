<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah_Sakit extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_rumah_sakit');
        //$this->auth->validation();
    }
    function index()
    {
        $res = array(
            'data' => $this->m_rumah_sakit->tampil_data()->result_array()
        );
        //var_dump($res, $title);
        $this->load->view('master/rumah_sakit/index',$res);
        // else{
         //      $this->login();
         //     }
   
    }
    function createRS(){
        $data = array(
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'no_telp' => $_POST['no_telp'],
            'created_by' => "Azhar"
        );
        $this->m_rumah_sakit->createRS($data);
    }

}