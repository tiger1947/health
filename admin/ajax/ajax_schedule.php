<?php
include_once('../includes/application_top.php');
include_once('../class/schedule.php');

$sch = new Schedule();

if($_REQUEST['action']=="add_schedule")
{
	$data = Array(
	'doctor_name' =>  $_REQUEST['doctor'],
	'available_days' =>  $_REQUEST['available'],
	'start_time' => $_REQUEST['start'],
	'close_time' =>  $_REQUEST['stop'],
	'per_patient_time' =>  $_REQUEST['time'],
	'serial_visibility' => $_REQUEST['visibility']
	);

	$result = $sch->addSchedule($data);

	if ($result)
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
	$id = $_POST['id'];
	$row = $sch->getSchedule($id);
	
		?>
			<div class="form-group">				
				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['schedule_id'];?>" required>
			</div>
			<div class="form-group">		
				<label>Doctor Name</label>
				<input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $row['doctor_name'];?>" required>
			</div>
			
			<div class="form-group">
				<label>Available Days</label>
				<select class="form-control" name="available_days" id="available_days">
					<option <?php if($row['available_days']=='sunday') { ?> selected <?php } ?>>sunday</option>
					<option <?php if($row['available_days']=='monday') { ?> selected <?php } ?>>monday</option>
					<option <?php if($row['available_days']=='tuesday') { ?> selected <?php } ?> >tuesday</option>
					<option <?php if($row['available_days']=='wednesday') { ?> selected <?php } ?>>wednesday</option>
					<option <?php if($row['available_days']=='thursday') { ?> selected <?php } ?>>thursday</option>
					<option <?php if($row['available_days']=='friday') { ?> selected <?php } ?>>friday</option>
					<option <?php if($row['available_days']=='saturday') { ?> selected <?php } ?>>saturday</option>			
				</select>
			</div>			
			<div class="form-group">
				<label>Start Time</label>
				<input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $row['start_time'];?>" required>
			</div>
			<div class="form-group">
				<label>Close Time</label>
				<input type="time" class="form-control" id="close_time" name="close_time" value="<?php echo $row['close_time'];?>" required>
			</div>

			<div class="form-group">
				<label>Per Patient Time</label>
				<input type="text" class="form-control" id="per_patient_time" name="per_patient_time" value="<?php echo $row['per_patient_time'];?>" required>
			</div>
			<div class="form-group">
				<label>Serial Visibility</label>
				<select class="form-control" id="serial_visibility" name="serial_visibility">
					<option <?php if($row['serial_visibility']=='sequential') { ?> selected <?php } ?>>sequential</option>
					<option <?php if($row['serial_visibility']=='timestamp') { ?> selected <?php } ?>>timestamp</option>
				</select>
			</div>
			<div class="form-check">
				<label>Status</label><br>
				<label class="radio-inline">
				<input type="radio" name="status" id="status" value="1" <?php if($row['status']=='1') { ?> checked <?php } ?>>Active</label>
				<label class="radio-inline">
				<input type="radio" name="status" id="status" value="0"<?php if($row['status']=='0') { ?> checked <?php } ?>>Inactive</label>
			</div>  		
		  <tr>
			<td colspan="2">
				<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
			</td>
		  </tr>
<?php
}
else if($_REQUEST['action']=="delete_schedule")
{
	$id = $_POST['id'];
	$data = array('isDeleted' => '1');			
	$result = $sch->deleteSchedule($id,$data);
	
	if($result)
	{
		echo "success";
	}	
	
}	
else if($_REQUEST['action']=="view_schedule")
{
	$id = $_POST['id'];
	$row = $sch->getSchedule($id);
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

else if($_REQUEST['action']=="update_schedule")
{
	$id = $_REQUEST['id'] ;
	$data = Array(
	'available_days' => $_REQUEST['available_days'],
	'start_time' => $_REQUEST['start_time'],
	'close_time' => $_REQUEST['close_time'],
	'per_patient_time' => $_REQUEST['per_patient_time'],
	'serial_visibility' =>  $_REQUEST['serial_visibility'],
	'status' => $_REQUEST['status']
	);
	
	$schedule_update_result = $sch->updateSchedule($id, $data);

		if($schedule_update_result)
		{
			
			echo "success";
		}
		else
		{
			echo "error occured";
		}
	
}
?>