<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_dokter extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('M_data_dokter');
    }

    function index()
    {
        $data['title_page']='Data Dokter';
        $data['combo_spesialisasi'] = $this->M_data_dokter->getSpesialisasi(); 
        $data['combo_jabatan'] = $this->M_data_dokter->getJabatan(); 

		$this->load->view('master/data_dokter/index', $data);
	}

   // untuk load data table
    public function load_json(){
        $nama_dokter = $this->input->post('nama_dokter');
        $id_spesialisasi = $this->input->post('id_spesialisasi');
        $id_jabatan = $this->input->post('id_jabatan');
        $params1 = empty($nama_dokter) ? '' : $nama_dokter;
        $params2 = empty($id_spesialisasi) ? '' : $id_spesialisasi;
        $params3 = empty($id_jabatan) ? '' : $id_jabatan;
        // get data dari model dengan param
        $res = $this->M_data_dokter->get_all($params1, $params2, $params3);
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
            $row[]=$data['nama_spesialisasi'];
            $row[]=$data['nama_jabatan_dokter'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_dokter"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_dokter"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_dokter"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_dokter"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

 // proses tambah data
    public function add_process() {
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_dokter','Nama Dokter', 'required');
        $this->form_validation->set_rules('id_spesialisasi','Spesialisasi', 'required');
        $this->form_validation->set_rules('id_jabatan','Jabatan','required');

        // run validation
         if (!empty($_FILES['input_gambar']['name'])){
                $name_image = str_replace(" ","",$_FILES['input_gambar']['name']);
                $new_name = $this->input->post('nama_dokter').'_'.$name_image;
                $config['file_name'] = $new_name;
                $config['upload_path'] = 'assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024 * 10;

                $target='assets/img/upload/'.$new_name;

                if(file_exists($target)){
                    unlink($target);
                }


                $this->load->library('upload', $config);
            } else{
                $this->form_validation->set_rules('input_gambar', 'Upload Foto', 'required');
            }
             
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
                'nama_dokter' => $this->input->post('nama_dokter'),
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),
                'id_jabatan_dokter' => $this->input->post('id_jabatan'),
                'created_by' => $this->session->userdata('nama_lengkap'),
                'created_at' => date('Y-m-d H:i:s'),
                'foto' => $new_name
            );

            if ($this->upload->do_upload('input_gambar')) {
                $this->M_data_dokter->get_add($data);
                $response['type']="success";
                $response['title']="Tersimpan!";
                $response['pesan']="Data berhasil disimpan";
            }else{ //jika  gagal
                $response['type']="warning";
                $response['title']="Gagal Tersimpan!";
                $response['pesan']="Data gagal disimpan";
                // $res = $this->upload->data();
            }
        // $response['ini gambar']=$_FILES['input_gambar'];
        echo json_encode($response);
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        $data_id = $this->input->post('data_id');
        // parameter
        //$params = array($noagenda, $noba, $no_tiket);
        $data = $this->M_data_dokter->get_detail_data($data_id);
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
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_dokter','Nama Dokter', 'required');
        $this->form_validation->set_rules('id_spesialisasi','Spesialisasi', 'required');
        $this->form_validation->set_rules('id_jabatan','Jabatan','required');
        // run validation
         if (!empty($_FILES['input_gambar']['name'])){
                $name_image = str_replace(" ","",$_FILES['input_gambar']['name']);
                $new_name = $this->input->post('nama_dokter').'_'.$name_image;
                $config['file_name'] = $new_name;
                $config['upload_path'] = 'assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024 * 10;

                $gambar_edit = $this->input->post('gambar_edit');

                $target='assets/img/upload/'.$gambar_edit;

                if(file_exists($target)){
                    unlink($target);
                }

                $this->load->library('upload', $config);
                $this->upload->do_upload('input_gambar');
                $params = array(
                    'nama_dokter' => $this->input->post('nama_dokter'),
                    'id_spesialisasi' => $this->input->post('id_spesialisasi'),
                    'id_jabatan_dokter' => $this->input->post('id_jabatan'),
                    'updated_by' => $this->session->userdata('nama_lengkap'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'foto' => $new_name
                );
                
            } else {
                $params = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),
                'id_jabatan_dokter' => $this->input->post('id_jabatan'),
                'updated_by' => $this->session->userdata('nama_lengkap'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            }

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
       
        $where = array(
            'id_dokter' => $this->input->post('id_dokter'),
        );

        // insert db
            if ($this->M_data_dokter->get_edit($params, $where)) {
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
        $data_id = $this->input->post('id_hapus');
        // parameter
        $data = $this->M_data_dokter->get_detail_data($data_id);
        $target='assets/img/upload/'.$data['foto'];
        
            if(file_exists($target)){
                unlink($target);
            }

        $where = array(
            'id_dokter' => $this->input->post('id_hapus')
        );
        if ($this->M_data_dokter->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }
}