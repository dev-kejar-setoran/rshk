<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_dokter extends CI_Controller {

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
         if (!empty($_FILES['input_gambar']['name'])){
                // $new_name = str_replace(".","",$data['KD_KONTRAK_TRANS']).'_'.date("YmdHis");
                $new_name = $_FILES['input_gambar']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = 'assets/img/data_dokter/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 1024 * 10;

                $this->load->library('upload', $config);
                // $this->form_validation->set_rules('FILE_UPLOAD', 'Upload Dokumen', 'required');
            } 
            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'created_by' => $this->session->userdata('nama_lengkap'),
                'created_at' => date('Y-m-d H:i:s'),
                'foto' => $_FILES['input_gambar']['name']
            );
            if ($this->upload->do_upload('input_gambar')) {
                $this->M_data_dokter->get_add($data);
                $response['status']="sukses";
                $response['pesan']="Data berhasil disimpan";
            //     // $err = $this->upload->display_errors('', '');
            } else {
                $response['status']="gagal";
                $response['pesan']="Data gagal disimpan";
                // $res = $this->upload->data();
            }
        
        //  // run fungsi update
        // if($this->M_data_dokter->get_add($data)){ //jika update berhasil
        //     $response['status']="sukses";
        //     $response['pesan']="Data berhasil disimpan";
        // }else{ //jika  gagal
        //     $response['status']="gagal";
        //     $response['pesan']="Data gagal disimpan";
        // }
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
        $data['id_dokter'] = $this->input->post('id_dokter');
        // validate
        if (empty($data['id_dokter'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'id_spesialisasi' => $this->input->post('id_spesialisasi'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_dokter' => $this->input->post('id_dokter'),
        );
        if ($this->M_data_dokter->get_edit($params, $where)) {
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