<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipe_media extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('m_tipe_media');
    }

    function index()
    {
        $data['title_page']='Tipe Media';
        $data['tipe_media'] = $this->m_tipe_media->get_all();
        
		$this->load->view('master/tipe_media/index', $data);
	}

    // untuk load data table
    public function load_json(){
        $res = $this->m_tipe_media->get_all();
        foreach ($res as $data) {
            $row=array();
            $row[]=$data['id_tipe_media'];
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
        $data = array(
            'nama_tipe_media' => $this->input->post('nama_tipe_media'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('username'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_tipe_media->get_add($data)){ //jika update berhasil
            $response['status']="sukses";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        $data_id = $this->input->post('data_id');
        // parameter
        //$params = array($noagenda, $noba, $no_tiket);
        $data = $this->m_tipe_media->get_detail_data($data_id);
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
        $data['id_tipe_media'] = $this->input->post('id_tipe_media');
        // validate
        if (empty($data['id_tipe_media'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
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
        if ($this->m_tipe_media->get_edit($params, $where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    public function delete_process() {
        $where = array(
            'id_tipe_media' => $this->input->post('id_hapus')
        );
        if ($this->m_tipe_media->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}