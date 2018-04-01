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

    public function index()
    {
        $data['title_page']='Data Pasien';
        $data['tabel_data'] = $this->m_data_pasien->get_all();
        //echo json_encode($data['tabel_data']);
        //print_r($data); exit();
        $this->load->view('master/data_pasien/index', $data);
    }

    // public function load(){
    //     $html = '';
    //     $no = 1;
    //     $data['tabel_data'] = $this->m_data_pasien->get_all();
    //     foreach ($data['tabel_data'] AS $item) {    
    //         $html .= '     
    //             <tr>
    //                 <td>'. $no .'</td>
    //                 <td>'.$item["nama_pasien"].'</td>
    //                 <td>'.$item["nomor_kartu"].'</td>
    //                 <td>'.$item["tempat_lahir"].'</td>
    //                 <td>'.$item["tgl_lahir"].'</td>
    //                 <td>'.$item["created_at"].'</td>
    //                 <td>'.$item["created_by"].'</td>
    //                 <td class="center aligned">
    //                   <button type="button" data-content="Ubah Data" data-id="'.$item["id_pasien"].'" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
    //                   <button type="button" data-content="Hapus Data" data-id="'.$item["id_pasien"].'" class="ui mini red icon delete button"><i class="trash icon"></i></button>
    //                 </td>
    //             </tr>';
    //     } // foreach 3
    //     echo $html;
    // }


    public function load_json(){
        $res = $this->m_data_pasien->get_all();
        foreach ($res as $data) {
            $row=array();
            $row[]=$data['id_pasien'];
            $row[]=$data['nama_pasien'];
            $row[]=$data['nomor_kartu'];
            $row[]=$data['tempat_lahir'];
            $row[]=$data['tgl_lahir'];
            $row[]=$data['created_at'];
            $row[]=$data['created_by'];
            $row[]='<button type="button" data-content="Ubah Data" data-id="'.$data["id_pasien"].'" class="ui mini orange icon edit button" onclick="form_edit(\''.$data["id_pasien"].'\')"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="'.$data["id_pasien"].'" class="ui mini red icon delete button"><i class="trash icon"></i></button>';
            $dataarray[] = $row;
        }
        $output = array(
            "data" => $dataarray,
        );
        echo json_encode($output);
    }


    public function add_process() {
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
            $response['status']="sukses";
            $response['pesan']="Data berhasil disimpan";
        }else{ //jika  gagal
            $response['status']="gagal";
            $response['pesan']="Data gagal disimpan";
        }
        echo json_encode($response);
    }


    // passing value for edit
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


    public function edit_process() {
        $data['id_data'] = $this->input->post('id_data');
        // validate
        if (empty($data['id_data'])) {
            $response['status']="gagal";
            $response['pesan']="Data tidak ditemukan!";
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
            'created_by' => $this->session->userdata('username'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array(
            'id_pasien' => $this->input->post('id_data'),
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

}