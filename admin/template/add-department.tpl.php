                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="btn-group"> 
                                        <a class="btn btn-primary" href="department-list.php"> <i class="fa fa-list"></i>  Department List</a>  
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="col-sm-6" name="department-data" id="department-data">
                                        <div class="form-group">
                                            <label>Department Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Department Name"/>
											<div id="name_error" style="color:#FF0000">
												</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
											<div id="description_error" style="color:#FF0000">
												</div>
                                        </div>
                                        <!--div class="form-check">
                                          <label>Status</label><br>
                                          <label class="radio-inline">
                                              <input type="radio" name="status" id="status" value="1" checked="checked">Active</label>
                                              <label class="radio-inline"><input type="radio" name="status" id="status" value="0" >Inctive</label>
                                          </div-->                                       
                                          
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

<script src="js/add-department.js" type="text/javascript"></script>