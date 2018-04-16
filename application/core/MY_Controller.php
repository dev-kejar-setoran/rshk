<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->check_session_login();

        $this->check_authority();
         
    }   


    protected function check_session_login(){
         // cek status login user
        $session['id_user']=$this->session->userdata('id_user');
        if(empty($session['id_user'])){
            session_destroy();
            //echo '<meta http-equiv="refresh" content="0;URL=\''.base_url('auth').'\'" />  ';
            redirect('auth');
        }
    }

    // authority
    protected function check_authority() {
        $url_menu = $this->uri->segment(1) . '/' . $this->uri->segment(2);

        // print_r($params[0]); die();
        $this->db->select('a.id_role_menu, url');
        $this->db->join('m_role_user b', 'a.id_role_menu = b.id_role_menu', 'INNER');  
        $this->db->where('role',$this->session->userdata('role'));
        $this->db->where('url',$url_menu);
        
        $query = $this->db->get('m_role_menu a');

        if ($query->num_rows() < 1) {
            // tidak memiliki authority
            redirect('home');
        }
    }
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */