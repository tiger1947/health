<?php
include_once('../includes/application_top.php');
include_once('../class/search.php');

$search = new Search_information();


if($_REQUEST['action']=="search_list")
{

		if(isset($_POST['search'])){
			$searchq = $_POST['search'];
		}

		// Generate skills data array
		$list_information = array();

		//if(count($value) > 0)
		foreach($query as $value) 
		{
			$data['user_id'] = $value['user_id'];
			$data['value'] = $value['fullname'];
			array_push($list_information, $data);
		}

		// Return results as json encoded array
		echo json_encode($list_information);
		
		

		/* $fullname = $_POST['fullname'];
		$city = $_POST['city'];

		$result = $search->search_information($fullname, $city);

		if(count($result) > 0)
		{
			//setting the session value for user
			$_SESSION['user_id'] = $result['user_id'];
			$_SESSION['fullname'] = $result['fullname'];
			$_SESSION['city'] = $result['city'];

			echo "success";
		} */
}
?>