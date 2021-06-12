<?php 
  error_reporting(0);
  session_start();

    if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }

    if (isset($_REQUEST['add-user'])) {
      
      $password = $_REQUEST['password'];
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $userID = strtoupper(substr($username, 0,3).rand(1000,9999));

      $conn = new mysqli("localhost", "root", "", "amir");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "INSERT INTO `users`(`username`, `email`, `password`, `userID`) VALUES ('$username','$email','$password','$userID')";
      if ($conn->query($sql)) {
        $error = "<div class='bg-success text-white'>Data saved successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Add User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

  <div class="container">
    
    <div class="col-md-12 row">
      <h2 class="pl-10 text-center">Customer Registration System</h2>
      <div class="col-md-3">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-customer.php">Add Customer Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view-customer.php">View Customer Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Username:</label>
              <input type="text" class="form-control" placeholder="Enter username" name="username" required="">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required="">
            </div>
            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="add-user">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>