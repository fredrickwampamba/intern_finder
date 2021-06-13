<?php include 'comp/header.php'; ?>

<?php 
    if (isset($_REQUEST['send-email'])) {
      
      $CID = $_SESSION['CID'];

      include 'conn/conn.php';

      $links_array = array(); // array to store the links for the attachments

      /*file upload*/
      foreach ($_FILES["file"]["name"] as $key => $value) {

        $filetmp = $_FILES["file"]["tmp_name"][$key];
        $filename = $_FILES["file"]["name"][$key];
        $extension = end((explode(".", $filename)));
        $target_file = "files/attachments/" . md5(date('R')).".".$extension;

        if (move_uploaded_file($filetmp, $target_file)) {

          $links_array[] = "https://".$_SERVER['HTTP_HOST']."/company/".$target_file;
          
        }

      }

      //do the email sending to the company email address
      $email = $_REQUEST['email'];
      $to = $email;

      /*Subject*/
      $subject = $_REQUEST['subject'];

      /*Message*/

      $messageForm = $_REQUEST['message'];
      $message = $messageForm."
        <br>Thank you for using this service";

            /*html for the email*/
        $html = "
        <html>
        <head>
          <title>$subject</title>
        </head>
        <body>
          <h3>Response</h3>
          <p>$message</p>
          <p>Check the links below for attachments <br>".implode("<br>", $links_array)."</p>
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
      
      if (mail($to, $subject, $html, implode("\r\n", $headers))) {
        $error = "<div class='bg-success text-white'>Email sent successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Email sending failed</div>";
      }

    }
 ?>

  <?php 
      include 'conn/conn.php';

        $CID = $_SESSION['CID'];
        if (empty($_REQUEST['post']) && empty($_REQUEST['app'])) {
          echo '<script type="text/javascript">window.location="dashboard.php";</script>';
        }
        $postID = $_REQUEST['post'];
        $appID = $_REQUEST['app'];
        $po_info = $conn->query("SELECT * FROM applicants LEFT JOIN posts on posts.postID = applicants.postID WHERE appID = '$appID' LIMIT 1")->fetch_assoc();
        
     ?>

      <div class="col-md-9">
        <center><img src="<?php echo $co_info['logo'] ?>" style="border-radius: 100%; width: 100px; margin-bottom: 20px;"></center>
        <form method="POST" enctype="multipart/form-data">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Email To:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $po_info['S_email']; ?>" name="email" required="" readonly>
            </div>
            <div class="form-group">
              <label for="email">Subject:</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter subject" value="Response to Internship at <?php echo $po_info['name']; ?>" name="subject" required="">
            </div>

            <div class="form-group">
              <label for="pwd">Message:</label>
              <textarea class="form-control" placeholder="Enter Message here" name="message" rows="10" required=""></textarea>
            </div>

            <div class="form-group">
              <label for="pwd">File Attachments:</label>
              <input type="file" class="form-control" name="files" multiple="" accept="image/*">
            </div>

            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="send-email">Send Email</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>