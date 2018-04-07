<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tautan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        //$this->load->library('form_validation');
        $this->load->model('m_tautan');
    }

    // default
    public function index()
    {
        $data['title_page']='Tautan';
        $this->load->view('master/tautan/index', $data);
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_tautan = $this->input->post('nama_tautan');
        $tautan = $this->input->post('tautan');
        $filter['nama_tautan'] = empty($nama_tautan) ? '%' : '%' . $nama_tautan . '%';
        $filter['tautan'] = empty($tautan) ? '%' :  $tautan;
        $params = array($filter['nama_tautan']);
        // get data dari model dengan param
        $res = $this->m_tautan->get_all($params);
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
            $row[]=$data['nama_tautan'];
            $row[]=$data['tautan'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_by'];
            $row[]=$data['created_at'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_tautan"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_tautan"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_tautan"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_tautan"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    function add_process() {
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_tautan','Nama Pasien', 'required');
        $this->form_validation->set_rules('tautan','Nomor Kartu', 'required');
        $this->form_validation->set_rules('deskripsi','Tempat Lahir','required');
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
        // parameter input
        $params = array(
            'nama_tautan' => $this->input->post('nama_tautan'),
            'tautan' => $this->input->post('tautan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_tautan->get_add($params)){ //jika update berhasil
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
        $data = $this->m_tautan->get_detail_data($data_id);
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
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_tautan','ID Pasien', 'required');
        $this->form_validation->set_rules('nama_tautan','Nama Pasien', 'required');
        $this->form_validation->set_rules('tautan','Nomor Kartu', 'required');
        $this->form_validation->set_rules('deskripsi','Tempat Lahir','required');
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
        // iparameter input
        $params = array(
            'nama_tautan' => $this->input->post('nama_tautan'),
            'tautan' => $this->input->post('tautan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('nama_lengkap'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_tautan' => $this->input->post('id_tautan'),
        );
        if ($this->m_tautan->get_edit($params, $where)) {
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
            'id_tautan' => $this->input->post('id_hapus')
        );
        if ($this->m_tautan->get_delete($where)) {
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