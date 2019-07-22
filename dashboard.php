<?php
include_once('header.php');
include_once('class/class_dashboard.php');
$id = $_SESSION['user_id'];
$dash = new Dashboard();
$pat = $dash->noOfPat($id);
//count
$app = $dash->noOfApp($id);
//total
$app_tod = $dash->noOfAppTod($id);
//num
?>
<!-- /cards -->

	
<div class="container margin_60">
			<div class="row">
				<?php include_once('sidebar_doctor.php'); ?>
				<div class="col-xl-9 col-lg-9">
					<!--nav id="secondary_nav" style="margin-bottom:50px;">						
							<ul class="clearfix">
								<li><a href="#section_1" class="active">Dashboard</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>						
						</nav-->
					<div id="section_1">
											<!-- Icon Cards-->
		  <div class="row" >
			<div class="col-xl-4 col-sm-6 mb-3">
			  <div class="card dashboard text-white bg-primary o-hidden h-100">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fa fa-users fa-2x"></i> <span style="font-size:30px;font-weight:bold;"><?php echo $pat['count'];?></span>
				  </div>
				  <div class=""><h3>No of Petients</h3></div>
				</div>				
			  </div>
			</div>
			<div class="col-xl-4 col-sm-6 mb-3">
			  <div class="card dashboard text-white bg-warning o-hidden h-100">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fa fa-tasks fa-2x"></i><span style="font-size:30px;font-weight:bold;"><?php echo $app['total'];?></span>
				  </div>					
					<div class=""><h3>Total No of Appointments</h3></div>
				</div>
				
			  </div>
			</div>
			<div class="col-xl-4 col-sm-6 mb-3">
			  <div class="card dashboard text-white bg-success o-hidden h-100">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fa fa-envelope fa-2x"></i><span style="font-size:30px;font-weight:bold;"><?php echo $app_tod['num'];?></span>
				  </div>				  
				  <div class=""><h3>Total Todays appointments</h3></div>
				</div>
				
			  </div>
			</div>			
		</div>
			<!-- /cards -->
				
					<div class="box_general_3">						
						<div class="col-lg-12">
							<h2><i class="fa fa-line-chart"></i>Line Chart</h2>
							<canvas id="lineChart" name="lineChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
						</div>
					</div>
					<!-- /section_1 -->
				
			
						<div class="box_general_3">							
							<div class="col-lg-12">
								<h2><i class="fa fa-bar-chart"></i>Bar Graph</h2>
								<canvas id="barChart" name="barChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
							</div>													
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
<?php
include_once('footer.php');
?>
 
 
<!-- ChartJs JavaScript -->
<script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<script src="assets/plugins/emojionearea/emojionearea.min.js" type="text/javascript"></script>
 
 

	
<script>

function getBarChart()
{
	$.ajax({
		url: "ajax/ajax_dashboard.php", //for data insertion to database"
		type: "POST",
		data: { action : 'getBarChart' },
		success: function(result){
			//bar chart
			var ctx = document.getElementById("barChart");
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: result.month,//["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
					datasets: [						
						{
							label: "Patients",
							data: result.patient,
							borderColor: "green",
							borderWidth: "0",
							backgroundColor: "green"
						},
						{
							label: "Appointments",
							data: result.appointment,
							borderColor: "red",
							borderWidth: "0",
							backgroundColor: "#000"
						}
					]
				},
				options: {
					scales: {
						yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
					}
				}					
			});
		}	
	});
}








function getLineChart()
{
	//ajax call
	$.ajax({
		url: "ajax/ajax_dashboard.php", //for data insertion to database"
		type: "POST",
		data: {action:'getLineChart'},
		success: function(result){
			//alert(result);
			//line chart
			var ctx = document.getElementById("lineChart");
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
					datasets: [
						{
							label: "List Of registered Patients",
							lineTension: 0.3,
							backgroundColor: "rgba(2,117,216,0.2)",
							borderColor: "rgba(2,117,216,1)",
							pointRadius: 5,
							pointBackgroundColor: "rgba(2,117,216,1)",
							pointBorderColor: "rgba(255,255,255,0.8)",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "rgba(2,117,216,1)",
							pointHitRadius: 20,
							pointBorderWidth: 2,
							data:result.patient //[16, 32, 18, 26, 42, 33]
						}/*,
						{
							label: "List Of Appointment",
							borderColor: "blue",
							borderWidth: "1",
							backgroundColor: "blue",
							pointHighlightStroke: "blue",
							data:result.appointment//[16, 32, 18, 26, 42, 33, 44, 24, 19, 16, 67, 71, 65]
						}*/
					]
				},
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: false
					},
					hover: {
						mode: 'nearest',
						intersect: true
					}
				}
			});
		}	
	});
}

$(document).ready(function(){
	getBarChart();
})

$(document).ready(function(){
	getLineChart();
})	
</script>	