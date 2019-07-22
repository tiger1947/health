<?php
include('header.php');
?>

    <!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- Form controls -->
			<div class="col-sm-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="btn-group"> 
						  Doctor  
					  </div>
				  </div>
				  <div class="panel-body">
					<form class="form-horizontal col-md-12" action="doctor_import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<!-- File Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">Select File</label>
							<div class="col-md-4">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						<!-- import Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="singlebutton">Import Doctor Data</label>
							<div class="col-md-4">
								<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
							</div>
						</div>
						<!--export Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="singlebutton">Export Doctor Data</label>
							<div class="col-md-4">
								<button type="button" id="submit" name="export" onclick="window.location='doctor_export.php';" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
							</div>
						</div>
					</form>
			 </div>
		 </div>
	 </div>
	</div>

</section> <!-- /.content -->
		 
<?php include('footer.php');?>