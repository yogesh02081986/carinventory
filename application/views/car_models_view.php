<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Car Inventory</title>

	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	  
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-glyphicons.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
	

</head>
<body>


<div class="container col-md-10">
<!-- A grey horizontal navbar that becomes vertical on small screens -->

<nav class="navbar navbar-expand-sm bg-light">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/manufacturer">Add Manufacturer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/car_models">Add Car Models</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/inventory">View Inventory</a>
    </li>
  </ul>
</nav>

<h2 class="heading" >Add Car Models</h2>
<hr>
<form id="frm-car-models" name="frm-car-models" method="post" action="<?php echo base_url('index.php/car_models/add');?>" enctype="multipart/form-data">
  
  <div class="row">
	  <div class="form-group col-md-2">
		<label for="car_model_name">Manufacturer Name: </label>    
	  </div>	
	  <div class="form-group col-md-3">    
		<select id="manufacturer_id" name="manufacturer_id">
			<option value="" >Select Manufacturer</option>
			<?php if($manufacturer_list){
				foreach($manufacturer_list as $manufacturer)
				{
					$manufacturer_id = $manufacturer['manufacturer_id'];
					$manufacturer_name = $manufacturer['manufacturer_name'];
					
					?>
						<option value="<?php echo $manufacturer_id; ?>" ><?php echo $manufacturer_name; ?></option>
					<?php
				}
			} ?>
			
			
		</select>
	  </div>
	  
	  <div class="form-group col-md-2">
		<label for="car_model_name">Car_models Name: </label>    
	  </div>
	  <div class="form-group col-md-3">    
		<input type="text" class="form-control" id="car_model_name" name="car_model_name" placeholder="Enter Car Model Name"  >
	  </div>
  </div>
  
  <div class="row">
	  <div class="form-group col-md-2">
		<label for="car_model_name">Model Color: </label>    
	  </div>	
	  <div class="form-group col-md-3">    
		<input type="text" class="form-control" id="model_color" name="model_color" placeholder="Enter Car Model Color"  >
	  </div>
	  
	  <div class="form-group col-md-2">
		<label for="car_model_name">Manufacturing Year: </label>    
	  </div>
	  <div class="form-group col-md-3">    
		<input type="text" class="form-control" id="manufacturing_year" name="manufacturing_year" placeholder="Enter Manufacturing Year"  >
	  </div>
  </div>
 
  <div class="row">
	  <div class="form-group col-md-2">
		<label for="car_model_name">Registration Number: </label>    
	  </div>	
	  <div class="form-group col-md-3">    
		<input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Enter Registration Number"  >
	  </div>
	  
	  <div class="form-group col-md-2">
		<label for="car_model_name">Notes: </label>    
	  </div>
	  <div class="form-group col-md-3">    
		<textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes"  ></textarea>
	  </div>
  </div>
  
   <div class="row">
	  <div class="form-group col-md-2">
		<label for="car_model_name">Picture 1: </label>    
	  </div>	
	  <div class="form-group col-md-3">    
		<input type="file" class="form-control" id="picture_1" name="picture_1" placeholder="select Picture 1"  >
	  </div>
	  
	  <div class="form-group col-md-2">
		<label for="car_model_name">Picture 2: </label>    
	  </div>
	  <div class="form-group col-md-3">    
		<input type="file" class="form-control" id="picture_2" name="picture_2" placeholder="select Picture 2"  >
	  </div>
  </div>
  
  
  <div class="form-group col-md-6">    
    <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit" value="submit" >Submit</button>
  </div>
  
</form>
</div>



	<script src="<?php echo base_url('assets/js/jquery-3.1.0.min.js'); ?>" ></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>" ></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
<script>
$(document).ready(function() {
	
	
	function validate(frm){
		$("#frm-car-models").validate({
	  rules: {
		
		   manufacturer_id: {
			required: true,      
		  },
		  car_model_name: {
			required: true,      
		  },
		  model_color: {
			required: true,      
		  },
		  manufacturing_year: {
			required: true,      
		  },
		  registration_number: {
			required: true,      
		  },
		  notes: {
			required: true,      
		  },
		  picture_1: {
			required: true,      
		  },
		  picture_2: {
			required: true,      
		  }
		},
		messages: {
			
			 manufacturer_id: {
				required: 'Please enter Car Models Name.',      
			  },
			  car_model_name: {
				required: 'Please enter Car Models Name.',      
			  },
			  model_color: {
				required: 'Please enter Car Models Color.',      
			  },
			  manufacturing_year: {
				required: 'Please enter Manufacturing Year.',      
			  },
			  registration_number: {
				required: 'Please enter Registration Number.',      
			  },
			  notes: {
				required: 'Please enter Notes.',      
			  },
			  picture_1: {
				required: 'Please select Picture 1.',      
			  },
			  picture_2: {
				required: 'Please select Picture 2.',      
			  }
		},
		submitHandler: function(form) {
			//form.submit();
			
			//save_ajax();
				var manufacturer_id = $('#manufacturer_id').val();
				var car_model_name = $('#car_model_name').val();
				var model_color = $('#model_color').val();
				var manufacturing_year = $('#manufacturing_year').val();
				var registration_number = $('#registration_number').val();
				var notes = $('#notes').val();
				//var picture_1 = $('#picture_1').val();
				//var picture_2 = $('#picture_2').val();
				
				var postData = {
					    'manufacturer_id' : manufacturer_id,		 
					    'car_model_name' : car_model_name,
						'model_color' :  model_color,
						'manufacturing_year' :  manufacturing_year,
						'registration_number' :  registration_number,
						'notes' : notes,
						//'picture_1' :  picture_1,
						//'picture_2' : picture_2
					};
					//var files1 = $('#picture_1').files;
					//var files2 = $('#picture_1').files;
					
					
					
				//var formData = new FormData(this);
				
				//formData.append("files[]", files1);
				//formData.append("files[]", files2);
				
				//console.log(formData);
				$.ajax({
					url: form.action,
					type: form.method,
					data:  new FormData(frm),
				    contentType: false,
					cache: false,
				    processData:false,
					dataType: 'text',			
					success: function(data)
					{
					   console.log(data);
					   alert('Car Models added successfully!');
					   $('#frm-car-models')[0].reset(); // reset form
					  //location.reload();// for reload a page
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						console.log(errorThrown);
						alert('Error adding / update data');
					}
				});
		}
	  
	});
	}
	
	$('#frm-car-models').on('submit', function(e){
		e.preventDefault();
		//var data = $(this).serialize();
		var aa = validate(this);
		//alert(aa);
		
		
		
	});
});
</script>
</body>
</html>