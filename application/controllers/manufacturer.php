<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends CI_Controller {

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
		$this->load->model('manufacturer_model');
	 }
	public function index()
	{
		$this->load->view('manufacturer_view');
	}
	
	public function add()
	{
		//print_r($_POST); die;
		//if($this->input->post('btnSubmit'))
		//{
			$current_date = date('Y-m-d H:i:s');
			$insert_array = array(
							'manufacturer_name' => $this->input->post('manufacturer_name'),
							'created_on' => $current_date,
							'status' => 1
						);
			
			$res = $this->manufacturer_model->save_manufacturer($insert_array);
			echo $res;
	}
}
