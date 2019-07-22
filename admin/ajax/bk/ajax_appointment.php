<?php
include_once('../includes/application_top.php');

if($_REQUEST['action']=="add_appointment")
{
	
}

else if($_REQUEST['action']=="view_appointment")
{
$id = $_POST['id'];

$query = "select doctor.f_name, doctor.l_name, patient.fname,  patient.lname, department.dept_name,appointment.app_id ,appointment.app_date, appointment.problem, appointment.status from doctor INNER JOIN appointment on doctor.doc_id=appointment.doc_id INNER JOIN patient ON patient.patient_id=appointment.patient_id INNER JOIN department on department.dept_id=appointment.department_id where appointment.app_id='".$id."'";

$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);

if($count > 0)
{
	while($row = mysqli_fetch_array($result))
	{
	?>
		<div class="form-group">				
			<input type="hidden"  id="id" name="id" value="<?php echo $row['app_id'];?>"></span>
		</div>

		<div class="form-group">		
			<label>Doctor Name</label>
			<span   id="doctor_name" name="doctor_name"><?php echo $row['f_name']." ".$row['l_name'];?></span>
		</div>
		<div class="form-group">		
			<label>Patient Name</label>
			<span   id="patient_name" name="patient_name"><?php echo $row['fname']." ".$row['lname'];?></span>
		</div>
		<div class="form-group">		
			<label>Department Name</label>
			<span   id="department_name" name="department_name"><?php echo $row['dept_name'];?></span>
		</div>
		<div class="form-group">		
			<label>Appointment Date</label>
			<span   id="appointment" name="appointment"><?php echo $row['app_date'];?></span>
		</div>
		<div class="form-group">		
			<label>Problem</label>
			<span   id="problem" name="problem"><?php echo $row['problem'];?></span>
		</div>		
	<?php 
		} 
}

	
}

else if($_REQUEST['action']=="update_appointment")
{
	
	$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
	$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
	$problem = mysqli_real_escape_string($conn , $_REQUEST['problem']);

	//print_r($_REQUEST);

	$query = "UPDATE ".App." SET app_date='".$date."',problem='".$problem."' WHERE app_id='".$id."'";
	if(mysqli_query($conn, $query))
	{
		echo "success";	
	}
	else
	{
		echo "error";
	}	
}

else if($_REQUEST['action']=="delete_appointment")
{
$id = $_POST['id'];

$query = "UPDATE ".App." SET isDeleted='1' WHERE app_id='".$id."'";

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