<?php

// include common files 
include_once('config.php');
include_once('constant.php');
include_once('dbtables.php');

// get database connection
include_once('database.php');
include_once('functions.php');

session_start();
if(isset($_SESSION['admin_id']))
{
	header('Location:dashboard.php');
}

?>	