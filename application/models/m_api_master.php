<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api_master extends CI_Model {
	function __construct() {
		parent::__construct();
	}


	public function mGetDataDokter()
	{


		$this->db->select('*');
		$this->db->from('m_data_dokter');
		$this->db->join('m_spesialisasi', 'm_spesialisasi.id_spesialisasi = m_data_dokter.id_spesialisasi');
		$this->db->join('m_jabatan_dokter', 'm_jabatan_dokter.id_jabatan_dokter = m_data_dokter.id_jabatan_dokter');
		return $this->db->get()->result();	

	}





















	public function book_detail_data($id)
	{
		return $this->db->select('id,title,author')->from('books')->where('id',$id)->order_by('id','desc')->get()->row();
	}

	public function book_create_data($data)
	{
		$this->db->insert('books',$data);
		return array('status' => 201,'message' => 'Data has been created.');
	}

	public function book_update_data($id,$data)
	{
		$this->db->where('id',$id)->update('books',$data);
		return array('status' => 200,'message' => 'Data has been updated.');
	}

	public function book_delete_data($id)
	{
		$this->db->where('id',$id)->delete('books');
		return array('status' => 200,'message' => 'Data has been deleted.');
	}

}
