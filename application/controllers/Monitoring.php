<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         //$this->auth->validation();
        //$this->load->model('monitoring_model');
    }

    function monitoring_dashbord()
    {
        $data['title_page']='Dashbord RS Harapan Kita';
		$this->load->view('dashboard',$data);
	}
}