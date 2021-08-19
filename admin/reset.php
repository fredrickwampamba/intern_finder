<?php 
  error_reporting(0);
  session_start();

  if (isset($_SESSION['userID'])) {
    echo '<script type="text/javascript">window.location="dashboard.php";</script>';
  }

  
  if (isset($_REQUEST['reset-pass'])) {

      function rand_pass($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
      }

      $generated_password = rand_pass(8); //to be sent to the user through email

    //do the email sending to the company email address
      $email = $_REQUEST['email'];

      include 'conn/conn.php';

      if ($conn->query("SELECT *FROM users WHERE email = '$email'")->num_rows > 0) {
          
          $to = $email;
        /*Subject*/
          $subject = $_REQUEST['subject'];

          /*html for the email*/
            $html = "
            <html>
            <head>
              <title>$subject</title>
            </head>
            <body>
              <h3>Password Reset</h3>
              <p>New password ".$generated_password."</p>
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


        $sql = "UPDATE users SET password = '$generated_password' WHERE email = '$email'";
        if ($conn->query($sql)) {
          $error = "<div class='bg-success text-success'>Check your email</div>";
        }else{
          $error = "<div class='bg-danger text-danger'>Your login Details are Invalid</div>";
        }
      }else{
        $error = "<div class='bg-danger text-danger'>Account not found</div>";
      }
  }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Admin Password Reset</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

  <div class="container" style="padding: 10% 30%;">
    <h2>Password Reset</h2>
    <?php echo $error; ?>
    <form method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
      </div>
      <button type="submit" name="reset-pass" class="btn btn-success">Reset</button>
      <span class="text-right"><a href="index.php">Login</a></span>
    </form>
  </div>

  </body>
</html>