<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth{
    protected $_ci;
    function __construct() {
        $this->_ci = &get_instance();
        //$this->auth->validation();
        //$this->_ci->load->model('auth_model');
    }

    //$this->auth->validation();
    function validation()
    {
    	 if ($this->_ci->session->userdata('status')==false) {
    	 	 $this->_ci->session->set_flashdata('message_login', "toastr.error('Session expired. Please, try login again.', 'Mohon maaf');");
            echo '<meta http-equiv="refresh" content="0;URL=\''.base_url('auth').'\'" />  ';
        }
    }
}