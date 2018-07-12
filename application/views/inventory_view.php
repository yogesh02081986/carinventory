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
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css'); ?>" />
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />
	

</head>
<body>


<div class="container col-md-10" style="height:100%">
<!-- A grey horizontal navbar that becomes vertical on small screens -->

<nav class="navbar navbar-expand-sm bg-light">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/manufacturer/add">Add Manufacturer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/car_models/add">Add Car Models</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>index.php/inventory">View Inventory</a>
    </li>
  </ul>
</nav>

<h2 class="heading" >View Inventory</h2>
<hr>

<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
			<?php 
				if($inventory_data){ 
					$j=1;
					foreach($inventory_data as $inv)
					{
						//print_r($inv);		
						$manufacturer_id = $inv['manufacturer_id'];
						$manufacturer_name = $inv['manufacturer_name'];
						 $car_model_name = $inv['car_model_name'];
						 $cnt = $inv['cnt'];
						 ?>
						<tr id="<?php echo $manufacturer_id; ?>">
							<td><?php echo $j; ?></td>
							<td><?php echo $manufacturer_name; ?></td>
							<td><?php echo $car_model_name; ?></td>
							<td><?php echo $cnt; ?></td>
						</tr>
					<?php	$j++;
					}
				
			}
				
			?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Sr. No.</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Count</th>
            </tr>
        </tfoot>
    </table>
</div>



	<script src="<?php echo base_url('assets/js/jquery-3.1.0.min.js'); ?>" ></script>
	
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>" ></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>" ></script>
	
	
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" ></script>
	
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

$(document).ready(function() {
    $('#example').DataTable( { 
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        }
    } );
	
	//$('#example2').DataTable();
	var baseURL = '<?php echo base_url(); ?>';
  var companyTable=  $('#example').DataTable();   
    $('#example').on('click', 'tr', function () {  
	
		var man_id = companyTable.row(this).data()['DT_RowId'];
      
	 
				var postData = {
					  'man_id' : man_id
					};
			
				$.ajax({
					url: 'inventory/view_perticular_inventory',
					type: 'post',
					data: postData,
					dataType: 'text',			
					success: function(data)
					{
					   var response = JSON.parse(data);
					   //console.log(response[0].manufacturer_name);
					   
					   var newRowContent = '';
					   var i=0;
					   for(i=0; i<response.length; i++)
					   {
						   console.log(response[i].manufacturer_name);
						   var newRowContent = '<tr><td>11</td><td>'+response[i].manufacturer_name+'</td><td>'+response[i].car_model_name+'</td><td>'+response[i].model_color+'</td><td>'+response[i].manufacturing_year+'</td><td>'+response[i].registration_number+'</td><td>'+response[i].note+'</td><td>'+response[i].picture_1+'</td><td>'+response[i].picture_2+'</td><td><a href="'+baseURL+'index.php/inventory/sold/'+response[i].car_model_id+'" >Sold</a></td></tr>';
						   
						   $("#ex2").append(newRowContent);
					   }
					   
					   
					   
					   //$('#ex2').append();
					   //$(newRowContent).appendTo("#example2 tbody");
					   
					   //alert('Manufacturer added successfully!');
					   //$('#frm-manufacturer')[0].reset(); // reset form
					  //location.reload();// for reload a page
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						//console.log(errorThrown);
						//alert('Error adding / update data');
					}
				});
				
      $('#DescModal').modal("show");
    
});

$('#example2').DataTable()
} );
</script>

<div class="modal fade" id="DescModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-left:-313px; width:1165px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                 <h3 class="modal-title">Car Model Details</h3>

            </div>
            <div class="modal-body">

            <table id="example2" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
				<th>Color</th>
				<th>Manufacturing Year</th>
				<th>Registration Number</th>
				<th>Note</th>
				<th>Picture 1</th>
				<th>Picture 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="ex2">
			
        </tbody>
        
    </table>
            </div>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>