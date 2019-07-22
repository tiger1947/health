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
				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form method="post" name="appointment_list" id="appointment_list">
							<div class="title">
							<h3>Manu</h3>
							<!--small>Monday to Friday 09.00am-06.00pm</small-->
							</div>														
							<!-- /row -->
							<ul class="treatments clearfix">
								<li><a href="#">Dashboard</a></li>
								<li><a href="#">Profile</a></li>
								<li><a href="#section_appointment">Appointment</a></li>
								<li><a href="#">Setting</a></li>								
							</ul>	
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
								<!--li><a href="#section_2">Reviews</a></li-->
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
	<!--Section for appointment-->
	<div id="section_appointment">	
		<div class="box_general_3">
			<div class="profile ">
				<div class="row">																								
						<div class="box_general_3 booking col-lg-12 ">						
							<div id="todays" name="todays">
								<div class="title">								
								<h3>Todays Appointment</h3>
								<?php 
									$appointment_data = $profile->getTodayAppointment($id);									
								?>
								</div>														
									<ul class="treatments clearfix">
										<li>
											<div class="col-md-8 col-md-4">
												<?php
												$i = 0;
												?>
												<table id="example" class="table table-bordered table-hover">
													<tr>
														<th>
															Patient Name
														</th>
														<th>
															Appointment Time
														</th>
													</tr>
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
															<?php echo $appointment_data[$i]['app_date'];?>
															</label>
														</td>
													</tr>
													<?php 
														}
													?>
												</table>													
											</div>		
										</li>
									</ul>
								<hr>
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
										<ul class="treatments clearfix">
											<li>
												<div class="col-md-8 col-md-4">
													<?php
													$i = 0;
													?>
													<table>
													<tr>
														<th>
															Patient Name
														</th>
														<th>
															Appointment Time
														</th>
													</tr>
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
															<?php echo $appointment_data_completed[$i]['app_date'];?>
															</label>
														</td>
													</tr>
													<?php 
												}
												?>
												</table>																			
												</div>		
											</li>
										</ul>
									<hr>
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
										<ul class="treatments clearfix">
											<li>
												<div class="col-md-8 col-md-4">
													<?php
													$i = 0;
													?>
													<table>
													<tr>
														<th>
															Patient Name
														</th>
														<th>
															Appointment Time
														</th>
													</tr>
													<?php
														for($i=0;$i<count($appointment_data_pending);$i++)
														{
													?>
													<tr>
														<td>												
													<label>
														<?php echo $appointment_data_pending[$i]['fullname'];?>
													</label>										
														</td>
														<td>
															<label>
															<?php echo $appointment_data_pending[$i]['app_date'];?>
															</label>
														</td>
													</tr>
													<?php 
												}
												?>
												</table>													
												</div>		
											</li>
										</ul>
									<hr>
									<div>
										<input onclick="todays_appointment();" class="btn_1" type="button" value="Todays">
										<input onclick="completed_appointment();" class="btn_1" type="button" value="Completed" style="float:right;">
									</div>
								</div>							
						</div>
				
				</div>
			</div>
		</div>	
	</div>



					<div id="section_2">
						<div class="box_general_3">
							<div class="reviews-container">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong>4.7</strong>
											<div class="rating">
												<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
											</div>
											<small>Based on 4 reviews</small>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->

								<hr>

								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar1.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Admin – April 03, 2016:
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- End review-box -->

								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar2.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Ahsan – April 01, 2016
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- End review-box -->

								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar3.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Sara – March 31, 2016
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- End review-box -->
							</div>
							<!-- End review-container -->
							<hr>
							<div class="text-right"><a href="submit-review.html" class="btn_1">Submit review</a></div>
						</div>
					</div>
					<!-- /section_2 -->
				</div>
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
    $('#todays').DataTable();
	$("#example_wrapper").css("width","100%");
});
</script>