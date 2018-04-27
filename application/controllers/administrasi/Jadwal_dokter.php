<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_dokter extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('M_jadwal_dokter');
    }

    function index()
    {
        $data['title_page']='Jadwal Dokter';
        $data['dokter'] = $this->M_jadwal_dokter->getDokter();
		$this->load->view('administrasi/jadwal_dokter/index', $data);
	}

    public function load_json(){
        $nama_dokter = $this->input->post('nama_dokter');
        $nama_dokter = $this->input->post('hari_praktek');
        $filter['nama_dokter'] = empty($nama_dokter) ? '' : $nama_dokter;
        $filter['hari_praktek'] = empty($hari_praktek) ? '' : $hari_praktek;
        $param1 = $filter['nama_dokter'];
        $param2 = $filter['hari_praktek'];
        // get data dari model dengan param

        $res = $this->M_jadwal_dokter->get_all($param1,$param2);
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
            $row[]=$data['nama_dokter'];
            $row[]=$data['hari_praktek'];
            $row[]= substr($data['jam_mulai'], 0, 5) .' - '. substr($data['jam_akhir'], 0, 5);
            $row[]=$data['max_kuota'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_jadwal_dokter"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_jadwal_dokter"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_jadwal_dokter"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_jadwal_dokter"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

     public function add_process() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_dokter','Nama Dokter', 'required');
        $this->form_validation->set_rules('hari_praktek','Hari Praktek', 'required');
        $this->form_validation->set_rules('kuota','Maksimal Kuota', 'required');
        $this->form_validation->set_rules('jam_mulai','Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_akhir','Jam Akhir', 'required');
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
            'id_dokter' => $this->input->post('nama_dokter'),
            'hari_praktek' => $this->input->post('hari_praktek'),
            'max_kuota' => $this->input->post('kuota'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );

         // run fungsi update
        if($this->M_jadwal_dokter->get_add($data)){ //jika update berhasil
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

    public function get_detail_data() {
        $data_id = $this->input->post('data_id');
        // parameter
        //$params = array($noagenda, $noba, $no_tiket);
        $data = $this->M_jadwal_dokter->get_detail_data($data_id);
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

     public function edit_process() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_jadwal_dokter','ID Jadwal Dokter', 'required');
        $this->form_validation->set_rules('nama_dokter','ID Dokter', 'required');
        $this->form_validation->set_rules('hari_praktek','Hari Praktek', 'required');
        $this->form_validation->set_rules('kuota','Maksimal Kuota', 'required');
        $this->form_validation->set_rules('jam_mulai','Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_akhir','Jam Akhir', 'required');
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
        // insert db
        $params = array(
            'id_dokter' => $this->input->post('nama_dokter'),
            'hari_praktek' => $this->input->post('hari_praktek'),
            'max_kuota' => $this->input->post('kuota'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_jadwal_dokter' => $this->input->post('id_jadwal_dokter'),
        );
        if ($this->M_jadwal_dokter->get_edit($params, $where)) {
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
            'id_jadwal_dokter' => $this->input->post('id_hapus')
        );
        if ($this->M_jadwal_dokter->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}