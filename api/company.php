<?php 
	include 'conn.php'; // connections to the database

	header('Content-Type: application/json'); //setting headers so that json data is returned

	$company = array();

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$companyID = $_GET['companyID'];

		if (!empty(trim($companyID))) {
			$company_details = $conn->query("SELECT * FROM company WHERE deleted!= 1 AND CID = '$companyID'")->fetch_assoc();
			// unset($post['name']); //removing the name from the rows array
			unset($company_details['deleted']); //removing the deleted from the rows array
			unset($company_details['password']); //removing the password from the rows array
			unset($company_details['deleteddate']); //removing the deleteddate from the rows array
			$company_details['company_logo'] = "https://".$_SERVER['SERVER_NAME']."/company/files/".$company_details['logo'];
				unset($company_details['logo']); //removing the logo from the rows array
			unset($company_details['updated']); //removing the updated from the rows array
			unset($company_details['id']); //removing the id from the rows array
			// $post['documents'] = explode(',', $post['docs']);
			// unset($post['docs']); //removing the deleted from the rows array
			array_push($company, $company_details);

			/*getting the posts attached to the company*/
			$posts_array = array();

			$posts = $conn->query("SELECT *, company.name as company_name, posts.name as post_name FROM posts LEFT JOIN company ON posts.CID = company.CID WHERE posts.deleted!= 1 AND posts.CID  = '$companyID' ORDER BY company.id DESC");
			while ($rows = $posts->fetch_assoc()) {
				unset($rows['name']); //removing the name from the rows array
				unset($rows['deleted']); //removing the deleted from the rows array
				unset($rows['deleteddate']); //removing the deleteddate from the rows array
				unset($rows['password']); //removing the password from the rows array
				$rows['company_logo'] = "https://".$_SERVER['SERVER_NAME']."/company/files/".$rows['logo'];
				unset($rows['logo']); //removing the logo from the rows array
				unset($rows['updated']); //removing the updated from the rows array
				unset($rows['id']); //removing the id from the rows array
				$rows['documents'] = explode(',', $rows['docs']);
				unset($rows['docs']); //removing the deleted from the rows array
				array_push($posts_array, $rows);
			}

		/*ending the getting of the posts attached to the company*/
			
			echo json_encode(array("company"=>$company, "response"=>true, "posts"=>$posts_array));
		}else{
			echo json_encode(array("response"=>false, "message"=>"Empty Company"));
		}

	}else{
		echo json_encode(array("response"=>false, "message"=>"Invalid Request"));
	}
 ?>