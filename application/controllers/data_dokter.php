<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->model('m_data_dokter');
    }

    function index()
    {
        $data['title_page']='Data Dokter';
        $data['data_dokter'] = $this->m_data_dokter->tampil_data()->result();

		$this->load->view('master/data_dokter/index', $data);
	}

    function add_save() {
        $data= array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'id_spesialisasi' => $this->input->post('spesialisasi'),
            'id_jabatan' => $this->input->post('jabatan'),
            'created_by' => 'admin',
            'created_at' => '2018-03-30 00:00:00'
        );

       $res= $this->m_data_dokter->add($data);
            if ($res) {
                $msg['hasil'] = $res ;
                echo json_encode ($msg);
            } else {
                $msg['hasil'] = "SUKSES" ;
                echo json_encode ($msg);
            }
    }
}