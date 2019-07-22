
         <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="btn-group"> 
                                      <a class="btn btn-primary" href="appointment-list.php"> <i class="fa fa-list"></i>  Appoinment List</a>  
                                  </div>
                              </div>
                              <div class="panel-body">
                                <form class="col-sm-6" name="app_data" id="app-data">
										<div class="form-group">
											<?php 
												$doctor = $app->getAllDoctors();
												$num = count($doctor);
											?>
                                        <label>Doctor Name</label>
										 <select class="form-control" name="doctor" id="doctor">
                                             <?php 
											for($i=0;$i<$num;$i++)
											 { 
											 ?>
											 <option value="<?php echo $doctor[$i]['doc_id'];?>">
											 <?php echo $doctor[$i]['f_name']." ".$doctor[$i]['l_name']; ?>
											 </option>
											 <?php 
											}
											 ?>
											</select>
										</div>	
										
										<div class="form-group">
											<?php	$patient = $app->getAllPatients();
													$num = count($patient);
											?>
                                        <label>Patient Name</label>
										
										 <select class="form-control" name="patient" id="patient">
                                             <?php 
											 for($i=0;$i<$num;$i++)
											 { 
											 ?>
											 <option value="<?php echo $patient[$i]['patient_id'];?>"><?php echo $patient[$i]['fname']." ".$patient[$i]['lname']; ?>
											 </option>
											 <?php }?>	
											</select>
											<a href="add-patient.php" class="btn btn-success" > Add Patient</a>
										</div>							
										                                                                    
										<div class="form-group">
											<?php	$department = $app->getAllDepartments();
													$num = count($department);
											?>
											<label>Department</label>
											<select class="form-control" name="department" id="department">
											 <?php 
											 for($i=0;$i<$num;$i++)
											 { 
											 ?>
												 <option value="<?php echo $department[$i]['dept_id'];?>"><?php echo $department[$i]['dept_name']; ?>
												 </option>
											 <?php }?>	
												</select>											
										</div>
																		
										<div class="form-group">
											<label>Appionment date</label>
											<input type='text' class="glyphicon glyphicon-calendar" id='date' name="date"/>
											<div id="appointment_error" style="color:#FF0000">
											</div>
										</div>
																		
									<div class="form-group">
										 <label>Problem</label><br>
											<textarea class="form-control" rows="6" name="problem" id="problem" placeholder="problem">
										</textarea>										
									</div>									  
									<div class="reset-button">
										<input type="reset" class="btn btn-warning">
										<input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="Save"/>
									</div>
								 
								 </form>
							 </div>
						 </div>
					 </div>
				 </div>

			 </section> <!-- /.content -->
  
  
<?php include_once('footer.php');?> 
<script src="js/add-appointment.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script>
 $(function () {
   var bindDatePicker = function() {
		$("#date").datetimepicker({
        format:'YYYY-MM-DD hh:ss a',
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