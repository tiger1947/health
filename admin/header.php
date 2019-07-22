<?php
include_once('includes/application_top.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Health Admin panel</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
    
        <!-- Start Global Mandatory Style
        =====================================================================-->
        <!-- jquery-ui css -->
        <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Lobipanel css -->
        <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <!-- Pace css -->
        <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
        <!-- Font Awesome -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- Pe-icon -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- Themify icons -->
        <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
		<!--css for datatables-->
		<!--css for datatables-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
		<!-- End Global Mandatory Style
        =====================================================================-->
        <!-- Start Theme Layout Style
        =====================================================================-->
        <!-- Theme style -->
        <link href="assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
        <!-- End Theme Layout Style
        =====================================================================-->

	
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
         <header class="main-header">
            <a href="dashboard.php" class="logo"> <!-- Logo -->
                <span class="logo-mini">
                    <!--<b>A</b>BD-->
                    <img src="assets/dist/img/mini-logo.png" alt="">
                </span>
                <span class="logo-lg">
                    <!--<b>Admin</b>BD-->
					<?php 					
					$result = $db->rawQuery("select logo_path from logo where status='1'");					
					?>
                    <img src="<?php echo "logo/".$data['logo_path'];?>" alt="">
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top ">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-tasks"></span>
                </a>
                 
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="pe-7s-mail"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    
                                    <ul class="dropdown-menu">
                                        <li class="header"><i class="fa fa-envelope-o"></i>
                                            4 Messages</li>
                                            <li>
                                                <ul class="menu">
                                                    <li><!-- start message -->
                                                     <a href="#" class="border-gray">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/avatar2.png" class="img-thumbnail" alt="User Image"></div>
                                                            <h4>Alrazy</h4>
                                                            <p>Lorem Ipsum is simply dummy text of...
                                                            </p>
                                                            <span class="label label-success pull-right">11.00am</span>
                                                        </a>       

                                                    </li>
                                                    <li>
                                                        <a href="#" class="border-gray">
                                                            <div class="pull-left">
                                                                <img src="assets/dist/img/avatar4.png" class="img-thumbnail" alt="User Image"></div>
                                                                <h4>Tanjil</h4>
                                                                <p>Lorem Ipsum is simply dummy text of...
                                                                </p>
                                                                <span class="label label-success pull-right"> 12.00am</span>
                                                            </a>       

                                                        </li>
                                                        <li>
                                                            <a href="#" class="border-gray">
                                                                <div class="pull-left">
                                                                    <img src="assets/dist/img/avatar3.png" class="img-thumbnail" alt="User Image"></div>
                                                                    <h4>Jahir</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of...
                                                                    </p>
                                                                    <span class="label label-success pull-right"> 10.00am</span>
                                                                </a>       

                                                            </li>
                                                            <li>
                                                             <a href="#" class="border-gray">
                                                                <div class="pull-left">
                                                                    <img src="assets/dist/img/avatar4.png" class="img-thumbnail" alt="User Image"></div>
                                                                    <h4>Shawon</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of...
                                                                    </p>
                                                                    <span class="label label-success pull-right"> 09.00am</span>
                                                                </a>       

                                                            </li>
                                                            <li>
                                                                <a href="#" class="border-gray">
                                                                    <div class="pull-left">
                                                                        <img src="assets/dist/img/avatar3.png" class="img-thumbnail" alt="User Image"></div>
                                                                        <h4>Shipon</h4>
                                                                        <p>Lorem Ipsum is simply dummy text of...
                                                                        </p>
                                                                        <span class="label label-success pull-right"> 03.00pm</span>
                                                                    </a>       
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="footer"><a href="#">See all messages <i class=" fa fa-arrow-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- Notifications -->
                                                <li class="dropdown notifications-menu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="pe-7s-bell"></i>
                                                        <span class="label label-warning">8</span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="header"><i class="fa fa-bell"></i> 8 Notifications</li>
                                                        <li>
                                                            <ul class="menu">
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-inbox"></i> Inbox  <span class=" label-success label label-default pull-right">9</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> New Order <span class=" label-success label label-default pull-right">3</span> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-money"></i> Payment Failed  <span class="label-success label label-default pull-right">6</span> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Order Confirmation <span class="label-success label label-default pull-right">7</span> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Update system status <span class=" label-success label label-default pull-right">11</span> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> client update <span class="label-success label label-default pull-right">12</span> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> shipment cancel 
                                                                        <span class="label-success label label-default pull-right">2</span> </a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="footer">
                                                             <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                                                         </li>
                                                     </ul>
                                                 </li>                                                 
                                        <!-- user -->
                                        <li class="dropdown dropdown-user admin-user">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                                <div class="user-image">
												<?php												
												$result = $db->rawQueryOne("select profile from admin");									
												?>
												<img src="<?php echo base_url_image.$result['profile'];?>" class="img-circle" height="40" width="40" alt="User Image">
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="profile.php"><i class="fa fa-users"></i> User Profile</a></li>
                                                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </header>
                        <!-- =============================================== -->
                        <!-- Left side column. contains the sidebar -->
                        <aside class="main-sidebar">
                            <!-- sidebar -->
                            <div class="sidebar">
                                <!-- Sidebar user panel -->
                                <div class="user-panel">
                                    <div class="image pull-left">									
                                        <img src="<?php echo base_url_image.$result['profile'];?>" class="img-circle" alt="User Image">
                                    </div>
                                    <div class="info">
                                        <h4>Welcome</h4>
                                        <p><?php echo $_SESSION['name'];?></p>
                                    </div>
                                </div>
                                
                                <!-- sidebar menu -->
                                <ul class="sidebar-menu">
                                    <li class="active">
                                        <a href="dashboard.php"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user-md"></i><span>Doctor</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-doctor.php">Add Doctor</a></li>
                                            <li><a href="doctor-list.php">Doctor list</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user"></i><span>Patient</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-patient.php">Add patient</a></li>
                                            <li><a href="patient-list.php">patient list</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-sitemap"></i><span>Department</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-department.php">Add Department</a></li>
                                            <li><a href="department-list.php">Department list</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-list-alt"></i> <span>Schedule</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-schedule.php">Add schedule</a></li>
                                            <li><a href="schedule-list.php">schedule list</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-check-square-o"></i><span>Appoinment</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-appointment.php">Add appoinemnt</a></li>
                                            <li><a href="appointment-list.php">Appionment list</a></li>
                                        </ul>
                                    </li>
									<li class="treeview">
                                        <a href="#">
                                            <i class="hvr-buzz-out fa fa-id-card-o"></i><span>Logo</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-logo.php">Add Logo</a></li>
                                            <li><a href="logo-list.php">Logo List</a></li>
                                        </ul>
                                    </li>
                                    <!--li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-credit-card-alt"></i><span>payment</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="add-payment.php">Add payment</a></li>
                                            <li><a href="pay-list.php">payment list</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                          <i class="fa fa-file-text"></i><span>Report</span>
                                          <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="patient-wise-report.php">Patient wise Report</a></li>
                                        <li><a href="doctor-wise-report.php">Doctor wise Report</a></li>
                                        <li><a href="total-report.php">Total Report</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="widgets.html">
                                        <i class="fa fa-user-circle-o"></i><span>Human Resources</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="add-emp.html">Add Employee</a></li>
                                        <li><a href="emp-list.html">employee list</a></li>
                                        <li><a href="add-ns.html">Add Nurse</a></li>
                                        <li><a href="ns-list.html">Nurse list</a></li>
                                        <li><a href="add-ph.html">Add pharmacist</a></li>
                                        <li><a href="ph-list.html">pharmacist list</a></li>
                                        <li><a href="add-rep.html">Add Representative</a></li>
                                        <li><a href="rep-list.html">Representative list</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-bed"></i><span>Bed Manager</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="add-bed.html">Add Bed</a></li>
                                        <li><a href="bed-list.html">Bed list</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i><span>Notice</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="add-notice.html">Add Notice</a></li>
                                        <li><a href="not-list.html">Notice list</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="mailbox.html">
                                       <i class="fa fa-envelope"></i><span> Mail</span>
                                   </a>
                               </li>
                               <li>
                                <a href="widgets.html">
                                    <i class="fa fa-shopping-bag"></i><span> Widgets</span> 
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-file-text"></i><span>pages</span>
                                    <span class="pull-right-container">
                                       <i class="fa fa-angle-left pull-right"></i>
                                   </span>
                               </a>
                               <ul class="treeview-menu">
                                <li><a href="register.html">Sign up</a></li>
                                <li><a href="login.html">Sign in</a></li>
                                <li><a href="forget_password.html">Forget password</a></li>
                                <li><a href="lockscreen.html">Lockscreen</a></li>
                                <li><a href="404.html">404 Error</a></li>
                                <li><a href="505.html">505 Error</a></li>
                                <li><a href="blank.html">Blank Page</a></li>
                                <li><a href="profile.html">Profile page</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list-alt fw"></i><span> User Interface</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="calender.html">Calender</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="panels.html">Panels</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="tabs.html">Tabs & accordian</a></li>
                                <li><a href="icons_fontawesome.html">Icons</a></li>
                                <li><a href="notification.html">Notifications</a></li>
                                <li><a href="profile.html">Modals</a></li>
                                <li><a href="gridSystem.html">grid</a></li>
                                <li><a href="slider.html">slider</a></li>
                                <li><a href="timeline.html">Timeline</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="labels-badges-alerts.html">Badges</a></li>
                                <li><a href="progressbars.html">progress bar</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="modals.html">
                                <i class="fa fa-window-maximize"></i><span> Modals</span> 
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-columns"></i><span> Layout</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="layout_fixed.html">Fixed layout</a></li>
                                <li><a href="layout_boxed.html">Boxed layout</a></li>
                                <li><a href="layout_collapsed_sidebar.html">collapsed layout</a></li>
                            </ul>
                        </li-->                
                    </ul>
                </div> <!-- /.sidebar -->
            </aside>
            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="padding-top:50px;">
                    <div class="header-title">
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="index.php"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </section>
				