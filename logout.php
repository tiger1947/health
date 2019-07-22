<?php 
include_once('includes/application_top.php');
unset($_SESSION['user_id']);
session_unset();
session_destroy();
header('Location:index.php');
?>