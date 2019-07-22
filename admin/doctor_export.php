<?php  
include('includes/application_top.php');
$sql = "SELECT f_name, l_name, email, designation, department, address, specialist, mobile, short_bio, dob, blood_group, sex, created_date FROM doctor";
  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "First Name" . "\t" . "Last Name" . "\t" . "Email" . "\t" . "Designation" . "\t" . "Department" . "\t" . "Address" . "\t" . "Specialist" . "\t" . "Mobile" . "\t" . "Short Biography" . "\t" . "Date of Birth" . "\t" . "Blood Group" . "\t" . "Sex" . "\t" . "Created Date";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}    
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Doctors_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
