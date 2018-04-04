<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_diskusi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->model('m_kategori_diskusi');
    }

    function index()
    {
        $data['title_page']='Kategori Diskusi';
		$this->load->view('master/kategori_diskusi/index', $data);

	}

    // untuk load data table
    public function load_json(){
        $nama_kategori_diskusi = $this->input->post('nama_kategori_diskusi');
        $filter['nama_kategori_diskusi'] = empty($nama_kategori_diskusi) ? '' : $nama_kategori_diskusi;
        $params = $filter['nama_kategori_diskusi'];
        // get data dari model dengan param

        $res = $this->m_kategori_diskusi->get_all($params);
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
            $row[]=$data['nama_kategori_diskusi'];
            $row[]=$data['deskripsi'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_kategori_diskusi"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_kategori_diskusi"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_kategori_diskusi"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_kategori_diskusi"].'\')" ><i class="trash icon"></i></button>';
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
            'nama_kategori_diskusi' => $this->input->post('nama_kategori_diskusi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_kategori_diskusi->get_add($data)){ //jika update berhasil
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
        $data = $this->m_kategori_diskusi->get_detail_data($data_id);
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
        $data['id_kategori_diskusi'] = $this->input->post('id_kategori_diskusi');
        // validate
        if (empty($data['id_kategori_diskusi'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_kategori_diskusi' => $this->input->post('nama_kategori_diskusi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('username'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        $where = array(
            'id_kategori_diskusi' => $this->input->post('id_kategori_diskusi'),
        );
        if ($this->m_kategori_diskusi->get_edit($params, $where)) {
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
            'id_kategori_diskusi' => $this->input->post('id_hapus')
        );
        if ($this->m_kategori_diskusi->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}