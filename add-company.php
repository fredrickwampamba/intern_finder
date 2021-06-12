<?php 
    if (isset($_REQUEST['add-company'])) {
      
      $location = $_REQUEST['location'];
      $phone = $_REQUEST['phone'];
      $email = $_REQUEST['email'];
      $name = $_REQUEST['name'];
      $submitteddate = date("Y-m-d");
      $CID = strtoupper(substr($name, 0,3).rand(1000,9999));

      function rand_pass($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
      }

      $generated_password = rand_pass(8); //to be sent to the user through email

      include 'conn/conn.php';

      $sql = "INSERT INTO `company`(`CID`, `name`, `email`, `phone`, `location`, `submitteddate`) VALUES ('$CID','$name','$email','$phone','$location','$submitteddate')";
      if ($conn->query($sql)) {

        //do the email sending to the company email address
        $to = $email;

        /*Subject*/
        $subject = "Account Creation";

        /*Message*/

        $message = "Your account has been successfully created.
          <br>Email: ".$email."
          <br>Password: ".$generated_password."
          <br>Company Name: ".$name."
          <br>Phone: ".$phone_number."
          <br>Phone: ".$phone."
          <br>Thank you for using this service";

              /*html for the email*/
          $html = "
          <html>
          <head>
            <title>$subject</title>
          </head>
          <body>
            <h3>Account successfully created</h3>
            <p>$message</p>
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
        mail($to, $subject, $html, implode("\r\n", $headers));

        $conn->query("UPDATE company SET password = '$generated_password' WHERE CID = '$CID'");

        $error = "<div class='bg-success text-white'>Data saved successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>
<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Company Name:</label>
              <input type="text" class="form-control" placeholder="Enter company name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Phone:</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Location:</label>
              <input type="text" class="form-control" id="pwd" placeholder="Enter location" name="location" required="">
            </div>
            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="add-company">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>