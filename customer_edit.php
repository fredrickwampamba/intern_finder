<?php 
  error_reporting(0);
  session_start();

    if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }

    if (isset($_REQUEST['edit-customer'])) {
      
      $customerName = $_REQUEST['customerName'];
      $id = $_REQUEST['id'];
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

      $conn = new mysqli("localhost", "root", "", "amir");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "UPDATE customers SET amount = '$amount', balance = '$balance' WHERE id = '$id'";
      if ($conn->query($sql)) {
        $error = "<div class='bg-success text-white'>Data Updated successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not updated</div>";
      }

    }

    if (isset($_REQUEST['id'])) {

      $customerID = $_REQUEST['id'];

      $conn = new mysqli("localhost", "root", "", "amir");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $customerInfo = $conn->query("SELECT * FROM customers WHERE id = '$customerID'")->fetch_assoc();
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

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
          <div class="form-group col-md-6">
            <label for="inputCustomerName">Customer Name</label>
            <input type="text" name="customerName" class="form-control" value="<?php echo $customerInfo['customerName']; ?>" placeholder="Customer Name" required="" readonly>
            <input type="hidden" name="id" class="form-control" value="<?php echo $customerInfo['id']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $customerInfo['customerName']; ?>" placeholder="Address" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Customer Contact</label>
            <input type="text" name="customerContact" class="form-control" value="<?php echo $customerInfo['customerContact']; ?>" id="inputAddress" placeholder="Customer Contact" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Gender</label>
            <select id="inputState" name="gender" class="form-control" required="" readonly>
              <option selected disabled value="">Choose...</option>
              <option value="Male" <?php if ($customerInfo['gender'] == "Male") {echo "selected";} ?>>Male</option>
              <option value="Female" <?php if ($customerInfo['gender'] == "Female") {echo "selected";} ?>>Female</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Arrival Date</label>
            <input type="date" name="arrivalDate" class="form-control" value="<?php echo $customerInfo['arrivalDate']; ?>" id="inputAddress2" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Arrival Time(24 Hours)</label>
            <input type="time" name="arrivalTime" class="form-control" value="<?php echo $customerInfo['arrivalTime']; ?>" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Product Name</label>
            <input type="text" name="productName" class="form-control" value="<?php echo $customerInfo['productName']; ?>" placeholder="Product Name" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Product Price</label>
            <input type="number" name="productPrice" class="form-control" value="<?php echo $customerInfo['productPrice']; ?>" placeholder="Product Price" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Amount Paid</label>
            <input type="number" name="amount" class="form-control" value="<?php echo $customerInfo['amount']; ?>" placeholder="Amount Paid" min="0" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Balance</label>
            <input type="number" name="balance" class="form-control" value="<?php echo $customerInfo['balance']; ?>" placeholder="Balance" min="0" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Picking Date</label>
            <input type="date" name="pickingDate" class="form-control" value="<?php echo $customerInfo['pickingDate']; ?>" id="inputAddress2" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Picking Time(24 Hours)</label>
            <input type="time" name="pickingTime" class="form-control" value="<?php echo $customerInfo['pickingTime']; ?>" required="" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Seller's Name</label>
            <input type="text" name="sellerName" class="form-control" value="<?php echo $customerInfo['sellerName']; ?>" placeholder="Seller's Name" required="" readonly>
          </div>
          <div class="form-group col-md-6 pt-4">
            <label for="inputCity">&nbsp;</label><br>
            <button type="submit" class="btn btn-success btn-block" name="edit-customer">Submit</button>
          </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>