<?php 
include_once('header.php');
$id = $_SESSION['admin_id'];
$query = "SELECT first_name,last_name,mobile,profile FROM `admin` where admin_id='".$id."'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

?>

    <!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- Form controls -->
			<div class="col-sm-12">
				<div class="panel panel-bd">
					<div class="panel-heading">
						<div class="btn-group"> 
						  Admin Profile
					  </div>
				  </div>
				  <div class="panel-body">
					<form class="form-horizontal col-md-12" action="admin_update.php" name="upload_excel" enctype="multipart/form-data">
					<!-- File Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">First Name</label>
							<div class="col-md-4 control-label">
								<?php echo $data['first_name'];?>
							</div>
							</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">Last Name</label>
							<div class="col-md-4 control-label">
								<?php echo $data['last_name'];?>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">Mobile</label>
							<div class="col-md-4 control-label">
								<?php echo $data['mobile'];?>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">Profile Picture</label>
							<div class="col-md-4 control-label">
								<img src="<?php echo base_url_image.$data['profile'];?>" style="width:50px;height:50px">
							</div>							
						</div>						
						<div class="col-sm-12 reset-button">						 
						<input data-toggle="modal" data-target="#display" type="button" name="submit" class="btn btn-primary" value="update"/>
						</div>						
					</form>
			 </div>
		 </div>
	 </div>
	</div>
</section> <!-- /.content -->
		 
		 
<!--pop up model for doctor list for display purpose only -->
<div id="display" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
				<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Admin Profile</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="profile" id="profile">
					<div class="form-group">				
					<input type="hidden" id="isImageChange" name="isImageChange" value="0">
					</div>
					<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $data['first_name'];?>" required>
					</div>
					<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $data['last_name'];?>" required>
					</div>
					<div class="form-group">
					<label>Mobile</label>
					<input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $data['mobile'];?>" required>
					</div>
					<div class="form-group">
					<label>Profile Picture</label>
					<input type="file" id="profile" name="profile"/>
					<img src="<?php echo base_url_image.$data['profile'];?>" style="width:50px;height:50px">
					</div>
					<div class="form-group">
					<input onclick="viewProfile();" data-toggle="modal" data-target="#display" type="button" name="submit" class="btn btn-primary" value="submit"/>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>		 


<?php
include_once('footer.php');
?>
		 
<script src="js/index.js" type="text/javascript"></script>		 

<script>
//for image checking update or not
$(document).ready(function(){
 $('#profile').change(function(){ 
	//alert(this.value);
	$('#isImageChange').val('1');
 })
});
</script>		 
