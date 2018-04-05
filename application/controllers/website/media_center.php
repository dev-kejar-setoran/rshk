<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class media_center extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('m_media_center');
    }

    function index()
    {
        $data['title_page']='Media Center';
		$this->load->view('website/media-center/index', $data);
	}

   // untuk load data table
    public function load_json(){
        $nama_media_center = $this->input->post('nama_media_center');
        $deskripsi = $this->input->post('deskripsi');
        $id_tipe_media = $this->input->post('id_tipe_media');
        $params1 = empty($nama_media_center) ? '' : $nama_media_center;
        $params2 = empty($deskripsi) == 0 ? '' : $deskripsi;
        // $params3 = $id_tipe_media == 0 ? '' : $id_tipe_media;
        $params3 = $id_tipe_media;
        // get data dari model dengan param
        $res = $this->m_media_center->get_all($params1, $params2, $params3);
        // periksa jika data kosong
        if (empty($res)) {
            echo json_encode(""); 
            return;
        }
        // 
        $no = 1;
        foreach ($res as $data) {
            $row=array();
            $row[]=$no++;
            $row[]=$data['nama_media_center'];
            $row[]=$data['deskripsi'];
            $row[]=$data['gambar'];
            $row[]='<span class="ui fluid label">'.$data['nama_tipe_media'].'<span>';
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_media_center"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_media_center"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_media_center"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_media_center"].'\')" ><i class="trash icon"></i></button>';
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
            'nama_media_center' => $this->input->post('nama_media_center'),
            'deskripsi' => $this->input->post('deskripsi'),
            // 'gambar' => $this->input->post('gambars'),
            'id_tipe_media' => $this->input->post('id_tipe_media'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_media_center->get_add($data)){ //jika update berhasil
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
        $data = $this->m_media_center->get_detail_data($data_id);
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
        $data['id_media_center'] = $this->input->post('id_media_center');
        // validate
        if (empty($data['id_media_center'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_media_center' => $this->input->post('nama_media_center'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_media_center' => $this->input->post('id_media_center'),
        );
        if ($this->m_media_center->get_edit($params, $where)) {
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
            'id_media_center' => $this->input->post('id_hapus')
        );
        if ($this->m_media_center->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }
}