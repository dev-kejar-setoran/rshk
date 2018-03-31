<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pasien extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('m_data_pasien');
    }

    function index()
    {
        $data['title_page']='Data Pasien';
        $data['tabel_data'] = $this->m_data_pasien->get_all();
        //echo json_encode($data['tabel_data']);
        //print_r($data); exit();
		$this->load->view('master/data_pasien/index', $data);
	}

    // proses tambah
    public function add_process() {
        print_r($this->input->post()); exit();
        // set rule
        $this->form_validation->set_rules('nama_pasien', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_kartu', 'nomor kartu', 'required|max_length[20]');
        $this->form_validation->set_rules('jenis_kelamin', 'JK', 'required|max_length[55]');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'max_length[55]');
        // validasi form
        if ($this->form_validation->run() == TRUE) {
            // parameter update
            $data = array(
                //'id_pasien' => date('ymdhis'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'nomor_kartu' => $this->input->post('nomor_kartu'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => ($this->input->post('tgl_lahir',TRUE) == '' ? NULL : $this->input->post('tgl_lahir', TRUE)),
                'id_kewarganegaraan' => $this->input->post('id_kewarganegaraan'),
                'asuransi' => $this->input->post('asuransi'),
                'created_by' => $this->input->post('created_by'),
                'created_at' => date('Y-m-d H:i:s'),
            );
            // run fungsi update
            if($this->m_data_pasien->add($data)){ //jika update berhasil
                // jika ada file
                $this->session->set_flashdata('pesan', 'Data berhasil disimpann.');
            }else{ //jika update gagal
                $this->session->set_flashdata('error', 'Data gagal diubah.');
            }
            // redirect
            redirect('master/data_pasien/');

        } else {
            $errors = $this->form_validation->error_array();
            // redirect gagal
            $this->add();
        }
    }


    public function create() {
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
        if($this->m_data_pasien->create2($data)){ //jika update berhasil
            $response['status']="sukses";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }

    public function load(){
        $html = '';
        $no = 1;
        $data['tabel_data'] = $this->m_data_pasien->get_all();
        foreach ($data['tabel_data'] AS $item) {    
            $html .= '     
                <tr>
                    <td>'. $no .'</td>
                    <td>'.$item["nama_pasien"].'</td>
                    <td>'.$item["nomor_kartu"].'</td>
                    <td>'.$item["tempat_lahir"].'</td>
                    <td>'.$item["tgl_lahir"].'</td>
                    <td>'.$item["created_at"].'</td>
                    <td>'.$item["created_by"].'</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="'.$item["id_pasien"].'" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="'.$item["id_pasien"].'" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                </tr>';
        } // foreach 3
        echo $html;
    }
}