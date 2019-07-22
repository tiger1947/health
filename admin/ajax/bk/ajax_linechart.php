<?php
//setting header to json
header('Content-Type: application/json');

include_once('../includes/application_top.php');


$query = "SELECT DATE_FORMAT(created_date, '%b') AS month, count(doc_id) as total FROM doctor WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')";

$result = mysqli_query($conn, $query);

while($doctor = mysqli_fetch_assoc($result))
{
	//$month[] = $doctor['month'];
	$doc_total[] = $doctor['total'];
}




//data for created patient

$query1 = "SELECT DATE_FORMAT(created_date, '%b') AS month, count(patient_id) as sum FROM patient WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')";

$result1 = mysqli_query($conn, $query1);

while($patient = mysqli_fetch_assoc($result1))
{
	$pat_total[] = $patient['sum'];
}


//data for appointment

$query2 = "SELECT DATE_FORMAT(created_date, '%b') AS month, count(app_id) as num FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')";

$result2 = mysqli_query($conn, $query2);
while($app = mysqli_fetch_assoc($result2))
{
	$app_total[] = $app['num'];
}


//$data['month'] = $month;
$data['doctor'] = $doc_total;
$data['patient'] = $pat_total;
$data['appointment'] = $app_total;
//print_r($data);
echo json_encode($data);

?>