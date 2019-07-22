		<?php
		include_once('header.php'); 
		//include_once('class/Patient.php');
		//include_once('class/edit_patient.php');
		include_once('check.php');

		$p = new Patient();
		$data = $p->getUser($_SESSION['user_id']);
		
		//$fullname = $data['fullname'];
		//$mobile = $_SESSION['mobile'];
		
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
			<?php include_once('patient_sidebar.php');?>
				<div class="col-xl-9 col-lg-9">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
								<li><a href="#section_2">Reviews</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								
								<h3>Patient Account</h3>
								
							</div>
							<div class="wrapper_indent">
								<form method="post" name="patient_information" id="patient_information">
								<div class="row">
									<div class="col-md-3 ">

										<div class="form-group">
											<img src="<?php echo base_url_image.$data['pic_source'];?>" style="border-radius: 50%;height: 90px;width: 90px;">
										</div>
									</div>
									<div class="col-md-9 ">
									<!--button type="button" class="btn btn_1" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $data['user_id']; ?> ');">Edit</button-->
									
								   <div class="form-group">
											<input type="file" class="form-control" name="picture" id="picture" style="margin-top: 20px;">
										</div>
										<div class="form-group">				
											<input type="hidden" id="isImageChange" name="isImageChange" value="0">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input readonly="readonly" class="form-control" placeholder="Full Name" name="fullname" id="fullname" value="<?php echo $data['fullname'];?>">
										</div>
										<div id="fullname_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email Address" name="email" id="email" value="<?php echo $data['email']; ?>">
										</div>
										<div id="email_address_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Date of Birth" name="dob" id="dob" value="<?php echo $data['dob']; ?>">
										</div>
										<div id="date_of_birth_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="blood_group" id="blood_group" value="<?php echo $data['blood_group']; ?>">
												<option <?php if($data['blood_group']=='A+') { ?> selected <?php } ?>>A+</option>
												<option <?php if($data['blood_group']=='AB+') { ?> selected <?php } ?>>AB+</option>
												<option <?php if($data['blood_group']=='O+') { ?> selected <?php } ?> >O+</option>
												<option <?php if($data['blood_group']=='AB-') { ?> selected <?php } ?>>AB-</option>
												<option <?php if($data['blood_group']=='B+') { ?> selected <?php } ?>>B+</option>
												<option <?php if($data['blood_group']=='A-') { ?> selected <?php } ?>>A-</option>
												<option <?php if($data['blood_group']=='B-') { ?> selected <?php } ?>>B-</option>
												<option <?php if($data['blood_group']=='O-') { ?> selected <?php } ?>>O-</option>
											</select>
										</div>
										<div id="blood_group_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
								    <div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="sex" id="sex" value="<?php echo $data['sex'];?>">
												<option value="Male"<?php if($data['sex']=='M') { ?> checked <?php } ?>>Male</option>
												<option value="Female"<?php if($data['sex']=='F') { ?> checked <?php } ?>>Female</option>
												<option value="Other">Other</option>
											</select>
										</div>
										<div id="sex_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<input readonly="readonly" class="form-control" placeholder="Mobile Phone" name="mobile" id="mobile" onkeypress="return isNumberKey(event)" maxlength="10" value="<?php echo $data ['mobile'];;?>">
										</div>
										<div id="mobile number_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>								
												
								<div class="row">
									<div class="col-md-12 ">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Address Line One" name="address_line_one" id="address_line_one" value="<?php echo $data ['address_line_one']; ?>">
										</div>
										<div id="address_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="City" name="city" id="city" value="<?php echo $data['city'];?>">
										</div>
										<div id="city_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Locality" name="locality" id="locality" value="<?php echo $data['locality']; ?>">
										</div>
										<div id="locality_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>								
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="State" name="state" id="state" value="<?php echo $data['state']; ?>">
										</div>
										<div id="state_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Pincode" name="pincode" id="pincode"  onkeypress="return isNumberKey(event)" maxlength="6" value="<?php echo $data['pincode']?>">
										</div>
										<div id="pincode_error" style="color:#FF0000;font-size:12px;">
										</div>
									</div>
								</div>
								<!-- /row -->
												
								<div>
									<input onclick="patient_registration();" class="btn_1"  type="button" value="Save" id="submit-register">
								</div>
										
							</form>
							</div>
							<!--  End wrapper indent -->

						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
				</div>
				<!-- /col -->
			
				<!-- /asdide -->
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

<script src="js/custom/patient_form.js" type="text/javascript"></script>