<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_models extends CI_Controller {

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
		$this->load->model('manufacturer_model');
	 }
	public function index()
	{
		$data['manufacturer_list'] = $this->manufacturer_model->get_manufacturer();
		//echo "<pre>"; print_r($data['manufacturer_list']); exit;
		$this->load->view('car_models_view',$data);
	}
	
	public function add()
	{
		//print_r($_POST); print_r($_FILES); die;
		//if($this->input->post('btnSubmit'))
		//{
			$current_date = date('Y-m-d H:i:s');
			$timestamp = strtotime($current_date);
			
			$picture1 = str_replace(' ','_',$_FILES['picture_1']['name']);
			$picture2 = str_replace(' ','_',$_FILES['picture_2']['name']);
			
//print_r($insert_array); exit;
			
			
			sleep(3);
			  if($picture1 != '')
			  {
			   $output = '';
			   $config["upload_path"] = 'assets/upload/';
			   $config["allowed_types"] = 'gif|jpg|png';
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   
				if($this->upload->do_upload('picture_1'))
				{
					 echo "pic1 uploaded";
					 $data = $this->upload->data();	
					 $picture1 = $data['file_name'];	
									 
				}
				else
				{
					echo $this->upload->display_errors();
				}
				if($this->upload->do_upload('picture_2'))
				{
					 echo "pic2 uploaded";
					 $data = $this->upload->data();	
					$picture2 = $data['file_name'];					 
				}
				else
				{
					echo $this->upload->display_errors();
				} 
			  }
			  
			  $insert_array = array(
							'manufacturer_id' => $this->input->post('manufacturer_id'),
							'car_model_name' => $this->input->post('car_model_name'),
							'model_color' => $this->input->post('model_color'),
							'manufacturing_year' => $this->input->post('manufacturing_year'),
							'registration_number' => $this->input->post('registration_number'),
							'note' => $this->input->post('notes'),
							'picture_1' => $picture1,
							'picture_2' => $picture2,
							'created_on' => $current_date,
							'status' => 1
						);
			 $res = $this->car_models_model->save_car_models($insert_array);
			echo $res; 
			/*die;
			echo $res; 
			if($res>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}*/
			//redirect('car_models','refresh');
		//}
		//$this->load->view('car_models_view');
	}
}
