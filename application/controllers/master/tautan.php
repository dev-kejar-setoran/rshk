<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tautan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        //$this->load->model('monitoring_model');
    }

    function index()
    {
        $data['title_page']='Tautan';
		$this->load->view('master/tautan/index', $data);
	}
}