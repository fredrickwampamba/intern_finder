<?php 
  error_reporting(0);
  session_start();

    if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location="index.php";</script>';
    }

    $conn = new mysqli("localhost", "root", "", "amir");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    /*==================================Daily Data=============================*/
    $today = date('Y-m-d');
    $monthlySql = "SELECT * FROM customers WHERE submitteddate = '$today'";
    $performMonthly = $conn->query($monthlySql);
    $xD = $yD = array();
    while ($rows = $performMonthly->fetch_assoc()) {
      $xD[] = $rows['productPrice'];
      $yD[] = $rows['amount'];
      $balanceD[] = $rows['balance'];
    }
    /*==================================Daily Data=============================*/

    /*==================================Weekly Data=============================*/
    $my_date = date('Y-m-d'); 
    $week = date("W", strtotime($my_date)); // get week
    $year =    date("Y", strtotime($my_date)); // get year

    $first_date =  date('Y-m-d',strtotime($year."W".$week)); //first date 
    $xW = $yW = array();

    for($i=0 ;$i<=6; $i++) {
      $day = date("Y-m-d",strtotime("+ {$i} day", strtotime($first_date)));

      $weekDays = "SELECT SUM(productPrice) as productPrice, SUM(amount) as amount, SUM(balance) as balance FROM customers WHERE submitteddate = '$day'";
      $weekData = $conn->query($weekDays)->fetch_assoc();

      $xW[] = $weekData['productPrice'];
      $yW[] = $weekData['amount'];
      $balanceW[] = $weekData['balance'];

    }
    /*===========================================================================*/

    /*==================================Monthly Data=============================*/
    $first_date =  date('Y-m-01'); //first date in month
    $xM = $yM = array();

    for($i=0 ;$i<=(date('t')-1); $i++) {
      $day = date("Y-m-d",strtotime("+ {$i} day", strtotime($first_date)));

      $monthDays = "SELECT SUM(productPrice) as productPrice, SUM(amount) as amount, SUM(balance) as balance FROM customers WHERE submitteddate = '$day'";
      $monthData = $conn->query($monthDays)->fetch_assoc();

      $xM[] = $monthData['productPrice'];
      $yM[] = $monthData['amount'];
      $balanceM[] = $monthData['balance'];

      // $performMonthly = $conn->query($monthlySql);
    }
    /*===========================================================================*/

    /**
     * linear regression function
     * @param $x array x-coords
     * @param $y array y-coords
     * @returns array() m=>slope, b=>intercept
     */
    function linear_regression($x, $y) {

      // calculate number points
      $n = count($x);
      
      // ensure both arrays of points are the same size
      if ($n != count($y)) {

        trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
      
      }

      // calculate sums
      $x_sum = array_sum($x);
      $y_sum = array_sum($y);

      $xx_sum = 0;
      $xy_sum = 0;
      
      for($i = 0; $i < $n; $i++) {
      
        $xy_sum+=($x[$i]*$y[$i]);
        $xx_sum+=($x[$i]*$x[$i]);
        
      }
      
      // calculate slope
      // $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));
      $divisor = (($n * $xx_sum) - ($x_sum * $x_sum));
      if ($divisor == 0){
        $m = 0;
      }else{
        $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / $divisor;
      }
      // calculate intercept
      $b = ($y_sum - ($m * $x_sum)) / $n;
        
      // return result
      // return array("Y"=>$m, "X"=>$b);

      echo "Eqn:  &nbsp;y = ". round($m,4) ." + (". round($b, 4) .")x";

    }

 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href='project/index.css' rel=stylesheet>

  </head>
  <body>

  <div class="container">
    
    <div class="col-md-12 row">
      <h2 class="pl-10 text-center">Customer Registration System</h2>
      <div class="col-md-3">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-customer.php">Add Customer Info</a>
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
        <div class="row">

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Daily Linear Regresion</h4>
                <p class="card-text">Daily Analytics through linear regression to predict future, errors ignored</p>
                <p><b>Total Sales: <?php echo number_format(array_sum($yD)); ?></b></p>
                <p><b>Total Balance: <?php echo number_format(array_sum($balanceD)); ?></b></p>
                <p><b>Mean Sales: <?php echo number_format(array_sum($yD)/count($yD)); ?></b></p>
                <p><b>Mean Balance: <?php echo number_format(array_sum($balanceD)/count($balanceD)); ?></b></p>
                <span class="btn btn-success btn-block"><?php linear_regression($xD, $yD); ?></span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Weekly Linear Regresion</h4>
                <p class="card-text">Weekly Analytics through linear regression to predict future, errors ignored</p>
                <p><b>Total Sales: <?php echo number_format(array_sum($yW)); ?></b></p>
                <p><b>Total Balance: <?php echo number_format(array_sum($balanceW)); ?></b></p>
                <p><b>Mean Sales: <?php echo number_format(array_sum($yW)/count($yW)); ?></b></p>
                <p><b>Mean Balance: <?php echo number_format(array_sum($balanceW)/count($balanceW)); ?></b></p>
                <span class="btn btn-danger btn-block"><?php linear_regression($xW, $yW); ?></span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Monthly Linear Regresion</h4>
                <p class="card-text">Monthly Analytics through linear regression to predict future, errors ignored</p>
                <p><b>Total Sales: <?php echo number_format(array_sum($yM)); ?></b></p>
                <p><b>Total Balance: <?php echo number_format(array_sum($balanceM)); ?></b></p>
                <p><b>Mean Sales: <?php echo number_format(array_sum($yM)/count($yM)); ?></b></p>
                <p><b>Mean Balance: <?php echo number_format(array_sum($balanceM)/count($balanceM)); ?></b></p>
                <span class="btn btn-warning btn-block"><?php linear_regression($xM, $yM); ?></span>
              </div>
            </div>
          </div>

        </div>

        <div class="row col-md-12">
          <br>
          <div id='messageBanner' class='center message'>Enter the equation to draw graph!</div>
            <form class="center input" id=form>
              y =
              <input type="text" id="functionTextBox">
              <button type=submit>Draw Graph</button>
            </form>

            <div class="center">
              <canvas id="myCanvas" width="640" height="540"></canvas>
            </div>
        </div>
      </div>
    </div>

  </div>

  </body>

  <script src="project/equation.js"></script>
  <script src="project/grid.js"></script>
  <script src="project/index.js"></script>
</html>