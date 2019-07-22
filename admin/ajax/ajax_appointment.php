<?php
include_once('../includes/application_top.php');
include_once('../class/appointment.php');

$app = new Appointment();



if($_REQUEST['action']=="add_appointment")
{
	
	$data = Array(
				'doc_id' => $_REQUEST['doctor'],
				'patient_id' => $_REQUEST['patient'],
				'department_id' => $_REQUEST['department'],
				'app_date' => $_REQUEST['date'],
				'problem' => $_REQUEST['problem'],
				'created_date' => date('Y-m-d h:i:s')
				);
	$result = $app->addAppointment($data);

		if($result)
		{
			echo "success";
			die;
		}
		else
		{
			echo "error";
			die;
		}

}

else if($_REQUEST['action']=="view_appointment")
{
	$id = $_POST['id'];

	$result = $app->getAppointment($id);
	$num = count($result);
	
	if($num > 0)
	{	
		?>
			<div class="form-group">				
				<input type="hidden"  id="id" name="id" value="<?php echo $result['app_id'];?>"></span>
			</div>

			<div class="form-group">		
				<label>Doctor Name</label>
				<span   id="doctor_name" name="doctor_name"><?php echo $result['f_name']." ".$result['l_name'];?></span>
			</div>
			<div class="form-group">		
				<label>Patient Name</label>
				<span   id="patient_name" name="patient_name"><?php echo $result['fname']." ".$result['lname'];?></span>
			</div>
			<div class="form-group">		
				<label>Department Name</label>
				<span   id="department_name" name="department_name"><?php echo $result['dept_name'];?></span>
			</div>
			<div class="form-group">		
				<label>Appointment Date</label>
				<span   id="appointment" name="appointment"><?php echo $result['app_date'];?></span>
			</div>
			<div class="form-group">		
				<label>Problem</label>
				<span   id="problem" name="problem"><?php echo $result['problem'];?></span>
			</div>
			<div class="form-group">		
				<label>Appointment Status</label>
				<?php 
				if($result['isCompleted']=='0')
				{
					?><span><?php echo "Cancel";?></span>
				<?php
				}
				else if($result['isCompleted']=='1')
				{
					?><span><?php echo "Completed";?></span>
				<?php
				}
				else
				{
					?><span><?php echo "Pending";?></span>
				<?php
				}
				?>				
			</div>			
		<?php 	
	}	
}

else if($_REQUEST['action']=="update_appointment")
{	
	 $id = $_REQUEST['id'];
	// die;
	$data = Array(	
		'app_date' => $_REQUEST['date'],
		'problem' => $_REQUEST['problem']
		);

	$result = $app->updateAppointment($id,$data);
	
	if($result)
	{
		echo "success";	
		die;
	}
	else
	{
		echo "error";
		die;
	}	
}

else if($_REQUEST['action']=="delete_appointment")
{
	$id = $_POST['id'];
	$data = array('isDeleted' => '1');
	$result = $app->deleteAppointment($id,$data);
	
	if($result)
	{
		echo "success";
		die;
	}
	else
	{
		echo "error";
		die;
	}
}

else if($_REQUEST['action']=="change_status")
{
	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	
	$data = array('isCompleted' => $status);
	
	
	$result = $app->changeStatus($id,$data);
		
	if($result)
	{
		echo "success";
		die;
	}
	else
	{
		echo "error";
		die;
	}
	
}

else if($_REQUEST['action']=="edit_appointment")
{
	$id = $_POST['id'];
	
	$result = $app->getAppointment($id);
	
	$num = count($result);
	if($num > 0)
	{	
	?>
		<div class="form-group">	
			<div class="form-group">				
				<input type="hidden" id="id" name="id" value="<?php echo $result['app_id'];?>" required>
			</div>
			<div class="form-group">		
					<label>Doctor Name</label>
					<span><?php echo $result['f_name']." ".$result['l_name'];?></span>
				</div>
				<div class="form-group">		
					<label>Patient Name</label>
					<span><?php echo $result['fname']." ".$result['lname'];?></span>
				</div>
				<div class="form-group">		
					<label>Department Name</label>
					<span><?php echo $result['dept_name'];?></span>
				</div>

			<div class="form-group">                                        
				<label>Appointment date</label>
				<input type="text" name="date" id="date" class="form-control glyphicon glyphicon-calendar" value="<?php echo $result['app_date'];?>"/>
			</div>

			<div class="form-group">
				<label>Problem</label><br>
				<textarea class="form-control" rows="6" name="problem" id="problem" placeholder="problem"><?php echo $result['problem'];?>
				</textarea>
			</div>					
		<?php 
		}	
		?>
	  <tr>
		<td colspan="2">
			<input type="button" onclick="updateForm();"  name="submit" class="btn btn-primary" value="save"/>
		</td>
	  </tr>
<?php
}
?>






<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

<script>
 $(function () {
   var bindDatePicker = function() {
		$("#date").datetimepicker({
        format:'YYYY-MM-DD hh:ss a',
			icons: {
				//time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('MM-DD-YYYY');
			}
			$(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
</script>