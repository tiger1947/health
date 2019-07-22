<!-- Main content -->
<section class="content">					
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-bd ">
				<div class="panel-heading">
					<div class="btn-group"> 
						<a class="btn btn-success" href="add-appointment.php"> <i class="fa fa-plus"></i>  Add Appionment</a>  
					</div>
				</div>
		  <div class="panel-body">                                    
			<div class="table-responsive">
				<table id="example" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Serial No</th>
							<th>Doctor Name</th>
							<th>Patient Name</th>							
							<th>appointment Date</th>							
							<th>Status</th>										
							<th>Update</th>										
						</tr>
					</thead>
					<tbody>
					<?php 
						$j = 1;
						$app_records = $app->getAllAppointments();				
						$num = count($app_records);
						if($num > 0)
						{
							for($i=0;$i<$num;$i++)
							{								
					?>									
						<tr>
							<td><?php echo $j++;?></td>
							<td><?php echo $app_records[$i]['f_name']." ".$app_records[$i]['l_name'];?></td>
							<td><?php echo $app_records[$i]['fname']." ".$app_records[$i]['lname'];?></td>
							<td><?php echo $app_records[$i]['app_date'];?></td>							
							<td>
								<select onchange="statuschange('<?php echo $app_records[$i]['app_id'];?>',this.value);">										
									<option value="0" <?php if($app_records[$i]['isCompleted']=='0'){ echo "selected"; }?>>Cancel</option>
									<option value="1" <?php if($app_records[$i]['isCompleted']=='1'){ echo "selected"; }?>>Completed</option>
									<option value="2" <?php if($app_records[$i]['isCompleted']=='2'){ echo "selected"; }?>>Pending</option>								
								</select>
							</td>
						    <td>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#display" onclick="view('<?php echo $app_records[$i]['app_id']; ?>');"><i class="fa fa-eye" ></i></button>
								<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $app_records[$i]['app_id']; ?>');"><i class="fa fa-pencil"></i>
								</button>
								<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $app_records[$i]['app_id']; ?>');"><i class="fa fa-trash-o"></i>
							</button>
							</td>
						</tr>
						<?php 					
							}
						}
						?>
					</tbody>
				</table>
</div>                
</div>
</div>
</div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php include_once('footer.php');?>



<div id="ordine" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Update table</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="profile_data" id="profile_data"></form>	
			</div>
		</div>
	</div>
</div>



<!--pop up model for doctor list for display purpose only -->
<div id="display" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
				<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Profile Data</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="profile" id="profile"></form>	
			</div>
		</div>
	</div>
</div>


<script src="js/appointment-list.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
