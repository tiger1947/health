<?php
include_once('includes/application_top.php');
include_once('class/class_notification.php');
$notification = new Notification();
$data = $notification->getNotification(48);

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}

</style>

<div class="navbar">
	<div class="dropdown">	
		<button class="dropbtn" onclick="myFunction()">Notifications
			<i class="fa fa-caret-down"></i>
			<span class="badge">
			<?php
				if(count($data)<=9)
				{
					 echo count($data);
				}
				else
				{
					echo "9".'+';
				}			
			?></span>
		</button>
		<div class="dropdown-content" id="myDropdown">			
			<?php 
				$i=0;
				for($i=0;$i<count($data);$i++)
				{				
					?>
					<a href=""><?php
					echo $data[$i]['message']." ".$data[$i]['created_date']."</br>";
					?></a>
					<?php
				}
			?>
		</div>
	</div> 
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>