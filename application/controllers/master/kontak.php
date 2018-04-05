<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kontak');
        //$this->auth->validation();
    }
    
    function index()
    {
        $data['title_page']='Kontak';
        $this->load->view('master/kontak/index',$data);
   
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        $nama_kontak = $this->input->post('nama_kontak');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $filter['nama_kontak'] = empty($nama_kontak) ? '%' : '%' . $nama_kontak . '%';
        $filter['alamat'] = empty($alamat) ? '%' : '%' . $alamat . '%';
        $filter['email'] = empty($email) ? '%' :  $nomor_kartu;
        $params = array($filter['nama_kontak'], $filter['alamat'], $filter['email']);
        // get data dari model dengan param
        $res = $this->m_kontak->get_all($params);
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
            $row[]=$data['nama_kontak'];
            $row[]=$data['kordinat'];
            $row[]=$data['alamat'];
            $row[]=$data['no_tlp'];
            $row[]=$data['email'];
            $row[]=$data['tipe'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_kontak"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_kontak"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_kontak"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_kontak"].'\')" ><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }

    function add_process(){
        $data = array(
            'nama_kontak' => $this->input->post('nama_kontak'),
            'tipe' => $this->input->post('tipe'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
            'kordinat' => $this->input->post('kordinat'),
            'email' => $this->input->post('email'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
         if($this->m_kontak->get_add($data)){ //jika update berhasil
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
        $data = $this->m_kontak->get_detail_data($data_id);
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
        $data['id_kontak'] = $this->input->post('id_kontak');
        // validate
        if (empty($data['id_kontak'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
            echo json_encode($response);
        }
        // insert db
        $params = array(
            'nama_kontak' => $this->input->post('nama_kontak'),
            'tipe' => $this->input->post('tipe'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
            'kordinat' => $this->input->post('kordinat'),
            'email' => $this->input->post('email'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_kontak' => $this->input->post('id_kontak'),
        );
        if ($this->m_kontak->get_edit($params, $where)) {
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
            'id_kontak' => $this->input->post('id_hapus')
        );
        if ($this->m_kontak->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }

}