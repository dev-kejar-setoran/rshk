<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api_master_rumah_sakit extends CI_Model {
	function __construct() {
		parent::__construct();
	}


	//public function getData($rowno,$rowperpage) {
		public function getData($rowperpage,$page) {	
		$this->db->select('*');
		$this->db->from('m_rumah_sakit');
		$this->db->limit($rowperpage, $page);  
		$query = $this->db->get();

		return $query->result_array();
	}

  // Select total records
	public function getrecordCountDataRumahSakit() {

		$this->db->select('count(*) as allcount');
		$this->db->from('m_rumah_sakit');
		$query = $this->db->get();
		$result = $query->result_array();

		return $result[0]['allcount'];
	}

	public function getDataRumahSakit()
	{
		$this->db->select('*');
		$this->db->from('m_rumah_sakit');
		return $this->db->get()->result();

	}




	public function rumah_sakit_detail_data($id)
	{
		return $this->db->select('id_rumah_sakit,nama_rumah_sakit,alamat, no_telp')->from('m_rumah_sakit')->where('id',$id)->order_by('id','desc')->get()->row();
	}

	public function create_data($data)
	{
		$this->db->insert('m_rumah_sakit',$data);
		return array('status' => 201,'message' => 'Data has been created.');
	}

	// public function book_update_data($id,$data)
	// {
	// 	$this->db->where('id',$id)->update('books',$data);
	// 	return array('status' => 200,'message' => 'Data has been updated.');
	// }

	// public function book_delete_data($id)
	// {
	// 	$this->db->where('id',$id)->delete('books');
	// 	return array('status' => 200,'message' => 'Data has been deleted.');
	// }

}
