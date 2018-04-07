<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan_dokter extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('m_jabatan_dokter');
        $this->load->model('m_data_pasien');
    }

    // default
    public function index()
    {
        $data['spesialisasi'] = $this->m_jabatan_dokter->get_spesialsisasi();
        $data['title_page']='Jabatan Dokter';
        $this->load->view('master/jabatan_dokter/index',$data);
        
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_jabatan = $this->input->post('filter_jabatan');
        $filter['filter_jabatan'] = empty($nama_jabatan) ? '%' : '%' . $nama_jabatan . '%';
        $params = array($filter['filter_jabatan']);
        // get data dari model dengan param
        $res = $this->m_jabatan_dokter->get_all($params);
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
            $row[]=$data['nama_jabatan_dokter'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_jabatan_dokter"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_jabatan_dokter"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_jabatan_dokter"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_jabatan_dokter"].'\')" ><i class="trash icon"></i></button>';
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
        $this->form_validation->set_rules('nm_jabatan','Nama Jabatan', 'required');
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
            'nama_jabatan_dokter' => $this->input->post('nm_jabatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s')
        );
        // run fungsi update
        if($this->m_jabatan_dokter->get_add($data)){ //jika update berhasil
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
        $data = $this->m_jabatan_dokter->get_detail_data($data_id);
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
        $this->form_validation->set_rules('nm_jabatan','Nama Jabatan', 'required');
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
        $data['id_jabatan_dokter'] = $this->input->post('id_jabatan_dokter');
        // validate
        if (empty($data['id_jabatan_dokter'])) {
            $response['status']="gagal";
            $response['pesan']="Data id_jabatan_doktertidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_jabatan_dokter' => $this->input->post('nm_jabatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_jabatan_dokter' => $this->input->post('id_jabatan_dokter'),
        );
        if ($this->m_jabatan_dokter->get_edit($params, $where)) {
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

    // proses delete
    public function delete_process() {
         $where = array(
            'id_jabatan_dokter' => $this->input->post('id_hapus')
        );
        if ($this->m_jabatan_dokter->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}