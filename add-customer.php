<?php 
  error_reporting(0);
  session_start();

    if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }

    if (isset($_REQUEST['add-customer'])) {
      
      $customerName = $_REQUEST['customerName'];
      $address = $_REQUEST['address'];
      $gender = $_REQUEST['gender'];
      $customerContact = $_REQUEST['customerContact'];
      $pickingDate = $_REQUEST['pickingDate'];
      $pickingTime = $_REQUEST['pickingTime'];
      $sellerName = $_REQUEST['sellerName'];
      $productName = $_REQUEST['productName'];
      $productPrice = $_REQUEST['productPrice'];
      $arrivalDate = $_REQUEST['arrivalDate'];
      $arrivalTime = $_REQUEST['arrivalTime'];
      $amount = $_REQUEST['amount'];
      $balance = $_REQUEST['balance'];
      $submitteddate = date('Y-m-d');
      $month = date('m');
      $year = date('Y');
      $time = date('his');

      $conn = new mysqli("localhost", "root", "", "amir");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "INSERT INTO `customers`(`customerName`, `address`, `gender`, `customerContact`, `pickingDate`, `pickingTime`, `sellerName`, `productName`, `amount`, `balance`, `productPrice`, `arrivalDate`, `arrivalTime`, `year`, `month`, `submitteddate`, `submittedtime`) VALUES ('$customerName','$address','$gender','$customerContact','$pickingDate','$pickingTime','$sellerName','$productName','$amount','$balance','$productPrice','$arrivalDate','$arrivalTime','$year','$month','$submitteddate','$time')";
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
    <title>Add Customer</title>
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
            <a class="nav-link active" href="add-customer.php">Add Customer Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view-customer.php">View Customer Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
          <div class="form-group col-md-6">
            <label for="inputCustomerName">Customer Name</label>
            <input type="text" name="customerName" class="form-control" placeholder="Customer Name" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Customer Contact</label>
            <input type="text" name="customerContact" class="form-control" id="inputAddress" placeholder="Customer Contact" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Gender</label>
            <select id="inputState" name="gender" class="form-control" required="">
              <option selected disabled value="">Choose...</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Arrival Date</label>
            <input type="date" name="arrivalDate" class="form-control" id="inputAddress2" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Arrival Time(24 Hours)</label>
            <input type="time" name="arrivalTime" class="form-control" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Product Name</label>
            <input type="text" name="productName" class="form-control" placeholder="Product Name" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Product Price</label>
            <input type="number" name="productPrice" class="form-control" placeholder="Product Price" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Amount Paid</label>
            <input type="number" name="amount" class="form-control" placeholder="Amount Paid" min="0" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Balance</label>
            <input type="number" name="balance" class="form-control" placeholder="Balance" min="0" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Picking Date</label>
            <input type="date" name="pickingDate" class="form-control" id="inputAddress2" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Picking Time(24 Hours)</label>
            <input type="time" name="pickingTime" class="form-control" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Seller's Name</label>
            <input type="text" name="sellerName" class="form-control" placeholder="Seller's Name" required="">
          </div>
          <div class="form-group col-md-6 pt-4">
            <label for="inputCity">&nbsp;</label><br>
            <button type="submit" class="btn btn-success btn-block" name="add-customer">Submit</button>
          </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>