<?php 
include_once('includes/application_top.php');
include_once('class/profile.php');
include_once('header.php'); 
$id = $_SESSION['user_id'];
$profile  = new Profile();
$result = $profile->getData($id);

?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
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
						<div class="box_general_3">
							<div class="wrapper_indent">																
								<div class="row">
									<div class="col-lg-12">										
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Reset Password </a></li>
										<li><a data-toggle="tab" href="#delete">Delete Account</a></li>
									</ul>
									
									  <div class="tab-content">
										<div id="home" class="tab-pane fade in active">
											<form id="password_reset" name="password_reset">
											<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
														<label>Enter Current Password</label>
															<input type="password" class="form-control" placeholder="Enter Current Password
															" name="old_password" id="old_password">
														</div>
														<div id="old_password_error" style="color:#FF0000"></div>
													</div>
												</div>
												<!--Row-->	
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
														<label>Enter New Password</label>
															<input type="password" class="form-control" placeholder="Enter New Password
															" name="new_password" id="new_password">
														</div>
														<div id="new_password_error" style="color:#FF0000"></div>
													</div>
												</div>
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
														<label>Enter Confirm Password</label>
															<input type="password" class="form-control" placeholder="Enter Confirm Password
															" name="confirm_password" id="confirm_password">
														</div>
														<div id="confirm_password_error" style="color:#FF0000"></div>
													</div>
												</div>
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
															<input type="reset" class="btn_1" value="Reset">
															<input type="button" class="btn_1" value="Save" onclick="reset_password();" style="float:right;">
														</div>														
													</div>
												</div>
											</form>
										</div>									
										<div id="delete" class="tab-pane fade in active">
											<form id="get_otp" name="get_otp">
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
														<label>Enter Mobile No</label>
															<input type="text" autocomplete="off"  class="form-control" id="account_mobile" name="account_mobile" class="form-control" placeholder="Enter Mobile Number" onkeypress="return isNumberKey(event)" maxlength="10" required>
														</div>
														<div id="mobile_error" style="color:#FF0000"></div>
													</div>
												</div>
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">														
															<input type="button" class="btn_1" value="Next" onclick="check_otp();" style="float:left;">
														</div>														
													</div>
												</div>
											</form>
											<form id="delete_account" name="delete_account" style="display:none;">
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">
														<label>Enter Mobile OTP</label>
															<input type="text" autocomplete="off"  class="form-control" id="otp" name="otp" class="form-control" placeholder="Enter Mobile Number" onkeypress="return isNumberKey(event)" maxlength="6" required>
														</div>
														<div id="otp_error" style="color:#FF0000"></div>
													</div>
												</div>
												<!--Row-->
												<div class="row" style="margin-top:25px;">
													<div class="col-lg-6">
														<div class="form-group">														
															<input type="button" class="btn_1" value="delete" onclick="confirmation();" style="float:left;">
														</div>														
													</div>
												</div>
											</form>
										</div>
									 </div>								
								</div>
							</div>
								<!-- /row-->
							</div>
							<!-- /wrapper indent -->
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
	

<script src="js/custom/delete_user.js" type="text/javascript"></script>
