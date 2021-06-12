<?php 
    if (isset($_REQUEST['add-user'])) {
      
      $password = $_REQUEST['password'];
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $userID = strtoupper(substr($username, 0,3).rand(1000,9999));

      include 'conn/conn.php';

      $sql = "INSERT INTO `users`(`username`, `email`, `password`, `userID`) VALUES ('$username','$email','$password','$userID')";
      if ($conn->query($sql)) {
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