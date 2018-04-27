<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('api/master/M_api_master_Dokter');
		$this->load->model('api/M_api_auth');
		$this->load->library('pagination');
	}

	

	public function getDataDokter()
	{

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->M_api_auth->check_auth_client();
			if($check_auth_client == true){
				$response = $this->M_api_auth->auth();
				if($response['status'] == 200){
					$resp = $this->M_api_master_Dokter->getDataDokter();
					$names = array($resp);

					// $page = $this->uri->segment(3);

					// $config['base_url'] = 'hhttp://localhost/rshk/api/master/getDataDokter/';
					// $config['total_rows'] = count($this->names);
					// $config['per_page'] = 10; 
					// $this->pagination->initialize($config);
					// $pagedNames = $this->M_api_master_Dokter->mGetDataDokter();

					// $data = array(
					// 	'names'=> $pagedNames, 
					// 	'pages'=> $this->pagination->create_links()

   // Row per page
					$rowperpage =2;
					$rowno=2;

    // Row position
					if($rowno != 0){
						$rowno = ($rowno-1) * $rowperpage;
					}

    // All records count
					$allcount = $this->M_api_master_Dokter->getrecordCountDataDokter();

    // Get records
					$users_record = $this->M_api_master_Dokter->getData($rowno,$rowperpage);

    // Pagination Configuration
					$config['base_url'] = base_url().'api/master/getDataDokter/';
					$config['use_page_numbers'] = TRUE;
					$config['total_rows'] = $allcount;
					$config['per_page'] = $rowperpage;

    // Initialize
					$this->pagination->initialize($config);

						if($rowno != 0){
						$rowno = ($rowno-1) * $rowperpage;
					}

    // Initialize $data Array
    $data['current_page'] = 11;// $this->pagination->create_links();
    $data['data'] = $users_record;
    $data['from'] = $rowno;
    $data['last_page'] = $rowno;
    $data['next_page_url'] = $rowno;
    $data['path'] = base_url().'api/master/getDataDokter/';
    $data['per_page'] = $rowno;
    $data['prev_page_url'] = $rowno;
    $data['to'] = $rowno;
    $data['total'] = $allcount; 

    // echo json_encode($data);



    json_output($response['status'],$data);
}
}
}
}


function get_names($offset=0)
{
	$resp = $this->M_api_master->mGetDataDokter();
	$names = array($resp);

	/* Clear the return variable */
	$return = "";

    /* Ensure we don't retrieve more names from the array than the number that is available
    when accounting for the $offset passed. */
    $count = count($this->names)-$offset;
    $num = ($count > 9) ? 10 : $count; 
    
    /* Collect the users in the $return variable after surrounding with <li> tags */
    for ($i=0; $i<$num; $i++) 
    {
    	$return .= '<li>';
    	$return .= $this->names[$i+$offset];
    	$return .= '</li>';
    }
    
    /* Return the names */
    return $return;
}

public function detail($id)
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		$check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client == true){
			$response = $this->MyModel->auth();
			if($response['status'] == 200){
				$resp = $this->MyModel->book_detail_data($id);
				json_output($response['status'],$resp);
			}
		}
	}
}

public function create()
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != 'POST'){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		$check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client == true){
			$response = $this->MyModel->auth();
			$respStatus = $response['status'];
			if($response['status'] == 200){
				$params = json_decode(file_get_contents('php://input'), TRUE);
				if ($params['title'] == "" || $params['author'] == "") {
					$respStatus = 400;
					$resp = array('status' => 400,'message' =>  'Title & Author can\'t empty');
				} else {
					$resp = $this->MyModel->book_create_data($params);
				}
				json_output($respStatus,$resp);
			}
		}
	}
}

public function update($id)
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		$check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client == true){
			$response = $this->MyModel->auth();
			$respStatus = $response['status'];
			if($response['status'] == 200){
				$params = json_decode(file_get_contents('php://input'), TRUE);
				$params['updated_at'] = date('Y-m-d H:i:s');
				if ($params['title'] == "" || $params['author'] == "") {
					$respStatus = 400;
					$resp = array('status' => 400,'message' =>  'Title & Author can\'t empty');
				} else {
					$resp = $this->MyModel->book_update_data($id,$params);
				}
				json_output($respStatus,$resp);
			}
		}
	}
}

public function delete($id)
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		$check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client == true){
			$response = $this->MyModel->auth();
			if($response['status'] == 200){
				$resp = $this->MyModel->book_delete_data($id);
				json_output($response['status'],$resp);
			}
		}
	}
}

}
