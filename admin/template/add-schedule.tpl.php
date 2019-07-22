
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="schedule-list.php"> <i class="fa fa-list"></i>  Schedule List</a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form class="col-sm-6" name="schedule_data" id="schedule_data">
                                            <div class="form-group">
											<?php 
											$doctor =$sch->getallDoctor();
											//print_r($doctor);
											 $num = count($doctor);
											?>
                                        <label>Doctor Name</label>
										 <select class="form-control" name="doctor" id="doctor">
                                             <?php 
													
											      for($i=0;$i<$num;$i++)
													{
														?>
															<option value="<?php echo $doctor[$i]['f_name']." ".$doctor[$i]['l_name'];?>">
															<?php echo $doctor[$i]['f_name']." ".$doctor[$i]['l_name']; ?>
															</option>
														<?php 
													
													}
											 
											/* while($data = mysqli_fetch_array($result)){ ?>
											 <option><?php echo $data['f_name']." ".$data['l_name']; ?></option>
											 <?php } */?>
											</select>
										</div>																																		
                                            
                                            <div class="form-group" >
                                                <label>Available days</label>
                                                <select class="form-control" name="available" id="available">
                                                    <option>Sunday</option>
                                                    <option>Monday</option>
                                                    <option>Tuesday</option>
                                                    <option>Wednesday</option>
                                                    <option>Thrusday</option>
                                                    <option>Friday</option>
                                                    <option>Saturday</option>
                                                </select>
												<div id="available_error" style="color:#FF0000">
												</div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Start time</label>
                                                <input type="time" name="start" id="start" class="form-control"  placeholder="Start time" value="">
												<div id="start_error" style="color:#FF0000">
												</div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Close time</label>
                                                <input type="time" name="stop" id="stop" class="form-control" placeholder="Closing time" value="">
												<div id="close_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label>per patient time</label>
                                                <!--input type="text" name="time" id="time" class="form-control" placeholder="time"-->
												<select name="time" id="time" class="form-control">
												<option>Select Per Patient Time(In Mintus)</option>
												<?php
												for($i=0;$i<60;$i++)
												{
													?>
													<option value="<?php echo $i; ?>" > <?php echo $i; ?>  </option>
													<?php
												}
												?>
												</select>
												<div id="time_error" style="color:#FF0000">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Serial visibility</label>
                                                <select class="form-control" name="visibility" id="visibility">
                                                    <option>sequential</option>
                                                    <option>timestamp</option>
                                                </select>
												<div id="visibility_error" style="color:#FF0000">
												</div>
                                            </div>
                                           
                                          <div class="reset-button">
                                               <input type="reset" class="btn btn-warning"/>
                                             <input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="Save"/>
                                         </div>                                         
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section> <!-- /.content -->
            <?php include_once('footer.php');?>

			
<script src="js/add-schedule.js" type="text/javascript"></script>			