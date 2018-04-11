<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjanjian_online extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        //$this->load->model('m_data_pasien');
    }

    // default
    public function index()
    {
        $data['title_page']='Perjanjian Online Admin';
        $this->load->view('administrasi/perjanjian_online/index', $data);
    }

    // untuk load data table
    public function load_json(){
       
    }

    // untuk load data riwayat
    public function load_json_riwayat(){
        $data_id = $this->input->post('data_id');

        $res = $this->m_data_pasien->get_all($data_id);
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
            $row[]=$data['nama_pasien'];
            $row[]=$data['nomor_kartu'];
            $row[]=$data['tempat_lahir'];
            $row[]=$data['tgl_lahir'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_pasien"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_pasien"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_pasien"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_pasien"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    // proses tambah data
    public function add_process() {
        
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        
    }

    // proses edit setelah di entry
    public function edit_process() {
        
    }

    public function delete_process() {
        
    }


}