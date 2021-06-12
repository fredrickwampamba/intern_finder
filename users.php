<?php 
  error_reporting(0);
  session_start();
  
  if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Users</title>
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
        <?php 
          $conn = new mysqli("localhost", "root", "", "amir");

          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          if (isset($_REQUEST['user'])) {
            $userID = $_REQUEST['user'];
            $conn->query("DELETE FROM users WHERE userID = '$userID'");
            echo $error = "<div class='bg-success text-white'>User deleted successfully</div>";
          }
         ?>
         <div class="text-right"><a href="add-user.php">Add User</a></div>
        <div class="table-responsive">
          <table class="table">
            <caption>List of customers and related information</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">UserID</th>
                <th scope="col">Username</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['userID']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><a href="?user=<?php echo $row['userID']; ?>" title="Delete">Delete</a></td>
              </tr>
              <?php
                  $i++;
                }
               ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  </body>
</html>