<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Sch." where schedule_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0){
?>

<?php 
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
		<input type="hidden"  id="id" name="id" <?php echo $row['schedule_id'];?>
	</div>
	<div class="form-group">		
		<label>Doctor Name:</label>
		<span  id="doctor_name" name="doctor_name"><?php echo $row['doctor_name'];?></span>
	</div>
	<div class="form-group">
		<label>Available Days:</label>
		<span  id="available_days" name="available_days"> <?php echo $row['available_days'];?></span>
	</div>
	<div class="form-group">
		<label>Start Time:</label>
		<span   id="start_time" name="start_time" ><?php echo $row['start_time'];?></span>
	</div>
	<div class="form-group">
		<label>Close Time:</label>
		<span   id="close_time" name="close_time" ><?php echo $row['close_time'];?></span>
	</div>
	<div class="form-group">
		<label>Per Patient Time:</label>
		<span name="per_patient_time" id="per_patient_time" ><?php echo $row['per_patient_time'];?></span>
	</div>
	<div class="form-group">
		<label>Serial Visibility:</label>
		<span  id="serial_visibility" name="serial_visibility"><?php echo $row['serial_visibility'];?></span>
	</div>
	
		<div class="form-check">
			<label>Status:</label>
			<label class="radio-inline">
			<span name="status" id="status">
			<?php
			if($row['status']=='1') 
			{
				echo "Active";
			}
			else 
			{
				echo "Deactive";
			}
			?>
			</span>
		</div>
	                                        
<?php 
} 
 }
 ?>
