<?php 
include_once('includes/application_top.php');
include_once('class/profile.php');
include_once('header.php'); 
$id = $_SESSION['user_id'];
$profile  = new Profile();
$result = $profile->getData($id);

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
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>								
								<input type="button" class="btn_1" value="Update Profile" onclick="window.location.href = 'form.php';" style="float:right;">								
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="img/doctor_listing_1.jpg" alt="" class="img-fluid">
										</figure>
									</div>										
									<div class="col-lg-7 col-md-8">
										<small><?php echo $result['specialization'];?></small>
										<h1><?php echo $result['fullname'];?></h1>										
										<ul class="contacts">
											<li>
												<h4>Address</h4>
												<h6><?php echo $result['clinic_name']."</br>";?></h6>
												<?php echo $result['clinic_address_line_one'].",";?>
												<?php echo $result['clinic_locality'];?>
												<?php echo $result['clinic_city']." ".$result['clinic_pincode']."</br>";?>
												<?php echo $result['clinic_state']."</br>";?>												
												<a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>View on map</strong></a>
											</li>
											<li>
												<h6>Phone</h6> <?php echo $result['mobile'];?>
											</li>
										</ul>
									</div>
								</div>
							</div>							
							<hr>							
							<!-- /profile -->
							<div class="indent_title_in">
							<!--i class="icon-edit-3">Edit Profile</i-->
								<i class="pe-7s-user"></i>
								<h3>Professional statement</h3>								
									<p>
										<li><?php echo $result['year_of_experience']." "."Years of experiance in Medical Field as Dentist.";?></li>
									</p>									
							</div>							
							<div class="wrapper_indent">
								<p><?php echo $result['professional_statement'];?></p>
								<h6>Specializations</h6>
								<div class="row">
									<div class="col-lg-6">
										<ul class="bullets">
											<li><?php echo $result['specialization'];?></li>
											<!--li>Addiction Psychiatry</li>
											<li>Adolescent Medicine</li>
											<li>Cardiothoracic Radiology </li-->
										</ul>
									</div>
									<div class="col-lg-6">
										<ul class="bullets">
											<li><?php echo $result['specialization'];?></li>
											<!--li>Addiction Psychiatry</li>
											<li>Adolescent Medicine</li>
											<li>Cardiothoracic Radiology </li-->
										</ul>
									</div>
								</div>
								<!-- /row-->
							</div>
							<!-- /wrapper indent -->
							<hr>
							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Education</h3>
								<p><?php echo $result['qualification'];?></p>
							</div>
							<div class="wrapper_indent">
								<p><?php echo $result['college'];?></p>
								<h6>Curriculum</h6>
								<ul class="list_edu">
									<li><strong>New York Medical College</strong> - Doctor of Medicine</li>
									<li><strong>Montefiore Medical Center</strong> - Residency in Internal Medicine</li>
									<li><strong>New York Medical College</strong> - Master Internal Medicine</li>
								</ul>
							</div>
							<!--  End wrapper indent -->	
						</div>
						<!-- /section_1 -->
					</div>					
					<!-- /box_general -->					
					
							

				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
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
	$("#example_wrapper").css("width","100%");
});
</script>

<script>
$(document).ready(function() {
    $('#example1').DataTable();
	$("#example_wrapper").css("width","100%");
});
</script>

<script>
$(document).ready(function() {
    $('#example2').DataTable();
	$("#example_wrapper").css("width","100%");
});
</script>