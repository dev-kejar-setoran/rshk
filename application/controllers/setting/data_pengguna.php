<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pengguna extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('m_data_pengguna');
    }

    // default
    public function index()
    {
        $data['title_page']='Data Pengguna';
        $data['rs_data'] = $this->m_data_pengguna->get_role_master();
        $this->load->view('setting/data-pengguna/index', $data);
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_pengguna = $this->input->post('nama_pengguna');
        $filter['nama_pengguna'] = empty($nama_pengguna) ? '' :   $nama_pengguna;
        // get data dari model dengan param
        $res = $this->m_data_pengguna->get_all($filter['nama_pengguna']);
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
            $row[]=$data['nama_lengkap'];
            $row[]=$data['email'];
            $row[]=$data['tlp'];
            $row[]=$data['role'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_user"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_user"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_user"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_user"].'\')" ><i class="trash icon"></i></button>';
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
        $this->form_validation->set_rules('nama_pengguna','Nama Lengkap', 'required'); 
        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('tlp','Telepon','required');
        $this->form_validation->set_rules('role','Hak Akses','required');
        $this->form_validation->set_rules('status','Status','required');
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
            'nama_lengkap' => $this->input->post('nama_pengguna'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
            'password' => md5($this->input->post('email')),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_data_pengguna->get_add($data)){ //jika update berhasil
            $response['type']="success";
            $response['title']="Tersimpan!";
            $response['pesan']="Data berhasil disimpan. Password saat ini  Password = Email (".$this->input->post('email').").";
        }else{ //jika  gagal
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        $id_user = $this->input->post('id_user');

        $data = $this->m_data_pengguna->get_detail_data($id_user);
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
        $this->form_validation->set_rules('nama_pengguna','Nama Lengkap', 'required'); 
        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('tlp','Telepon','required');
        $this->form_validation->set_rules('role','Hak Akses','required');
        $this->form_validation->set_rules('status','Status','required');
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
        $data['id_user'] = $this->input->post('id_user');
        // validate
        if (empty($data['id_user'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_lengkap' => $this->input->post('nama_pengguna'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
            'updated_by' => $this->session->userdata('nama_lengkap'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_user' => $this->input->post('id_user'),
        );
        if ($this->m_data_pengguna->get_edit($params, $where)) {
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
            'id_user' => $this->input->post('id_user')
        );
        if ($this->m_data_pengguna->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }


}