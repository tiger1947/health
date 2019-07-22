	<?php 
	include_once('header.php');
	include_once('login_check_register.php'); 	
	?>
		<div id="hero_register">
			<div class="container margin_120_95">			
				<div class="row">
					<div class="col-lg-6">
						<h1>It's time to find you!</h1>
						<p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
						<div class="box_feat_2">
							<i class="pe-7s-map-2"></i>
							<h3>Let patients to Find you!</h3>
							<p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-date"></i>
							<h3>Easly manage Bookings</h3>
							<p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-phone"></i>
							<h3>Instantly via Mobile</h3>
							<p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-5 ml-auto">
						<div class="box_form">
							<form method="post" id="registration" name="registration" enctype="multipart/form-data">
								<p id="doc_reg" >Are you a doctor? <a href="javascript:void(0);" onclick="setType(1);"> Register here</a></p>
								<p id="pat_reg" style="display:none;">Are you a patient? <a href="javascript:void(0);" onclick="setType(0);"> Register here</a></p>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="text" autocomplete="off"  class="form-control" name="full_name" id="full_name"  placeholder="Enter Full Name">
										</div>
										<div id="fname_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" autocomplete="off"  class="form-control" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile" onkeypress="return isNumberKey(event)" maxlength="10" required>
										</div>
										<div id="mobile_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="password" autocomplete="off" class="form-control" name="password" id="password" placeholder="Enter password" required>
										</div>
										<div id="password_error" style="color:#FF0000"></div>
									</div>
								</div>
								<!-- /row -->
								<input type="hidden" class="form-control"  name="type" id="type" value="0">	
								<p class="text-center add_top_30">
									<input class="btn_1" type="button" name="submit" value="Register" onclick="validateForm();">
									<a href="login.php"><button class="btn_1" type="button">Login</button></a>
								</p>
							</form>
							
							<form  method="post" id="verify_otp" name="verify_otp" style="display:none;">
								<div class="alert alert-danger" id="otp_error_message" style="display:none;color:red;"></div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input class="form-control" type="text" id="verify_mobile" name="verify_mobile" placeholder="Enter OTP">
										</div>
										<input type="hidden" id="mobile_hidden" name="mobile_hidden"/>
										<div id="otp_error" style="color:#FF0000"></div>
									</div>
								</div>	
								<p class="text-center add_top_30">
									<input class="btn_1" type="button" name="submit" onclick="check_otp();" value="Verify">
									<a href="login.php"><button class="btn_1" type="button">Login</button></a>
								</p>            
							</form>		
						</div>
						<!-- /box_form -->
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /hero_register -->
	<?php include_once('footer.php'); ?>
	<script src="js/custom/registration.js" type="text/javascript"></script>