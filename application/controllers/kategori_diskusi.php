<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_diskusi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->model('m_kategori_diskusi');
    }

    function index()
    {
        $data['title_page']='Kategori Diskusi';
        $data['kategori_diskusi'] = $this->m_kategori_diskusi->tampil_data()->result();

		$this->load->view('master/kategori_diskusi/index', $data);

	}

    function add_save() {
       $data= array(
            'nama_kategori_diskusi' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => 'admin',
            'created_at' => '2018-03-30 00:00:00'
        );

        $res= $this->m_kategori_diskusi->add($data);
            if ($res) {
                $msg['hasil'] = $res ;
                echo json_encode ($msg);
            } else {
                $msg['hasil'] = "SUKSES" ;
                echo json_encode ($msg);
            }
    }

     public function ajax_edit($id)
    {
        $data = $this->m_kategori_diskusi->get_by_id($id);
        echo json_encode($data);
    }

}