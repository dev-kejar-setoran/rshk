<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipe_media extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('M_tipe_media');
    }

    function index()
    {
        $data['title_page']='Tipe Media';
		$this->load->view('master/tipe_media/index', $data);
	}

    // untuk load data table
    public function load_json(){

        $nama_tipe_media = $this->input->post('nama_tipe');
        $filter['nama_tipe_media'] = empty($nama_tipe_media) ? '' : $nama_tipe_media;
        $params = $filter['nama_tipe_media'];

        $res = $this->M_tipe_media->get_all($params);

        if (empty($res)) {
            echo json_encode(""); 
            return;
        }
        // 
        $no = 1;
        foreach ($res as $data) {
            $row=array();
            $row[]=$no++;
            $row[]=$data['nama_tipe_media'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_tipe_media"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_tipe_media"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_tipe_media"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_tipe_media"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    // proses tambah data
    public function add_process() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_tipe_media','Nama Tipe Media', 'required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
        // run validation
        if ($this->form_validation->run() == FALSE) {
            //$err_msg = validation_errors();
            $err_msg = $this->form_validation->error_array();
            $response['type']="invalid";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
            $response['data'] = $err_msg;
            echo json_encode($response); 
            return;
        }

        $data = array(
            'nama_tipe_media' => $this->input->post('nama_tipe_media'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->M_tipe_media->get_add($data)){ //jika update berhasil
            $response['type']="success";
            $response['title']="Tersimpan!";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        $data_id = $this->input->post('data_id');
        // parameter
        //$params = array($noagenda, $noba, $no_tiket);
        $data = $this->M_tipe_media->get_detail_data($data_id);
        // get data
        if (empty($data)) {
            $output = array(
                "data" => '',
            );
            echo json_encode($output);
        } else {

            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }
    }

    // proses edit setelah di entry
    public function edit_process() {
         $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_tipe_media','ID Tipe Media', 'required');
        $this->form_validation->set_rules('nama_tipe_media','Nama Tipe Media', 'required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
        // run validation
        if ($this->form_validation->run() == FALSE) {
            //$err_msg = validation_errors();
            $err_msg = $this->form_validation->error_array();
            $response['type']="invalid";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
            $response['data'] = $err_msg;
            echo json_encode($response); 
            return;
        }
        // insert db
        $params = array(
            'nama_tipe_media' => $this->input->post('nama_tipe_media'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        $where = array(
            'id_tipe_media' => $this->input->post('id_tipe_media'),
        );
        if ($this->M_tipe_media->get_edit($params, $where)) {
            $response['type']="success";
            $response['title']="Tersimpan!";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    public function delete_process() {
        $where = array(
            'id_tipe_media' => $this->input->post('id_hapus')
        );
        if ($this->M_tipe_media->get_delete($where)) {
            $response['status']="sukses";
             $response['type']="success";
            $response['title']="Tersimpan!";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

}