<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
	 {
		parent::__construct();		
		$this->load->model('car_models_model');
	 }
	public function index()
	{
		$data['inventory_data'] = $this->car_models_model->get_inventory();
		
		$this->load->view('inventory_view',$data);
	}
	
	public function view_perticular_inventory()
	{
		$man_id = $this->input->post('man_id');
		$data['inventory_pert_data'] = $this->car_models_model->get_inventory_by_manufacturer($man_id);		
		echo json_encode($data['inventory_pert_data']);
	}
	
	public function sold($model_id)
	{
		
		$update_array = array(
							'status' => 0
						);
			
			$res = $this->car_models_model->update_inventory($update_array,$model_id);
			redirect(base_url().'index.php/inventory');
	}
	
	
}
