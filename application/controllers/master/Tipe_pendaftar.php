<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipe_pendaftar extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_tipe_pendaftar');
        //$this->auth->validation();
    }
    
    function index()
    {
        $data['title_page']='Data Pasien';
        $this->load->view('master/tipe_pendaftar/index',$data);
   
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_tipe_pendaftar = $this->input->post('nama_tipe_pendaftar');
        $filter['nama_tipe_pendaftar'] = empty($nama_tipe_pendaftar) ? '%' :  $nama_tipe_pendaftar;
        $params = $filter['nama_tipe_pendaftar'];
        // get data dari model dengan param
        
        $res = $this->M_tipe_pendaftar->get_all($params);
        // periksa jika data kosong
        //print_r($res);
        if (empty($res)) {
            echo json_encode(""); 
            return;
        }
        // 
        $no = 1;
        foreach ($res as $data) {
            $row=array();
            $row[]=$no++;
            $row[]=$data['nama_tipe_pendaftar'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_tipe_pendaftar"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_tipe_pendaftar"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_tipe_pendaftar"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_tipe_pendaftar"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    function add_process(){
        $data = array(
            'nama_tipe_pendaftar' => $this->input->post('nama_tipe_pendaftar'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
         if($this->M_tipe_pendaftar->get_add($data)){ //jika update berhasil
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
        $data = $this->M_tipe_pendaftar->get_detail_data($data_id);
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
        $data['id_tipe_pendaftar'] = $this->input->post('id_tipe_pendaftar');
        // validate
        if (empty($data['id_tipe_pendaftar'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_tipe_pendaftar' => $this->input->post('nama_tipe_pendaftar'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_tipe_pendaftar' => $this->input->post('id_tipe_pendaftar'),
        );
        if ($this->M_tipe_pendaftar->get_edit($params, $where)) {
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
            'id_tipe_pendaftar' => $this->input->post('id_hapus')
        );
        if ($this->M_tipe_pendaftar->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}