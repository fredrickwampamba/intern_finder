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
    <title>View Customer</title>
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
        <ul class="nav" style="display: flex;">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-customer.php">Add Customer Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="view-customer.php">View Customer Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>

      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
            <caption>List of customers and related information</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Product</th>
                <th scope="col">Amount</th>
                <th scope="col">Balance</th>
                <th scope="col">Picking Date</th>
                <th scope="col">Picking Time</th>
                <th scope="col">Seller</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Submitted Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $conn = new mysqli("localhost", "root", "", "amir");

              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $conn->query("DELETE FROM customers WHERE id = '$id'");
                echo $error = "<div class='bg-success text-white'>User deleted successfully</div>";
              }

              $sql = "SELECT * FROM customers LIMIT 500";
              $result = $conn->query($sql);
              $i = 1;
              while ($row = $result->fetch_assoc()) {

             ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['customerName']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['customerContact']; ?></td>
                <td><?php echo $row['productName']; ?></td>
                <td><?php echo number_format($row['amount']); ?></td>
                <td><?php echo number_format($row['balance']); ?></td>
                <td><?php echo $row['pickingDate']; ?></td>
                <td><?php echo $row['pickingTime']; ?></td>
                <td><?php echo $row['sellerName']; ?></td>
                <td><?php echo $row['arrivalDate']; ?></td>
                <td><?php echo $row['arrivalTime']; ?></td>
                <td><?php echo $row['submitteddate']; ?></td>
                <td>
                  <a href="customer_edit.php?id=<?php echo $row['id']; ?>" title="Edit">Edit</a>
                  <a href="?id=<?php echo $row['id']; ?>" title="Delete">Delete</a>
                </td>
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