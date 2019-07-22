<!-- Main content -->
	<section class="content">
		<div class="data">
			<div class="col-sm-12">
				<div class="panel panel-bd ">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="add-doctor.php"> <i class="fa fa-plus"></i> Add Doctor
							</a>  
						</div>
						<div class="btn-group"> 
							<a class="btn btn-success" href="doctor_import_export.php"> <i class="fa fa-file-excel-o"></i>Import And Export Excel
							</a>  
						</div>
					</div>
					<div class="panel-body">
						 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>First Name</th>
						<th>last Name</th>						
						<th>Email</th>
						<th>Mobile No</th>																	
						<th>Update</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php 
				$j = 1;
				if($num > 0)
				{
					for($i=0;$i<$num;$i++)
					{
						?>
						<tr>
						   <td>
							   <label><?php echo $j++;?></label>   
						   </td>
						   <td><?php echo $doctors[$i]['f_name'];?></td>
						   <td><?php echo $doctors[$i]['l_name'];?></td>						   
						   <td><?php echo $doctors[$i]['email'];?></td>
						   <td><?php echo $doctors[$i]['mobile'];?></td>						   
							<td>
								<?php 
									if($doctors[$i]['status']==1)
									{
										?>
										<button type="button" class="btn btn-danger btn-xs" style="padding-right: 20px;" onclick="activeDeactive(<?php echo $doctors[$i]['doc_id'];?>,<?php echo $doctors[$i]['status'];?>);">Active</button>
									<?php
									}
									else
									{
									?>
										<button type="button" class="btn btn-success btn-xs" onclick="activeDeactive(<?php echo $doctors[$i]['doc_id'];?>,<?php echo $doctors[$i]['status'];?>);">Deactive</button>
									<?php
									}
								?>
								
							</td>
						   <td>						  
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#display" onclick="view('<?php echo $doctors[$i]['doc_id']; ?>');"><i class="fa fa-eye" ></i></button>
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $doctors[$i]['doc_id']; ?>');"><i class="fa fa-pencil"></i>
							</button>
							<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $doctors[$i]['doc_id']; ?>');"><i class="fa fa-trash-o"></i>
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
</section> 
<!-- /.content -->

<?php include_once('footer.php'); ?>

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

<script src="js/doctor-list.js" type="text/javascript"></script>