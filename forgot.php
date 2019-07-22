	<?php include_once('header.php'); ?>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login-2">
					<h1>Please login to Findoctor!</h1>
					<div class="box_form clearfix">
						<div class="box_login">
							<a href="#0" class="social_bt facebook">Login with Facebook</a>
							<a href="#0" class="social_bt google">Login with Google</a>
							<a href="#0" class="social_bt linkedin">Login with Linkedin</a>
						</div>
						<div class="box_login last">
							<form method="post" id="send_otp" name="send_otp">
								<div class="form-group">
									<span class="fa fa-mobile-alt" aria-hidden="true"></span>
									<input class="form-control" type="text" placeholder="Enter Your Mobile Number" id="input_mobile" name="input_mobile" onkeypress="return isNumberKey(event)" maxlength="10" required=""> 
								</div>				
								<div class="alert alert-danger" id="otp_error" style="display:none;"></div>	
								<p class="text-center add_top_30">
								<input class="btn_1" type="button" onclick="validateotp();" class="btn_1" value="send OTP"/><a href="index.php"><button class="btn_1" type="button">Login</button></a>
								</p>
							</form>
							
							<form method="post" id="verify_otp" name="verify_otp" style="display:none;">
								<div class="form-group">
									<span class="fa fa-envelope" aria-hidden="true"></span>
									<input class="form-control" type="hidden" placeholder="Enter OTP" name="mobile_hidden" id="mobile_hidden"> 
									<input class="form-control" type="text" placeholder="Enter OTP" name="try_otp" id="try_otp"> 
								</div>
								<p class="text-center add_top_30">								
								<input class="btn_1" type="button" onclick="verifyotp();" class="btn_1" name="submit" value="Verify"/>
								<a href="index.php"><button class="btn_1" type="button">Login</button></a>
								</p>
							</form>
							
							<form method="post" id="new_password" name="new_password" style="display:none;">					
								<input class="form-control" type="hidden" placeholder="Enter OTP" name="mobile_hide" id="mobile_hide"> 
								<div class="form-group">
									<span class="fa fa-envelope" aria-hidden="true"></span>
									<input class="form-control" type="password" name="password1" id="password1" placeholder="Enter Your New Password" required=""> 
								</div>
								<div class="form-group">
									<span class="fa fa-lock" aria-hidden="true"></span>
									<input class="form-control" type="Password" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" required="">
								</div> 
								<p class="text-center add_top_30">
								<input class="btn_1" onclick="update_password();" button class="btn_1" type="button" name="submit" value="Update">
								<input class="btn_1" onclick="" class="btn_1" type="button" name="submit" value="Reset">
								</p>
							</form>
						</div>
					</div>
				</div>
				<!-- /login -->
			</div>
		</div>
	<?php include_once('footer.php'); ?>	
	<script src="js/custom/user_login.js" type="text/javascript"></script>