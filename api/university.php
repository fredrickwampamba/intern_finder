<?php 
	include 'conn.php'; // connections to the database

	header('Content-Type: application/json'); //setting headers so that json data is returned

	$university_array = array();

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$universities = $conn->query("SELECT * FROM university WHERE deleted!= 1 ORDER BY name");
		while ($rows = $universities->fetch_assoc()) {
			unset($rows['deleted']); //removing the deleted from the rows array
			unset($rows['deleteddate']); //removing the deleteddate from the rows array
			unset($rows['updated']); //removing the updated from the rows array
			unset($rows['id']); //removing the id from the rows array
			array_push($university_array, $rows);
		}

		echo json_encode(array("universities"=>$university_array, "response"=>true));
	}else{
		echo json_encode(array("response"=>false, "message"=>"Invalid Request"));
	}
 ?>