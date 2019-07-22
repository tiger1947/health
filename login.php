	<?php 
	include_once('header.php');
	include_once('login_check_register.php'); 	
	?>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login-2">
					<h1>Please login to Findoctor!</h1>
					<form method="post" name="loginForm" id="loginForm">
						<div class="box_form clearfix">
							<div class="box_login">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
								<a href="#0" class="social_bt google">Login with Google</a>
								<a href="#0" class="social_bt linkedin">Login with Linkedin</a>
							</div>
							<div class="box_login last">
								<div class="alert alert-danger" id="error_message" style="display:none;color:#FF0000;"></div>
								<div class="form-group">
									<input class="form-control" type="text" name="mobilenumber" id="mobilenumber" placeholder="Enter Your Mobile Number" onkeypress="return isNumberKey(event)" maxlength="10" required=""> 
									<div id="mobilenumber_error" style="color:#FF0000;font-size:12px;"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="Password" name="password" id="password" placeholder="Enter Password" maxlength="16" required="">
									<div id="password_error" style="color:#FF0000;font-size:12px;"></div>
									<a href="forgot.php" class="forgot"><small>Forgot password?</small></a>									
								</div>
								<div class="form-group">
									<input onclick="validateForm();" class="btn_1" type="button" name="submit" value="Login">
								</div>
							</div>
						</div>
					</form>
					<p class="text-center link_bright">Do not have an account yet? <a href="register.php"><strong>Register now!</strong></a></p>
				</div>
				<!-- /login -->
			</div>
		</div>
	<?php include_once('footer.php'); ?>	
	<script src="js/custom/user_login.js" type="text/javascript"></script>