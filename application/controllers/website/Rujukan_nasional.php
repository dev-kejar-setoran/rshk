<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rujukan_nasional extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        $this->load->library('form_validation');
        $this->load->model('M_slider');
    }

    function index()
    {
        $data['title_page']='Rujukan Nasional';
		$this->load->view('website/rujukan-nasional/list', $data);
	}

} 
?>