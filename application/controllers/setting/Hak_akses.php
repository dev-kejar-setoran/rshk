<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hak_akses extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        //$this->load->library('form_validation');
        $this->load->model('m_hak_akses');
    }

    // default
    public function index()
    {
        $data['title_page']='Hak Akses';
        $this->load->view('setting/hak_akses/index', $data);
    }

    // untuk load data table
    public function load_json(){
        // parameter search 
        // get data dari model dengan param
        $res = $this->m_hak_akses->get_all_role();
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
            $row[]=$data['role'];
            $row[]=$data['deskripsi'];
            $row[]='<a href="'.base_url('setting/hak_akses/rincian_menu/'.$data["role"]).'" >
                    <div class="ui mini labeled button" tabindex="0">
                      <div class="ui mini green button">
                        <i class="list icon"></i> Lihat Rincian
                      </div>
                      <div class="ui mini basic green left pointing label">
                        '.$data['jumlah_menu'].'
                      </div>
                    </div>
                    </a>';
            $row[]=' <button type="button" data-content="Ubah Data" data-id="'.$data["id_role"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_role"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_role"].'" class="ui mini red icon delete button"  onclick="form_hapus(\''.$data["role"].'\')" ><i class="trash icon"></i></button>
                        ';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }


    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        $data_id = $this->input->post('data_id');
        // parameter
        //$params = array($noagenda, $noba, $no_tiket);
        $data = $this->m_hak_akses->get_detail_data($data_id);
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

    // mengirim detail data untuk edit, dsb
    public function rincian_menu($role) {

        $data['title_page']='Rincian Menu';
        $data['role']=$role;
        $this->load->view('setting/hak_akses/list_menu', $data);
    }

    // mengirim detail data untuk edit, dsb
    public function save() {
        print_r($this->input->post());

        $data['title_page']='Hak Akses';
        $this->form_validation->set_rules('role','Role', 'required|max_length[50]|is_unique[m_role_user.role]');

        // run validation
        if ($this->form_validation->run() == TRUE) {
            $err_msg = validation_errors(); // string pesan default
            //$err_msg = $this->form_validation->error_array();
            $data['response']['type']="warning";
            $data['response']['title']="Gagal Tersimpan!";
            $data['response']['pesan']="Role tidak ditemukan. ";

            $this->session->set_flashdata('pesan', $data);
            redirect("setting/hak_akses/");
        } 
        $where = array(
            'role' => $this->input->post('role')
        );
        $this->m_hak_akses->get_delete_role_user($where);
        // insert
        $rules = $this->input->post('rules');
        if (is_array($rules)) {
            foreach ($rules as $id_role_menu => $val) {
                // insert
                // parameter input
                $params = array(
                    'role' => $this->input->post('role'),
                    'id_role_menu' => $id_role_menu,
                    'created_by' => $this->session->userdata('nama_lengkap'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $this->m_hak_akses->insert_role_user($params);
            }
        }
            $data['response']['type']="success";
            $data['response']['title']="Tersimpan!";
            $data['response']['pesan']="Data berhasil disimpan";
            $role = $this->input->post('role');
            $this->session->set_flashdata('pesan', $data);
            redirect("setting/hak_akses/rincian_menu/" . $role);
    }


    // untuk load data table
    public function load_menu_json(){
        // parameter 
        $role = $this->input->post('role');
        // get data dari model dengan param
        $res = $this->m_hak_akses->get_list_menu($role);
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
            //$row[]="<input type='checkbox' name='dtmenu_" . $data['id_role_menu'] . "' value='1' >";
            $row[]="<input class='r" . $data['id_role_menu'] . "' type='checkbox' name='rules[" . $data['id_role_menu'] . "]' value='1' " . ($data['role'] == $role ? 'checked="true"' : '') . " />";
            $row[]=$data['nama_menu'];
            $row[]=$data['urutan'];
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }


    function add_process() {
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role','Nama Role / Hak Akses', 'required|max_length[50]|is_unique[m_role_master.role]');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'max_length[200]');
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
        // parameter input
        $params = array(
            'role' => $this->input->post('role'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_by' => $this->session->userdata('nama_lengkap'),
            'created_at' => date('Y-m-d H:i:s'),
        );
         // run fungsi update
        if($this->m_hak_akses->get_add_role($params)){ //jika update berhasil
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


    // proses edit setelah di entry
    public function edit_process() {
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_role','ID Pasien', 'required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'max_length[200]');
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
        // iparameter input
        $params = array(
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_by' => $this->session->userdata('nama_lengkap'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_role' => $this->input->post('id_role'),
        );
        if ($this->m_hak_akses->get_edit_role($params, $where)) {
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



    // proses edit setelah di entry
    public function edit_process_rincian() {
        $role = $this->input->post('role');
        //print_r($role);

            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Data gagal disimpan"; exit();
        // parameter validation
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_hak_akses','ID Pasien', 'required');
        $this->form_validation->set_rules('role','Nama Pasien', 'required');
        $this->form_validation->set_rules('hak_akses','Nomor Kartu', 'required');
        $this->form_validation->set_rules('jumlah_menu','Tempat Lahir','required');
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
        // iparameter input
        $params = array(
            'role' => $this->input->post('role'),
            'hak_akses' => $this->input->post('hak_akses'),
            'jumlah_menu' => $this->input->post('jumlah_menu'),
            'updated_by' => $this->session->userdata('nama_lengkap'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_hak_akses' => $this->input->post('id_hak_akses'),
        );
        if ($this->m_hak_akses->get_edit($params, $where)) {
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

        $this->form_validation->set_rules('id_hapus','Role', 'required|max_length[50]|is_unique[m_role_user.role]');

        // run validation
        if ($this->form_validation->run() == FALSE) {
            $err_msg = validation_errors();
            //$err_msg = $this->form_validation->error_array();
            $response['type']="warning";
            $response['title']="Gagal Tersimpan!";
            $response['pesan']="Silahkan hapus semua centang pada Rincian Akses Menu terlebih dahulu. ";
            echo json_encode($response); 
            return;
        } 
        $where = array(
            'role' => $this->input->post('id_hapus')
        );
        if ($this->m_hak_akses->get_delete($where)) {
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