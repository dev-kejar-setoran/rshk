<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah_Sakit extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_rumah_sakit');
        //$this->auth->validation();
    }
    
    function index()
    {
        $data['title_page']='Data Pasien';
        $this->load->view('master/rumah_sakit/index',$data);
   
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_rumah_sakit = $this->input->post('nama_rumah_sakit');
        $filter['nama_rumah_sakit'] = empty($nama_rumah_sakit) ? '%' :  $nama_rumah_sakit;
        $params = $filter['nama_rumah_sakit'];
        // get data dari model dengan param
        $res = $this->M_rumah_sakit->get_all($params);
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
            $row[]=$data['nama_rumah_sakit'];
            $row[]=$data['alamat'];
            $row[]=$data['no_telp'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_rumah_sakit"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_rumah_sakit"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_rumah_sakit"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_rumah_sakit"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    function add_process(){
        $data = array(
            'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
         if($this->M_rumah_sakit->get_add($data)){ //jika update berhasil
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
        $data = $this->M_rumah_sakit->get_detail_data($data_id);
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
        $data['id_rumah_sakit'] = $this->input->post('id_rumah_sakit');
        // validate
        if (empty($data['id_rumah_sakit'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_rumah_sakit' => $this->input->post('id_rumah_sakit'),
        );
        if ($this->M_rumah_sakit->get_edit($params, $where)) {
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
            'id_rumah_sakit' => $this->input->post('id_hapus')
        );
        if ($this->M_rumah_sakit->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}