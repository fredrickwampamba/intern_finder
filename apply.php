<?php 
	include 'company/conn/conn.php';

	if (!empty($_GET['postID'])) {
		$postID = trim($_GET['postID']);
		$post_info = $conn->query("SELECT * FROM posts WHERE postID = '$postID' LIMIT 1")->fetch_assoc();
	}else{
		header("Location:/");
	}

	if (isset($_POST['apply'])) {
		$postID = trim($_GET['postID']);
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$university = $_POST['university'];
		$phone = $_POST['phone'];
		$submitteddate = date("Y-m-d");
		$appID = date('his').rand(0,10000).rand(1,9);
		$sql = "INSERT INTO `applicants`(`appID`, `postID`, `S_name`, `S_email`, `S_address`, `S_phone`, `S_university`, `submitteddate`) VALUES ('$appID', '$postID', '$fullname', '$email', '$address', '$phone', '$university', '$submitteddate')";
		if ($conn->query($sql)) {
			foreach($_FILES["docs"]["tmp_name"] as $key=>$tmp_name) {
	            $file_temp_name		=	$_FILES["docs"]["tmp_name"][$key];
	            $file_name 			=	$_FILES["docs"]["name"][$key];
	            mkdir("company/files/applications/".$appID."/");
	            $target_dir = "company/files/applications/".$appID."/";

				if (basename($file_name)) {
		        	$imgname = $file_name;
					$extension = end((explode('.', $file_name)));
					$extension1 = array('pdf','doc','docx');
					$filenameNew = md5(uniqid()).'.'.$extension;
					$target_file = $target_dir . $filenameNew;

					if (in_array($extension, $extension1)) {
						move_uploaded_file($file_temp_name, $target_file);
						$full_url = "http://app.sallytraders.com/".$target_file;
						$conn->query("INSERT INTO app_docs(appID,doc_link) VALUES('$appID', '$full_url')");
					}
		        }

	        }


	        $subject = "Application Received";

          /*html for the email*/
            $html = "
            <html>
            <head>
              <title>$subject</title>
            </head>
            <body>
              <p>Your application has been received, we shall get back to you shortly</p>
            </body>
            </html>
            ";
          /*To send HTML mail, the Content-type header must be set*/
          $headers[] = 'MIME-Version: 1.0';
          $headers[] = 'Content-type: text/html; charset=iso-8859-1';
          /*Additional headers
          @change ::-> please change the from header to the current domain name, or default emailing address for the website

          uncomment the mail line to permit emailing to happen*/
          $headers[] = 'From: Intern Masters <no-reply@bdt.net>';

          mail($email, $subject, $html, implode("\r\n", $headers));

        	$error = "<div class='bg-success text-white'>Application Recieved</div>";
		}else{
			$error = "<div class='bg-danger text-white'>Submission Failed</div>";
		}
	}
 ?>
<html lang="en">
  <head>
    <title>Apply For Internship</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="company/css/bootstrap.min.css">
    <script src="company/js/jquery.min.js"></script>
    <script src="company/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="company/css/style.css">

  </head>
  <body>

  <div class="container">
    
    <div class="col-md-12 row">
      <h2 class="pl-10 text-center">Apply For Internship - <?php echo $post_info['name']; ?></h2>

      <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Full Name: </label>
              <input type="text" class="form-control" name="name" required="">
            </div>
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email" required="">
            </div>
            <div class="form-group">
              <label for="date">Address: </label>
              <input type="address" class="form-control" name="address" required="">
            </div>
            <div class="form-group">
              <label for="pwd">University: </label>
              <select name="University" required class="form-control">
              	<option value="" selected="">Choose</option>
                <?php 
                	$fetchSQl = $conn->query("SELECT * FROM university WHERE deleted = 0");
                	while ($uni = $fetchSQl->fetch_assoc()) {
                ?>
                	<option value="<?php echo $uni["name"]. " -- ".$uni["location"]  ?>"><?php echo $uni["name"]. " -- ".$uni["location"]; ?></option>
                <?php
                	}
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="date">Phone:</label>
              <input type="phone" class="form-control" name="phone" required="">
            </div>

            <div class="form-group">
              <label for="date">Documents: <small class="text-danger">PDFs and Microsoft Word Docs Only</small></label>
              <input type="file" multiple="" class="form-control" name="docs[]" accept=".docx, .doc, .pdf" required="">
            </div>

            <div class="form-group col-md-6 pt-4">
              <label>&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="apply">Apply</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>