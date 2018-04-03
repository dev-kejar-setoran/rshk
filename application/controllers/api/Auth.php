<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_api_auth');
	}
	public function login()
	{


		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->M_api_auth->check_auth_client();
			if($check_auth_client == true){
				$params = json_decode(file_get_contents('php://input'), TRUE);
				if ($params['email'] == "" || $params['password'] == "") {

					$response = array('status' => 400,'message' =>  'Email atau password Salah!');
				} else {
					$email = $params['email'];
					$password = $params['password'];
					$response = $this->M_api_auth->login($email,$password);
					//}
					json_output($response['status'],$response);
					
				}
			}


		}
	}

	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->M_api_auth->check_auth_client();
			if($check_auth_client == true){
				$response = $this->M_api_auth->logout();
				json_output($response['status'],$response);
			}
		}
	}
	
}
