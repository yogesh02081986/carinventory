<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_models_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_inventory()
	{
		$this->db->select('m.manufacturer_id,m.manufacturer_name,cm.car_model_id,cm.car_model_name, count(cm.manufacturer_id) as cnt');
		$this->db->where('m.status',1);
		$this->db->where('cm.status',1);
		$this->db->group_by('cm.manufacturer_id');
		$this->db->from('ci_manufacturer m');
		$this->db->join('ci_car_models cm', 'm.manufacturer_id = cm.manufacturer_id', 'inner'); 
		$res = $this->db->get();		
		return $res->result_array();
	}
	
	public function get_inventory_by_manufacturer($man_id)
	{
		$this->db->select('m.*,cm.*');
		$this->db->where('m.status',1);
		$this->db->where('cm.status',1);
		$this->db->where('cm.manufacturer_id',$man_id);
		$this->db->from('ci_manufacturer m');
		$this->db->join('ci_car_models cm', 'm.manufacturer_id = cm.manufacturer_id', 'inner'); 
		$res = $this->db->get();		
		return $res->result_array();
	}
	
	
	public function update_inventory($update_arr=array(),$model_id)
	{
		$this->db->where('car_model_id', $model_id);
		if($this->db->update('ci_car_models',$update_arr)){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function save_car_models($insert_arr=array())
	{
		$this->db->insert('ci_car_models',$insert_arr);
		return $this->db->insert_id();
	}
}
