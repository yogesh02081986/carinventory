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

<h2 class="heading" >Add Manufacturer</h2>
<hr>
<form id="frm-manufacturer" name="frm-manufacturer" method="post" action="<?php echo base_url('index.php/manufacturer/add');?>">
  <div class="form-group col-md-6">
    <label for="manufacturer_name">Manufacturer Name: </label>    
  </div>
  <div class="form-group col-md-6">    
    <input type="text" class="form-control" id="manufacturer_name" name="manufacturer_name" placeholder="Enter Manufacturer Name"  >
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
	
	
	function validate(){
		$("#frm-manufacturer").validate({
	  rules: {
		manufacturer_name: {
			required: true,      
		  }
		},
		messages: {
			manufacturer_name: {
				required: 'Please enter Manufacturer Name.',
			}
		},
		submitHandler: function(form) {
			//form.submit();
			//save_ajax();
				var manufacturer_name = $('#manufacturer_name').val();
				var postData = {
					  'manufacturer_name' : manufacturer_name
					};
			
				$.ajax({
					url: form.action,
					type: form.method,
					data: postData,
					dataType: 'text',			
					success: function(data)
					{
					   alert('Manufacturer added successfully!');
					   $('#frm-manufacturer')[0].reset(); // reset form
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
	
	$('#frm-manufacturer').on('submit', function(e){
		e.preventDefault();
		//var data = $(this).serialize();
		var aa = validate();
		//alert(aa);
		
		
	});
});
</script>
</body>
</html>
