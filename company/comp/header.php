<?php 
  session_start();

  if (!isset($_SESSION['CID'])) {
    echo '<script type="text/javascript">window.location="index.php";</script>';
  }
  $title = ucwords(str_replace('_', ' ', str_replace('-', ' ', basename($_SERVER['SCRIPT_FILENAME'], '.php'))));
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title><?php echo $title; ?></title>
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
      <h2 class="pl-10 text-center"><?php echo $title; ?> - Company Panel</h2>
      <div class="col-md-3">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-post.php">Add Internship Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts.php">View Internship Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="company.php">Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>