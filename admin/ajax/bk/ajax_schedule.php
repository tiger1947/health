<?php
include_once('../includes/application_top.php');
if($_REQUEST['action']=="add_schedule")
{
	$name = mysqli_real_escape_string($conn, $_REQUEST['doctor']);
	$days = mysqli_real_escape_string($conn, $_REQUEST['available']);
	$start = mysqli_real_escape_string($conn, $_REQUEST['start']);
	$stop = mysqli_real_escape_string($conn, $_REQUEST['stop']);
	$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
	$serial = mysqli_real_escape_string($conn, $_REQUEST['visibility']);
	$date = date('Y-m-d h:i:s');



	$query = "INSERT INTO ".Sch."(`doctor_name`, `available_days`, `start_time`, `close_time`, `per_patient_time`, `serial_visibility`,`created_date`) VALUES ('".$name."','".$days."','".$start."','".$stop."','".$time."','".$serial."','".$date."')";
	if(mysqli_query($conn, $query))
	{
		echo "success";	
	}
	else
	{
		echo "error";
	}
}
else if($_REQUEST['action']=="edit_schedule")
{
	
	$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
	$available_days = mysqli_real_escape_string($conn, $_REQUEST['available_days']);
	$start_time = mysqli_real_escape_string($conn, $_REQUEST['start_time']);
	$close_time = mysqli_real_escape_string($conn, $_REQUEST['close_time']);
	$per_patient_time = mysqli_real_escape_string($conn, $_REQUEST['per_patient_time']);
	$serial_visibility = mysqli_real_escape_string($conn, $_REQUEST['serial_visibility']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);

	 $query = "UPDATE `schedule` SET `available_days`='".$available_days."',`start_time`='".$start_time."',`close_time`='".$close_time."',`per_patient_time`='".$per_patient_time."',`serial_visibility`='".$serial_visibility."',`status`='".$status."' WHERE `schedule_id`='".$id."'";

	if(mysqli_query($conn, $query))
	{
		echo "success";
	}
	else
	{
		echo "error occured";
	}	
}

else if($_REQUEST['action']=="view_schedule")
{
$id = $_POST['id'];
$query = "select * from ".Sch." where schedule_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0)
{
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
	<?php 
		} 
 }
	
}

else if($_REQUEST['action']=="delete_schedule")
{
	$id = $_POST['id'];
	$query = "UPDATE ".Sch." SET isDeleted='1' WHERE schedule_id='".$id."'";
	if(mysqli_query($conn, $query))
	{
		echo "success";
	}
		
}

else if($_REQUEST['action']=="activeDeactive_schedule")
{
	
$id = mysqli_real_escape_string($conn,$_REQUEST['id']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
//echo $status;

if($status=='1')
	$status = '0';
else
	$status = '1';

$query = "UPDATE schedule SET status='".$status."' where schedule_id='".$id."'";
if(mysqli_query($conn, $query))
{
	echo "success";
}
else
{
	echo "error";
}
}
?>