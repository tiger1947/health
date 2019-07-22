<?php include_once('includes/application_top.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
	
	<!--css for datatables-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>
	<!--auto Searching -->
	
</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->
	
	<div id="page">		
	<header class="header_sticky">	
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container" style="max-width:1136px;">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.php" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<ul id="top_access">
						<?php if(isset($_SESSION['user_id']) and $_SESSION['user_id'] != '') { ?>
							<li><a href="detail-page.php"><i class="pe-7s-user" title="Profile"></i></a></li>
							<li><a href="logout.php" title="Logout"><i class="pe-7s-less"></i></a></li>
						<?php } else { ?>
							<li><a href="login.php" title="Login"><i class="pe-7s-user"></i></a></li>
							<li><a href="register.php" title="Register"><i class="pe-7s-add-user"></i></a></li>
						<?php } ?>
					</ul>
					<nav id="menu" class="main-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<span><a href="#0">Pages</a></span>
								<ul>
									<li>
										<span><a href="#0">List pages</a></span>
										<ul>
											<li><a href="list.php">List page</a></li>
										</ul>
									</li>
									<li>
										<span><a href="#0">Detail pages</a></span>
										<ul>
											<li><a href="detail-page.php">Detail page</a></li>
										</ul>
									</li>
									<li><a href="submit-review.php">Submit Review</a></li>
									<li><a href="blog-1.php">Blog</a></li>
									<li><a href="badges.php">Badges</a></li>									
									<li><a href="about.php">About Us</a></li>
									<li><a href="contacts.php">Contacts</a></li>
								</ul>
							</li>
							<li>
								<span><a href="#0">Extra Elements</a></span>
								<ul>
                                	<li><a href="booking-page.php">Booking page</a></li>
                                    <li><a href="confirm.php">Confirm page</a></li>
                                	<li><a href="faq.php">Faq page</a></li>
                                    <li><a href="coming_soon/index.php">Coming soon</a></li>
                                    <li>
										<span><a href="#0">Pricing tables</a></span>
										<ul>
                                    		<li><a href="pricing-tables.php">Pricing tables</a></li>
										</ul>
									</li>
									<!--li><a href="icon-pack-1.php">Icon pack 1</a></li>
									<li><a href="icon-pack-2.php">Icon pack 2</a></li>
									<li><a href="icon-pack-3.php">Icon pack 3</a></li-->
									<li><a href="404.php">404 page</a></li>
								</ul>
							</li>
                            <!--li><span><a href="menu_2/index.php">Menu V2</a></span></li-->
							<li><span><a href="admin_section/index.php" target="_blank">Admin</a></span></li>							
						</ul>
					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->	
	
	<main>