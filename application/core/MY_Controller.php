<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek status login user
        $session['id_user']=$this->session->userdata('id_user');
        if(empty($session['id_user'])){
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;URL=\''.base_url('auth').'\'" />  ';
            //redirect('auth');
      }
         
    }   
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */