<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tautan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tautan');
    }

    function index()
    {
        $data['title_page']='Tautan';
		$this->load->view('master/tautan/index', $data);
	}

    // proses tambah
    public function add_process() {
        $data = array(
                'nama_tautan' => $this->input->post('nama_tautan'),
                'tautan' => $this->input->post('tautan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'created_by' => $this->session->userdata('username'),
                'created_at' => date('Y-m-d H:i:s')
            );
        // run fungsi update
        if($this->m_tautan->get_add($data)){ //jika update berhasil
            $this->session->set_flashdata('sukses', 'Data gagal diubah.');
        }else{ //jika update gagal
            $this->session->set_flashdata('gagal', 'Data gagal diubah.');
        }

        $this->index();
    }

}