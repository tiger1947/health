<?php

// session started
session_start();

// include common files 
include_once('config.php');
include_once('constant.php');
include_once('dbtables.php');

// get database connection
include_once('database.php');
include_once('functions.php');

if(empty($_SESSION['admin_id']))
{
	header('Location:index.php');	
} 
?>	