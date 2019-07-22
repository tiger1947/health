<?php
//setting header to json
header('Content-Type: application/json');
include_once('../includes/application_top.php');

//data for department
$query = "select dept_name, (select count(doc_id) from doctor where department = dept_name) as total from department limit 10";
$result = mysqli_query($conn, $query);
while($department = mysqli_fetch_assoc($result))
{
	$dep_name[] = $department['dept_name'];
	$total[] = $department['total'];
}

$data['department'] = $dep_name;
$data['doctor'] = $total;

echo json_encode($data);

?>