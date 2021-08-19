<?php 
	include 'conn.php'; // connections to the database

	header('Content-Type: application/json'); //setting headers so that json data is returned

	$posts_array = array();

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$posts = $conn->query("SELECT *, company.name as company_name, posts.name as post_name FROM posts LEFT JOIN company ON posts.CID = company.CID WHERE posts.deleted!= 1 ORDER BY company.id DESC");
		while ($rows = $posts->fetch_assoc()) {
			unset($rows['name']); //removing the name from the rows array
			unset($rows['deleted']); //removing the deleted from the rows array
			unset($rows['deleteddate']); //removing the deleteddate from the rows array
			unset($rows['password']); //removing the password from the rows array
			$rows['company_logo'] = "https://".$_SERVER['SERVER_NAME']."/".$rows['logo'];
			unset($rows['logo']); //removing the logo from the rows array
			unset($rows['updated']); //removing the updated from the rows array
			unset($rows['id']); //removing the id from the rows array
			$rows['documents'] = explode(',', $rows['docs']);
			unset($rows['docs']); //removing the deleted from the rows array
			array_push($posts_array, $rows);
		}

		echo json_encode(array("posts"=>$posts_array, "response"=>true));
	}else{
		echo json_encode(array("response"=>false, "message"=>"Invalid Request"));
	}
 ?>