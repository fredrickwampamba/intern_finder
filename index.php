<?php 
  error_reporting(0);
  session_start();
  if (isset($_REQUEST['submit'])) {
    
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $conn = new mysqli("localhost", "root", "", "amir");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $_SESSION['email'] = $email;
      header('Location:dashboard.php');
    }else{
      $error = "<div class='text-danger'>Your login Details are Invalid</div>";
    }
  }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Customer Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

  <div class="container" style="padding: 10% 30%;">
    <h2>Login Form</h2>
    <?php echo $error; ?>
    <form method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required="">
      </div>
      <button type="submit" name="submit" class="btn btn-success">Login</button>
    </form>
  </div>

  </body>
</html>