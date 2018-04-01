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
            'nama_rumah_sakit' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'no_telp' => $_POST['no_telp'],
            'created_by' => "Azhar"
        );
        $this->m_rumah_sakit->input_data($data);
    }
    function edit_data($id){
        $result = json_encode($this->db->get_where('m_rumah_sakit',array("id_dokumen"=>$id))->row());
		$this->output
			->set_content_type('application/json')
			->set_output($result);
    }

    function delete_RS(){
        $id = $_POST['id'];
        //print_r($id);
        $this->db->where('id_rumah_sakit', $id);
		$this->db->delete('m_rumah_sakit');
    }

}