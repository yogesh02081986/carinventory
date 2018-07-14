<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_manufacturer()
	{
		//$this->db->select('manufacturer_id','manufacturer_name');
		$this->db->where('status',1);
		$this->db->from('ci_manufacturer');
		$res = $this->db->get();		
		return $res->result_array();
	}
	
	public function save_manufacturer($insert_arr=array())
	{
		$this->db->insert('ci_manufacturer',$insert_arr);
		return $this->db->insert_id();
	}
}
