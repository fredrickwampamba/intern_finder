<?php 
	include 'conn.php'; // connections to the database

	header('Content-Type: application/json'); //setting headers so that json data is returned

	$company_array = array();

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$companies = $conn->query("SELECT * FROM company WHERE deleted!= 1");
		while ($rows = $companies->fetch_assoc()) {
			unset($rows['password']); //removing the password from the rows array
			unset($rows['deleted']); //removing the deleted from the rows array
			unset($rows['deleteddate']); //removing the deleteddate from the rows array
			unset($rows['updated']); //removing the updated from the rows array
			unset($rows['id']); //removing the id from the rows array
			array_push($company_array, $rows);
		}

		echo json_encode(array("companies"=>$company_array, "response"=>true));
	}
 ?>