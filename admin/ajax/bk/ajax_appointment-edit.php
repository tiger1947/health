<?php 
include('../includes/application_top.php');
$id = $_POST['id'];
$query = "select doctor.f_name, doctor.l_name, patient.fname,  patient.lname, department.dept_name,appointment.app_id ,appointment.app_date, appointment.problem, appointment.status from doctor INNER JOIN appointment on doctor.doc_id=appointment.doc_id INNER JOIN patient ON patient.patient_id=appointment.patient_id INNER JOIN department on department.dept_id=appointment.department_id where appointment.app_id='".$id."'";

$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);

if($count > 0)
{
$row = mysqli_fetch_array($result);
?>
	<div class="form-group">	
		<div class="form-group">				
			<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['app_id'];?>" required>
		</div>
		<div class="form-group">		
				<label>Doctor Name</label>
				<span><?php echo $row['f_name']." ".$row['l_name'];?></span>
			</div>
			<div class="form-group">		
				<label>Patient Name</label>
				<span><?php echo $row['fname']." ".$row['lname'];?></span>
			</div>
			<div class="form-group">		
				<label>Department Name</label>
				<span><?php echo $row['dept_name'];?></span>
			</div>

		<div class="form-group">                                        
			<label>Appionment date</label>
			<input type="datetime-local" name="date" id="date" class="form-control" />
		</div>

		<div class="form-group">
			<label>Problem</label><br>
			<textarea class="form-control" rows="6" name="problem" id="problem" placeholder="problem"><?php echo $row['problem'];?>
			</textarea>
		</div>								 
	<?php 
	}	
	?>
  <tr>
    <td colspan="2">
		<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
