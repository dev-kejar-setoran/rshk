<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_list extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('M_artikel_list');
    }

    // default
    public function index()
    {
        $data['title_page']='Artikel List';
        $this->load->view('artikel/list/list', $data);
    }

    // untuk load data table
    public function load_json(){
       // parameter search 
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $filter['judul'] = empty($judul) ? '%' : '%' . $judul . '%';
        $filter['deskripsi'] = empty($deskripsi) ? '%' :  $deskripsi;
        $params = array($filter['judul'], $filter['deskripsi']);
        // get data dari model dengan param
        $res = $this->M_artikel_list->get_all($params);
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
            $row[]=$data['judul_artikel'];
            $row[]=$data['slug'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<a href="'.base_url().'artikel/artikel_list/show_detail/'.$data["id_artikel_list"].'"  data-content="Ubah Data"   data-id="'.$data["id_artikel_list"].'" class="ui mini orange icon edit button"><i class="edit icon"></i></a>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_artikel_list"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["id_artikel_list"].'\')" ><i class="trash icon"></i></button>';
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
        $this->form_validation->set_rules('judul_artikel','Judul Artikel', 'required');
        $this->form_validation->set_rules('isi','Isi', 'required');
        $this->form_validation->set_rules('deskripsi_singkat','Deskripsi Singkat','required');
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

                $new_name = $_FILES['input_gambar']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = 'assets/img/upload/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 4024;
                $this->load->library('upload', $config);
            }else{
                $response['type']="warning";
                $response['title']="Gambar Harus Dipilih!";
                $response['pesan']="Data gagal disimpan";
                echo json_encode($response); 
                return;
            }
        $data = array(
            'judul_artikel' => $this->input->post('judul_artikel'),
            'isi' => $this->input->post('isi'),
            'id_artikel_kategori' => $this->input->post('id_artikel_kategori'),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
            'gambar' => $_FILES['input_gambar']['name']
        );
         // run fungsi update
        if($this->upload->do_upload('input_gambar')){ //jika insert berhasil
            $this->M_artikel_list->get_add($data);
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

    public function tambah(){
        $data['form']=$this->input->post(' ');
        $data['id_artikel_list']=$this->input->post(' ');
        $data['artikel']=$this->input->post(' ');
        $this->load->view('artikel/list/detail',$data);
    }

    // mengirim detail data untuk edit, dsb
    public function show_detail($data_id=""){

        $data['form']='edit_process';
        //jika tidak ada edit 
        $data['artikel'] = $this->M_artikel_list->get_detail_data($data_id);
        // ke view
        $this->load->view('artikel/list/detail', $data);
    }

    // proses edit setelah di entry
    public function edit_process() {
         $data['artikel'] = $this->input->post('id_artikel_list');
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('judul_artikel','Judul Artikel', 'required');
        $this->form_validation->set_rules('isi','Isi', 'required');
        $this->form_validation->set_rules('deskripsi_singkat','Deskripsi Singkat','required');

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
      
        // validate
        if (empty($data['artikel'])) {
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan";
            echo json_encode($response);
            return;
        } else{
            // insert db
            $params = array(
                'judul_artikel' => $this->input->post('judul_artikel'),
                'isi' => $this->input->post('isi'),
                'id_artikel_kategori' => $this->input->post('id_artikel_kategori'),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'gambar' => $_FILES['input_gambar']['name'],
                'updated_by' => $this->session->userdata('nama_lengkap'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $where = array(
                'id_artikel_list' => $this->input->post('id_artikel_list')
            );
            if ($this->M_artikel_list->get_edit($params, $where)) {
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
            'id_artikel_list' => $this->input->post('id_hapus')
        );
        if ($this->M_artikel_list->get_delete($where)) {
            $response['status']="sukses";
            $response['pesan']="Data berhasil dihapus";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal dihapus";
        }
        echo json_encode($response);
    }


}