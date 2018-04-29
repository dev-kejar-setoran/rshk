<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_rumah_sakit extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('api/master/M_api_master_rumah_sakit');
		$this->load->model('api/M_api_auth');
		$this->load->library('pagination');
	}

	

	public function getDataRumahSakit()
	{

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->M_api_auth->check_auth_client();
			if($check_auth_client == true){
				$response = $this->M_api_auth->auth();
				if($response['status'] == 200){
					$resp = $this->M_api_master_rumah_sakit->getDataRumahSakit();
					$names = array($resp);
					$rowperpage =2;
					$rowno=1;

    				// Row position
					if($rowno != 0){
						$rowno = ($rowno-1) * $rowperpage;
					}

					// All records count
					$allcount = $this->M_api_master_rumah_sakit->getrecordCountDataRumahSakit();
					$num_links= round($allcount/$rowperpage);
					// $config['base_url'] = base_url().'api/apimaster/master_rumah_sakit/getDataRumahSakit/';
					// $config['use_page_numbers'] = TRUE;
					// $config['total_rows'] = $allcount;
					// $config['per_page'] = $rowperpage;
					// $config['num_links'] = $num_links;
					// $config["uri_segment"] = 5;
    				// Initialize
					$this->pagination->initialize($config);

					if($this->uri->segment(5)){
					$page = ($this->uri->segment(5)) ;
					}
					else{
					$page = 0;
					}
    				// Get records
					$users_record = $this->M_api_master_rumah_sakit->getData($rowperpage,$page);
					//get lastPage
					$next= $page+1;
					if($this->uri->segment(5) == 0){
						$prev= 0;
						$prevPage = NULL;
					}else{
						$prev= $page-1;
						$prevPage = base_url().'api/apimaster/master_rumah_sakit/getDataRumahSakit/'.$prev;

					}
					$from = (int)$this->uri->segment(5) + 1;
					if ($this->uri->segment(5) + $rowperpage > $allcount) {
						$to = $allcount;
					} else {
						$to = (int)$this->uri->segment(5) + $rowperpage;
					}
					// Initialize $data Array
					$data['current_page'] = $page;// $this->pagination->create_links();
					$data['data'] = $users_record;
					$data['from'] = $from;
					$data['last_page'] = $num_links;
					$data['next_page_url'] = base_url().'api/apimaster/master_rumah_sakit/getDataRumahSakit/'.$next;
					$data['path'] = base_url().'api/apimaster/master_rumah_sakit/getDataRumahSakit/';
					$data['per_page'] = $rowperpage;
					$data['prev_page_url'] = $prevPage;
					$data['to'] = $to;
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
	if($method != 'GET' || $this->uri->segment(5) == '' || is_numeric($this->uri->segment(5)) == FALSE){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		// $check_auth_client = $this->MyModel->check_auth_client();
		// if($check_auth_client == true){
		// 	$response = $this->MyModel->auth();
		// 	if($response['status'] == 200){
		// 		$resp = $this->MyModel->book_detail_data($id);
		// 		json_output($response['status'],$resp);
		// 	}
		// }
		$resp = $this->M_api_master_rumah_sakit->rumah_sakit_detail_data($id);
		json_output($response['status'],$resp);
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
