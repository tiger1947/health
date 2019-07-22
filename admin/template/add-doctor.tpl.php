                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="doctor-list.php"> <i class="fa fa-list"></i>  Doctor List </a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="registration" name="registration" enctype="multipart/form-data" class="col-sm-12">
                                            <div class="col-sm-6 form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter firstname" required>
												<div id="fname_error" style="color:#FF0000">
												</div>
											</div>
                                            <div class="col-sm-6 form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Lastname" required>
												<div id="lname_error" style="color:#FF0000">
												</div>
											</div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
												<div id="email_error" style="color:#FF0000">
												</div>
											</div>
                                            <div class="col-sm-6 form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
												<div id="password_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" required>
												<div id="designation_error" style="color:#FF0000">
												</div>
                                            </div>

                                            <div class="col-sm-6 form-group">
											<label>Department</label>
											<select class="form-control" name="department" id="department">
						
											<?php	
											$department = $doc->getDepartment();
											if(!empty($department))
											{						
												foreach ($department as $dept_name) 
												{ 
												?>                                                
													<option value="<?php echo $dept_name['dept_id'];?>">
													<?php echo $dept_name['dept_name']; ?>
													</option>
													<?php 
												}
											}
											?>
											</select>
												<div id="department_error" style="color:#FF0000">
												</div>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
												<div id="address_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Specialist</label>
                                                <input type="text" class="form-control" name="specialist" id="specialist" placeholder="Specialist" required>
												<div id="specialist_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Mobile</label>
                                                <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile" required>
												<div id="mobile_error" style="color:#FF0000">
												</div>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label >Picture upload</label>
                                                <input type="file" class="form-control" name="picture" id="picture">
                                            </div>  
                                            <div class="col-sm-12 form-group">
                                                <label>Short Biography</label>
                                                <textarea id="short_bio" name="short_bio" class="form-control" rows="3" placeholder="Enter text ..."></textarea>
												<div id="short_bio_error" style="color:#FF0000">
												</div>
                                            </div>        
                                            <div class="col-sm-6 form-group">
                                                <label>Date of Birth</label>
                                                <input name="date_of_birth" id="date_of_birth" class="datepicker form-control hasDatepicker" type="date" placeholder="Date of Birth"/>											
												<div id="date_of_birth_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Blood group</label>
                                                <select class="form-control" name="blood_group" id="blood_group">
                                                    <option>A+</option>
                                                    <option>AB+</option>
                                                    <option>O+</option>
                                                    <option>AB-</option>
                                                    <option>B+</option>
                                                    <option>A-</option>
                                                    <option>B-</option>
                                                    <option>O-</option>
                                                </select>
												<div id="blood_group_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                             <label>Sex</label><br>
                                             <label class="radio-inline">
                                                 <input type="radio" name="sex" id="sex" value="1" checked="checked">Male</label> 
                                                 <label class="radio-inline"><input type="radio" name="sex" id="sex" value="0" >Female</label>
                                             </div>                                         
                                              <div class="col-sm-12 reset-button">
                                                 <input type="reset" class="btn btn-warning"/>
                                                <input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="submit"/>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>                         
                     </section> 
					 <?php include('footer.php'); ?>
<script src="js/add-doctor.js" type="text/javascript"></script>