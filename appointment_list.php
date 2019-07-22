<?php
include_once('header.php');
include_once('class/Profile.php');
$id = $_SESSION['user_id'];
$profile = new Profile();
?>

		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
			<div class="row">
				<?php include_once('sidebar_doctor.php'); ?>
				<div class="col-xl-9 col-lg-9">

<div id="section_1">
	<div class="box_general_3 booking" name="section_appointment" id="section_appointment">						
		<div id="todays" name="todays" >
			<div class="title">								
			<h3>Todays Appointment</h3>
			<?php 
				$appointment_data = $profile->getTodayAppointment($id);									
			?>
			</div class="col-lg-12">														
				<ul class="clearfix">
					<li>
						<div>
							<?php
								$i = 0;
							?>
							<table id="example" name="example" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>
											Patient Name
										</th>
										<th>
											Appointment Time
										</th>
										<th>														
											Status
										</th>														
										<th>
											Action
										</th>
									</tr>
								</thead>
								<?php
									for($i=0;$i<count($appointment_data);$i++)
									{
								?>
								<tr>
									<td>												
									<label>
										<?php echo $appointment_data[$i]['fullname'];?>
									</label>										
									</td>
									<td>
										<label>
										<?php 
											$appointment_time = explode(" ", $appointment_data[$i]['app_date']);
										echo $appointment_time[1];
										?>
										</label>
									</td>
									<td>
										<?php 
											if($appointment_data[$i]['isCompleted']=='0')
											{
												echo "Pending";
											}
											else
											{
												echo "Completed";
											}										
										?>
									</td>
									<td>
										<button type="button" class="btn btn-success btn-xs" onclick="activeDeactive(<?php echo $appointment_data[$i]['user_id'];?>,<?php echo $appointment_data[$i]['status'];?>);">Completed</button>
										
										<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#display" onclick="viewPatient(<?php echo $appointment_data[$i]['user_id'];?>);">view</button>
									</td>													
								</tr>
								<?php 
									}
								?>
							</table>
						</div>		
					</li>
				</ul>
			<div>
				<input onclick="completed_appointment();" class="btn_1" type="button" value="Completed">
				<input onclick="pending_appointment();" class="btn_1" type="button" value="Pending" style="float:right;">
			</div>
		</div>
		
		
		
			<!--section for completed appointment-->
			<div id="completed" name="completed" style="display:none;">
				<div class="title" >
				<h3>Completed Appointment</h3>
				<?php
					$appointment_data_completed = $profile->getCompletedAppointment($id);
				?>
				</div>														
					<ul class="clearfix">
						<li>
							<div class="col-lg-12">
								<?php
								$i = 0;
								?>
								<table id="example1" name="example1" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										Patient Name
									</th>
									<th>
										Appointment Time
									</th>
									<th>														
										Status
									</th>														
									<th>
										Action
									</th>
								</tr>
								</thead>
								<?php
									for($i=0;$i<count($appointment_data_completed);$i++)
									{
								?>
								<tr>
									<td>												
								<label>
									<?php echo $appointment_data_completed[$i]['fullname'];?>
								</label>										
									</td>
									<td>
										<label>
										<?php 
											echo $appointment_data_completed[$i]['app_date'];
										?>
										</label>
									</td>
									<td>
									<?php echo "Complete";?>
									</td>													
									<td>															
										<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#display" onclick="viewPatient(<?php echo $appointment_data_completed[$i]['user_id'];?>);">view</button>
									</td>
									</tr>
								<?php 
							}
							?>
							</table>																			
							</div>		
						</li>
					</ul>			
				<div>
					<input onclick="todays_appointment();" class="btn_1" type="button" value="Todays">
					<input onclick="pending_appointment();" class="btn_1" type="button" value="Pending" style="float:right;">
				</div>
			</div>
			
			
			
			
			<!--section for pending appointment-->
			<div id="pending" name="pending" style="display:none;">
				<div class="title" >
				<h3>Pending Appointment</h3>
				<?php
					$appointment_data_pending = $profile->getPendingAppointment($id);	
				?>
				</div>														
					<ul class="clearfix">
						<li>
							<div class="col-lg-12">
								<?php
								$i = 0;
								?>
								<table id="example2" name="example2" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										Patient Name
									</th>
									<th>
										Appointment Time
									</th>
									<th>														
										Status
									</th>														
									<th>
										Action
									</th>
								</tr>
								</thead>
								</tr>
								<?php
									for($i=0;$i<count($appointment_data_pending);$i++)
									{
								?>
								<tr>
									<td>												
										<label>
											<?php 
												echo $appointment_data_pending[$i]['fullname'];
											?>
										</label>										
									</td>
									<td>												
										<label>
											<?php 
												echo $appointment_data_pending[$i]['app_date'];										
												?>
										</label>										
									</td>
									<td>
									<?php 
										if($appointment_data_pending[$i]['isCompleted']==0)
										{
											echo "Pending";
										} 
										else
										{
											echo "Completed";
										}										
									?>
									</td>													
									<td>
										<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#display" onclick="viewPatient(<?php echo $appointment_data_pending[$i]['user_id'];?>);">view</button>
									</td>
								</tr>
								<?php 
									}
								?>
							</table>													
							</div>		
						</li>
					</ul>
					<div>
						<input onclick="todays_appointment();" class="btn_1" type="button" value="Todays">
						<input onclick="completed_appointment();" class="btn_1" type="button" value="Completed" style="float:right;">
					</div>
			</div>							
			</div>
				</div>
					</div>					
					<!-- /box_general -->					
	
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	<?php include_once('footer.php'); ?>
	
	
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


	
<script src="js/custom/book_appointment.js" type="text/javascript"></script>



<!--pop up model for doctor list for display purpose only -->
<div id="display" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content ">
			<div class="modal-header">			
				<h4 class="modal-title">Patient Data</h4>
			</div>
			<div class="modal-body">
				<div id="patient_profile"></div>	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>






<script>
 $(function () {
   var bindDatePicker = function() {
		$("#date").datetimepicker({
        format:'YYYY-MM-DD hh:ss a',
			icons: {
				time: "fa fa-clock-o",
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

<script>
$(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
    $('#example2').DataTable();
	$("#example_wrapper").css("width","100%");
});
</script>