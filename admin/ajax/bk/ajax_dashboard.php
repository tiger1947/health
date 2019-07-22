<?php
//setting header to json
header('Content-Type: application/json');

include_once('../includes/application_top.php');

//data for created doctors
$query = "SELECT 
    SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
    SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
    SUM(IF(month = 'Mar', total, 0)) AS 'Mar',
    SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
    SUM(IF(month = 'May', total, 0)) AS 'May',
    SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
    SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
    SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
    SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
    SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
    SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
    SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
    FROM (
SELECT DATE_FORMAT(created_date, '%b') AS month, count(doc_id) as total
FROM doctor 
WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month)
GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub";
$result = mysqli_query($conn, $query);
$doctor = mysqli_fetch_row($result);

//data for created patient
$query1 = "SELECT 
SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
 SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
 SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
 SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
 SUM(IF(month = 'May', total, 0)) AS 'May',
 SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
 SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
 SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
 SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
 SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
 SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
 SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
 FROM (
 SELECT DATE_FORMAT(created_date, '%b') AS month, count(patient_id) as total FROM patient WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub";
$result1 = mysqli_query($conn, $query1);
$patient = mysqli_fetch_row($result1);

//data for appointment

$query2 = "SELECT 
SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
 SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
 SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
 SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
 SUM(IF(month = 'May', total, 0)) AS 'May',
 SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
 SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
 SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
 SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
 SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
 SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
 SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
 FROM (
 SELECT DATE_FORMAT(created_date, '%b') AS month, count(app_id) as total FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub";

$result2 = mysqli_query($conn, $query2);
$appointment = mysqli_fetch_row($result2);


$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

$data['month'] = $month;
$data['total'] = $doctor;
$data['patient'] = $patient;
$data['appointment'] = $appointment;

echo json_encode($data);

?>