<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->auth->validation();
    }

    function base_url()
    {
        $port=":".filter_input(INPUT_SERVER, 'SERVER_PORT');
        $servername=filter_input(INPUT_SERVER, 'SERVER_NAME').$port;
        $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
        $newurl = str_replace("index.php","index.php", $_SERVER['SCRIPT_NAME']);
        echo $http.$servername.$newurl."/";
    }
    function index()
    {

		echo '<meta http-equiv="refresh" content="0;URL=\''.base_url('monitoring/monitoring_dashbord').'\'" />  ';

    }

    public function cekuser()
    {
        echo $this->session->userdata('id_user');
        echo "string";
    }
}