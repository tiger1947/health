<?php
// include header
include_once('class/department.php');
include_once('header.php');

$dept = new Department();
$department = $dept->getAllDepartment();
$num = count($department);

// include tpl
include('template/department-list.tpl.php');
?> 