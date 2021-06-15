<?php 
	include 'conn.php'; // connections to the database

	header('Content-Type: application/json'); //setting headers so that json data is returned

	$posts_array = array();

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$postID = $_GET['postID'];

		if (!empty(trim($postID))) {
			$post = $conn->query("SELECT *, company.name as company_name, posts.name as post_name FROM posts LEFT JOIN company ON posts.CID = company.CID WHERE posts.deleted!= 1 AND postID = '$postID'")->fetch_assoc();
			unset($post['name']); //removing the name from the rows array
			unset($post['deleted']); //removing the deleted from the rows array
			unset($post['password']); //removing the password from the rows array
			unset($post['deleteddate']); //removing the deleteddate from the rows array
			$post['company_logo'] = "https://".$_SERVER['SERVER_NAME']."/company/files/".$post['logo'];
				unset($post['logo']); //removing the logo from the rows array
			unset($post['updated']); //removing the updated from the rows array
			unset($post['id']); //removing the id from the rows array
			$post['documents'] = explode(',', $post['docs']);
			unset($post['docs']); //removing the deleted from the rows array
			array_push($posts_array, $post);
			
			echo json_encode(array("post"=>$posts_array, "response"=>true));
		}else{
			echo json_encode(array("response"=>false, "message"=>"Empty Post"));
		}

	}else{
		echo json_encode(array("response"=>false, "message"=>"Invalid Request"));
	}
 ?>