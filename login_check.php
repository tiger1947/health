<?php
include_once('includes/application_top.php');
if(!isset($_SESSION['user_id']) or (isset($_SESSION['user_id']) and $_SESSION['user_id'] == ''))
{
	?><script>window.location="index.php";</script><?php
}
?>

