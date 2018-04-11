<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjanjian_online_admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        //$this->load->model('m_data_pasien');
    }

    // default
    public function index()
    {
        $data['title_page']='Perjanjian Online Admin';
        $this->load->view('administrasi/perjanjian_online/index', $data);
    }

    // untuk load data table
    public function load_json(){
       
    }

    // proses tambah data
    public function add_process() {
        
    }

    // mengirim detail data untuk edit, dsb
    public function get_detail_data() {
        
    }

    // proses edit setelah di entry
    public function edit_process() {
        
    }

    public function delete_process() {
        
    }


}