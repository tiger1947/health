<?php  
include('includes/application_top.php');
$sql = "SELECT fname, lname, mobile, dob, blood_group, sex, address, created_date FROM patient";



  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "First Name" . "\t" . "Last Name" . "\t" . "Mobile" . "\t" . "Date of Birth" . "\t" . "Blood Group" . "\t" . "Sex" . "\t" . "Address" . "\t" . "Created Date";  
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
header("Content-Disposition: attachment; filename=Patients_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
