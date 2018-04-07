<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_kategori extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('M_artikel_kategori');
    }

    // default
    public function index()
    {
        $data['title_page']='Artikel Kategori';
        $this->load->view('artikel/kategori/index', $data);   
    }

    // untuk load data table
    public function load_json(){
       // parameter search 
        $nama_kategori = $this->input->post('nama_kategori');
        $filter['nama_kategori'] = empty($nama_kategori) ? '%' : '%' . $nama_kategori . '%';
        $params = array($filter['nama_kategori']);
        // get data dari model dengan param
        $res = $this->M_artikel_kategori->get_all($params);
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
            $row[]=$data['nama_kategori'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_artikel_kategori"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_artikel_kategori"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_artikel_kategori"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_artikel_kategori"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    // proses tambah data
    public function add_process() {
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_kategori','Nama Kategori', 'required');
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
        if (!empty($_FILES['input_gambar']['name'])){
                // $new_name = str_replace(".","",$data['KD_KONTRAK_TRANS']).'_'.date("YmdHis");
                $new_name = $_FILES['input_gambar']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = 'assets/img/upload/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 1024 * 10;

                $this->load->library('upload', $config);
                // $this->form_validation->set_rules('FILE_UPLOAD', 'Upload Dokumen', 'required');
            } else{
                $response['type']="warning";
                $response['title']="Cover Tidak Boleh Kosong!";
                $response['pesan']="Data gagal disimpan";
                echo json_encode($response); 
                return;
            }
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
            'cover' => $_FILES['input_gambar']['name']
        );

         // run fungsi update
        if($this->M_artikel_kategori->get_add($data)){ //jika update berhasil
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
        $data = $this->M_artikel_kategori->get_detail_data($data_id);
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
        $this->form_validation->set_rules('nama_kategori','Nama Kategori', 'required');
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
        $data['id_artikel_kategori'] = $this->input->post('id_artikel_kategori');
        // validate
        if (empty($data['id_artikel_kategori'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }else {
                // insert db
            $params = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'updated_by' => $this->session->userdata('nama_lengkap'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $where = array(
                'id_artikel_kategori' => $this->input->post('id_artikel_kategori'),
            );
            if ($this->M_artikel_kategori->get_edit($params, $where)) {
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

    public function delete_process() {
        $where = array(
            'id_artikel_kategori' => $this->input->post('id_artikel_kategori')
        );
        if ($this->M_artikel_kategori->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }


}