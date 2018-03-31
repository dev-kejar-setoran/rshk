<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template{
    protected $_ci;
    function __construct() {
        $this->_ci = &get_instance();
    }

    function backend($template =NULL, $data = NULL) {
        //$data['res_menu'] = $this->_ci->ms->get_menu_report();
        // $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        // $data['_header'] = $this->_ci->load->view('backend/header', $data, TRUE);
        // $data['_footer'] = $this->_ci->load->view('backend/footer', $data, TRUE);
        // $data['_menu'] = $this->_ci->load->view('backend/menu', $data, TRUE);
        // $data['_template'] = $this->_ci->load->view('backend/template.php', $data);

        $this->_ci->load->view('templete/main');
    }

    function login($template =NULL, $data = NULL)
    {

    }

}