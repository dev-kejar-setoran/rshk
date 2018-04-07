<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pasien extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        //$this->load->library('form_validation');
        $this->load->model('m_data_pasien');
    }

    // default
    public function index()
    {
        $data['title_page']='Data Pasien';
        //$data['tabel_data'] = $this->m_data_pasien->get_all();
        //echo json_encode($data['tabel_data']);
        //print_r($data); exit();
        $this->load->view('master/data_pasien/index', $data);
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_pasien = $this->input->post('nama_pasien');
        $nomor_kartu = $this->input->post('nomor_kartu');
        $filter['nama_pasien'] = empty($nama_pasien) ? '%' : '%' . $nama_pasien . '%';
        $filter['nomor_kartu'] = empty($nomor_kartu) ? '%' :  $nomor_kartu;
        $params = array($filter['nama_pasien'], $filter['nomor_kartu']);
        // get data dari model dengan param
        $res = $this->m_data_pasien->get_all($params);
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

    function add_process() {

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_pasien','Nama Pasien', 'required');
        $this->form_validation->set_rules('nomor_kartu','Nomor Kartu', 'required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('id_kewarganegaraan','kewarganegaraan','required');
        $this->form_validation->set_rules('asuransi','asuransi','required');
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
            'nama_pasien' => $this->input->post('nama_pasien'),
            'nomor_kartu' => $this->input->post('nomor_kartu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => ($this->input->post('tgl_lahir') == '' ? NULL : $this->input->post('tgl_lahir')),
            'id_kewarganegaraan' => $this->input->post('id_kewarganegaraan'),
            'asuransi' => $this->input->post('asuransi'),
            'created_by' => $this->session->userdata('username'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_data_pasien->get_add($data)){ //jika update berhasil
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


    // proses tambah data
    public function add_process_asli() {
        // validation
        $response['type']="invalid";
        $response['title']="Gagal Tersimpan!";
        $response['pesan']="Data gagal disimpan";
        // validation
        $response['data'][]=empty($this->input->post('nama_pasien')) ? "Silahkan isi Data Pasien" : NULL;
        $response['data'][]=empty($this->input->post('nomor_kartu')) ? "Silahkan isi Nomor Kartu" : NULL;
        $response['data'][]=empty($this->input->post('jenis_kelamin')) ? "Silahkan isi Jenis Kelamin" : NULL;
        $response['data'][]=empty($this->input->post('tempat_lahir')) ? "Silahkan isi Tempat Lahir" : NULL;
        $response['data'][]=empty($this->input->post('tgl_lahir')) ? "Silahkan isi Tanggal Lahir" : NULL;
        $response['data'][]=empty($this->input->post('id_kewarganegaraan')) ? "Silahkan isi kewarganegaraan" : NULL;
        $response['data'][]=empty($this->input->post('asuransi')) ? "Silahkan isi asuransi" : NULL;
        if(count($response['data']) > 0){
            echo json_encode($response); exit();
        }

        $data = array(
            'nama_pasien' => $this->input->post('nama_pasien'),
            'nomor_kartu' => $this->input->post('nomor_kartu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => ($this->input->post('tgl_lahir') == '' ? NULL : $this->input->post('tgl_lahir')),
            'id_kewarganegaraan' => $this->input->post('id_kewarganegaraan'),
            'asuransi' => $this->input->post('asuransi'),
            'created_by' => $this->session->userdata('username'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_data_pasien->get_add($data)){ //jika update berhasil
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
        $data = $this->m_data_pasien->get_detail_data($data_id);
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
        $data['id_pasien'] = $this->input->post('id_pasien');
        // validate
        if (empty($data['id_pasien'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_pasien' => $this->input->post('nama_pasien'),
            'nomor_kartu' => $this->input->post('nomor_kartu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => ($this->input->post('tgl_lahir') == '' ? NULL : $this->input->post('tgl_lahir')),
            'id_kewarganegaraan' => $this->input->post('id_kewarganegaraan'),
            'asuransi' => $this->input->post('asuransi'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_pasien' => $this->input->post('id_pasien'),
        );
        if ($this->m_data_pasien->get_edit($params, $where)) {
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
            'id_pasien' => $this->input->post('id_hapus')
        );
        if ($this->m_data_pasien->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }


}