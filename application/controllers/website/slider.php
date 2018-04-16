<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class slider extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('M_slider');
    }

    function index()
    {
        $data['title_page']='Data Slider';
		$this->load->view('website/slider/index', $data);
	}

   // untuk load data table
    public function load_json(){
        $judul = $this->input->post('judul');
        $status = $this->input->post('status');
        $params1 = empty($judul) ? ' ' : $judul;
        $params2 = empty($status) ? '' : $status;
        // get data dari model dengan param
        $res = $this->M_slider->get_all($params1, $params2);
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
            $row[]=$data['judul'];
            $row[]=$data['gambar'];
            $row[]=$data['posisi'];
            $row[]=($data['status'] == 'Draft' ? '<span class="ui fluid orange label" style="text-align:center">'.$data['status'].'<span>':'<span class="ui fluid green label" style="text-align:center">'.$data['status'].'<span>');
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_slider"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_slider"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_slider"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_slider"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

 // proses tambah data
    public function add_process() {
        $data = array(
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'posisi' => $this->input->post('posisi'),
            'link' => $this->input->post('link'),
            'status' => $this->input->post('status'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->M_slider->get_add($data)){ //jika update berhasil
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
        $data = $this->M_slider->get_detail_data($data_id);
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
        $data['id_slider'] = $this->input->post('id_slider');
        // validate
        if (empty($data['id_slider'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'posisi' => $this->input->post('posisi'),
            'link' => $this->input->post('link'),
            'status' => $this->input->post('status'),
            'updated_by' => $this->session->userdata('nama_lengkap'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_slider' => $this->input->post('id_slider'),
        );
        if ($this->M_slider->get_edit($params, $where)) {
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
            'id_slider' => $this->input->post('id_hapus')
        );
        if ($this->M_slider->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }
}