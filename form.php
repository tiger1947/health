<?php 
include_once('header.php'); 
include_once('class/profile.php');
$profile = new Profile();
$id = $_SESSION['user_id'];
// $id = 46;
$result = $profile->getDetail($id);
$data = $profile->getInformation($id);

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
								<li><a href="#section_1" class="active">Profile</a></li>
								<li><a href="#section_2">Reviews</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					
					<div class="box_general_3">
						<div id="section_1">							
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								<h3>Personal Information</h3>
							</div>
							<div class="wrapper_indent">
								<form method="post" id="doctor_personal" name="doctor_personal">								
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Full Name" value="<?php echo $data[0]['fullname'];?>" name="fullname" id="fullname" readonly="readonly">
										</div>										
									</div>
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" value="<?php echo $data[0]['mobile'];?>" readonly="readonly" placeholder="<?php echo $data[0]['mobile'];?>" name="mobile" id="mobile">
										</div>
										<!--div id="mobile_error" style="color:#FF0000"></div-->
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email" value="<?php echo $data[0]['email'];?>" name="email" id="email">
										</div>
										<div id="email_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">								
									<div class="col-md-6">									
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Date Of Birth" value="<?php echo $data[0]['dob'];?>" name="dob" id="dob">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar">
												</span>
											</span>
										</div>
									
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="blood_group" id="blood_group">
												<option value="">Select</option>
												<option <?php if($data[0]['blood_group']=='A+') { ?> selected <?php } ?>>A+</option>
												<option <?php if($data[0]['blood_group']=='AB+') { ?> selected <?php } ?>>AB+</option>
												<option <?php if($data[0]['blood_group']=='O+') { ?> selected <?php } ?> >O+</option>
												<option <?php if($data[0]['blood_group']=='AB-') { ?> selected <?php } ?>>AB-</option>
												<option <?php if($data[0]['blood_group']=='B+') { ?> selected <?php } ?>>B+</option>
												<option <?php if($data[0]['blood_group']=='A-') { ?> selected <?php } ?>>A-</option>
												<option <?php if($data[0]['blood_group']=='B-') { ?> selected <?php } ?>>B-</option>
												<option <?php if($data[0]['blood_group']=='O-') { ?> selected <?php } ?>>O-</option>
											</select>											
										</div>
									</div>
								</div>							
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">											
											<input type="radio" name="gender" id="gender" value="1"<?php if($data[0]['sex']==1){?> checked<?php }?>>Male</label>
											<input type="radio" name="gender" id="gender" value="0"<?php if($data[0]['sex']==0){?> checked<?php }?>>Female</label>
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Address Line 1" value="<?php echo $data[0]['address_line_one'];?>" name="address" id="address">
										</div>
									
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="State" value="<?php echo $data[0]['state'];?>" name="state" id="state">
										</div>
										<div id="address_state_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter City" value="<?php echo $data[0]['city'];?>" name="city" id="city">
										</div>
									
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Locality" value="<?php echo $data[0]['locality'];?>" name="locality" id="locality">
										</div>
										<div id="address_locality_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="6" placeholder="Enter Pincode" value="<?php echo $data[0]['pincode'];?>" name="pincode" id="pincode">
										</div>
										
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="button" class="btn_1" value="Next" onclick="validateDoctorPersonalForm();">
											<input type="button" class="btn_1" value="Save" onclick="validateAndSave();">
										</div>
									</div>									
								</div>	
							</form>
							</div>
							
						

							
							<!-- /wrapper indent -->
							<div class="span" id="education" name="education" style="display:none;">
							<hr>
							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Education Details</h3>
							</div>
							<div class="wrapper_indent">
								<form method="post" id="doctor_educational" name="doctor_educational">								
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Qualification" name="qualification" id="qualification" value="<?php echo $data[0]['qualification']?>">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter College/University" name="college" id="college" value="<?php echo $data[0]['college']?>">
										</div>
									</div>									
								</div>								
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Passout Year" name="passout" id="passout" value="<?php echo $data[0]['passout_year']?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Years of Experiance" name="year_of_experience" id="year_of_experience" value="<?php echo $data[0]['year_of_experience']?>">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<h6>Please Enter Your Specialization</h6>
											<textarea class="form-control" id="specialization" name="specialization" rows="3"><?php echo $data[0]['specialization'];?></textarea>
										</div>
									</div>									
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">											
											<input type="button" class="btn_1" value="Previous" onclick="showPersonal();">
											<input type="button" class="btn_1" value="Save" onclick="saveEducational();">
											<input type="button" class="btn_1" value="Next" onclick="validateDoctorEducational();">
										</div>
									</div>									
								</div>
							</form>
							</div>
							</div>							
							<!--  End wrapper indent -->
							
							<!-- /wrapper indent -->
							<div class="span" id="clinic" name="clinic" style="display:none;">
							<hr>
							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Clinic Details</h3>
							</div>
							<div class="wrapper_indent">
								<form method="post" id="clinic_info" name="clinic_info">								
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Clinic Name" name="clinic_name" id="clinic_name" value="<?php echo $data[0]['clinic_name'];?>">
										</div>
										<div id="clinic_name_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row-->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter Clinic Address Line 1" name="clinic_address" id="clinic_address" value="<?php echo $data[0]['clinic_address_line_one'];?>">
										</div>
										<div id="clinic_address_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter State" name="clinic_state" id="clinic_state" value="<?php echo $data[0]['clinic_state'];?>">
										</div>
										<div id="address_state_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter City" name="clinic_city" id="clinic_city" value="<?php echo $data[0]['clinic_city'];?>">
										</div>
										<div id="clinic_city_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter Locality" name="clinic_locality" id="clinic_locality" value="<?php echo $data[0]['clinic_locality'];?>">
										</div>
										<div id="clinic_locality_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Enter Pincode" name="clinic_pincode" id="clinic_pincode" value="<?php echo $data[0]['clinic_pincode'];?>">
										</div>
										<div id="clinic_pincode_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">											
											<input type="button" class="btn_1" value="Previous" onclick="showEducation();">
											<input type="button" class="btn_1" value="Save" onclick="doctor_clinic_info();">
											<input type="button" class="btn_1" value="Next" onclick="validateClinic();">
										</div>
									</div>									
								</div>								
							</form>
							</div>
							</div>
							<!--  End wrapper indent -->
							
							
							<!-- /wrapper indent -->
							<div class="span" id="professional" name="professional" style="display:none;">
							<hr>
							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Professional Details</h3>
							</div>
							<div class="wrapper_indent">
								<form method="post" id="professional_details" name="professional_details">								
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Registration Number" name="registration_number" id="registration_number">
										</div>
										<div id="registration_number_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row-->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Registration Council" name="registration_council" id="registration_council">
										</div>
										<div id="registration_council_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row-->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Registration Year" name="registration_year" id="registration_year">
										</div>
										<div id="registration_year_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row-->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="GSTIN number" name="gst" id="gst">
										</div>
										<div id="gst_error" style="color:#FF0000"></div>
									</div>
								</div>	
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">											
											<input type="button" class="btn_1" value="Previous" onclick="showClinic();">
											<input type="button" class="btn_1" value="Save" onclick="doctor_professional_info();">
											<input type="button" class="btn_1" value="Next" onclick="validateProfessional();">
										</div>
									</div>									
								</div>																
							</form>
							</div>
							</div>
							<!--  End wrapper indent -->
							
							
							
							
							
							
							
							
							
							<!-- /wrapper indent -->
							<div class="span" id="verification" name="verification" style="display:none;">
							<hr>
							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Documents Verification</h3>
							</div>
							<div class="wrapper_indent">
								<form method="post" id="document_verification" name="document_verification" enctype="multipart/form-data">	
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5><label>Doctor Identity Proof</label></h5>
										</div>
										<div id="id_proof_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" class="form-control" placeholder="Select Identity Proof" name="identity" id="identity"></div>										
										<div id="identity_error" style="color:#FF0000"></div>
									</div>
								</div>									
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5><label>Registration Proof</label></h5>
										</div>
										<div id="id_proof_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" class="form-control" placeholder="Select Registration Proof" name="registration_proof" id="registration_proof">										
										</div>
										<div id="registration_proof_error" style="color:#FF0000"></div>
									</div>																				
								</div>																				
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5><label>Clinic Identity Proof</label></h5>
										</div>
										<div id="id_proof_error" style="color:#FF0000"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" class="form-control" placeholder="Select Clinic identity proof" name="clinic_proof" id="clinic_proof">
										</div>
										<div id="clinic_proof_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">											
											<input type="button" class="btn_1" value="Previous" onclick="showProfessional();">
											<input type="button" class="btn_1" value="Save" onclick="verifyDocument();">
										</div>
									</div>									
								</div>																
							</form>
							</div>
							</div>
							<!--  End wrapper indent -->
							
							<!-- /wrapper indent -->
							<!--hr>
							<div class="indent_title_in">
								<i class="pe-7s-cash"></i>
								<h3>Prices &amp; Payments</h3>
								<p>Mussum ipsum cacilds, vidis litro abertis.</p>
							</div>
							<div class="wrapper_indent">
								<p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>
								<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Service - Visit</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>New patient visit</td>
											<td>$34</td>
										</tr>
										<tr>
											<td>General consultation</td>
											<td>$60</td>
										</tr>
										<tr>
											<td>Back Pain</td>
											<td>$40</td>
										</tr>
										<tr>
											<td>Diabetes Consultation</td>
											<td>$55</td>
										</tr>
										<tr>
											<td>Eating disorder</td>
											<td>$60</td>
										</tr>
										<tr>
											<td>Foot Pain</td>
											<td>$35</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div-->
							<!-- End /wrapper_indent -->
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->


				</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	<?php include_once('footer.php'); ?>
	
	
	
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

<script>
 $(function () {
   var bindDatePicker = function() {
		$("#dob").datetimepicker({
        format:'YYYY-MM-DD',
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


<script src="js/custom/form.js" type="text/javascript"></script>