<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kewarganegaraan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->model('M_kewarganegaraan');
    }

    function index()
    {
        $data['title_page']='Data Kewarganegaraan';
        // $data['data_dokter'] = $this->DataDokter_model->tampil_data()->result();

		$this->load->view('master/kewarganegaraan/index', $data);

	}

    public function load_json(){
        // parameter search 
        $nama_kewarganegaraan = $this->input->post('nama_kewarganegaraan');
        $filter['nama_kewarganegaraan'] = empty($nama_kewarganegaraan) ? '%' :  $nama_kewarganegaraan;
        $params = $filter['nama_kewarganegaraan'];
        // get data dari model dengan param
        $res = $this->M_kewarganegaraan->get_all($params);
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
            $row[]=$data['nama_kewarganegaraan'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_kewarganegaraan"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_kewarganegaraan"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_kewarganegaraan"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_kewarganegaraan"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    function add_process(){
        $data = array(
            'nama_kewarganegaraan' => $this->input->post('nama_kewarganegaraan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
         if($this->M_kewarganegaraan->get_add($data)){ //jika update berhasil
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
        $data = $this->M_kewarganegaraan->get_detail_data($data_id);
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
        $data['id_kewarganegaraan'] = $this->input->post('id_kewarganegaraan');
        // validate
        if (empty($data['id_kewarganegaraan'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_kewarganegaraan' => $this->input->post('nama_kewarganegaraan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_kewarganegaraan' => $this->input->post('id_kewarganegaraan'),
        );
        if ($this->M_kewarganegaraan->get_edit($params, $where)) {
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
            'id_kewarganegaraan' => $this->input->post('id_hapus')
        );
        if ($this->M_kewarganegaraan->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }
}