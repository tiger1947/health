
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="btn-group"> 
                                        <a class="btn btn-primary" href="patient-list.php"> 
                                            <i class="fa fa-list"></i>  patient List </a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="registration" name="registration" enctype="multipart/form-data" class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" required>
												<div id="fname_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last Name" required>
												<div id="lname_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" required>
												<div id="mobile_error" style="color:#FF0000">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Picture upload</label>
                                                <input type="file" name="picture" id="picture">
												<div id="picture_error" style="color:#FF0000">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input name="date_of_birth" id="date_of_birth" class="datepicker form-control hasDatepicker" type="date" placeholder="Date of Birth" />
												<div id="dob_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="form-group">
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
                                            <div class="form-group">
                                             <label>Sex</label><br>
                                             <label class="radio-inline"><input name="sex" id="sex" value="1" checked="checked" type="radio">Male</label> 
                                             <label class="radio-inline"><input name="sex" id="sex" value="0" type="radio">Female</label>

                                         </div>
                                         <!--div class="form-check">
                                          <label>Status</label><br>
                                          <label class="radio-inline"><input type="radio" name="status" id="status" value="1" checked="checked">Active</label> <label class="radio-inline"><input type="radio" name="status" id="status" value="0" >Inctive</label>
										</div-->                                       

                                      <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" rows="3" name="address" id="address" required></textarea>
										<div id="address_error" style="color:#FF0000">
												</div>
                                    </div>
                                   <div class="col-sm-12 reset-button">
                                      <input type="reset" class="btn btn-warning"/>
                                      <input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="save"/>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             
         </section> <!-- /.content -->
<?php include('footer.php');?>	
<script src="js/add-patient.js" type="text/javascript"></script>