<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template{
    protected $_ci;
    function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->model('auth_model');
    }

    function backend($template =NULL, $data = NULL) {
        // $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $id_user=$this->_ci->session->userdata('id_user');
        $data['_ROLE']=$this->_ci->auth_model->role($id_user);
        $data['sub_menu'] = $this->_ci->db->query("SELECT * FROM OPHAR_MENU_SUPPORT WHERE AVAILABLE=1  order by name asc")->result_array();
        if($template ==NULL)
        {
            $template='errors/html/error_null_view';
        }
        $data['content']=$template;
        $data['_headercss'] = $this->_ci->load->view('templete/headercss', $data, TRUE);
        $data['_headerjs'] = $this->_ci->load->view('templete/headerjs', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('templete/footer', $data, TRUE);
        $data['_menu'] = $this->_ci->load->view('templete/menu', $data, TRUE);
        $this->_ci->load->view('templete/main',$data);
    }

    function login($template =NULL, $data = NULL)
    {
        //$data['_menu'] = $this->_ci->load->view('templete/menu', $data, TRUE);
        $data['_headercss'] = $this->_ci->load->view('templete/headercss', $data, TRUE);
        $data['_headerjs'] = $this->_ci->load->view('templete/headerjs', $data, TRUE);
        $data['content']=$template;
        $this->_ci->load->view('templete/login',$data);
    }

}