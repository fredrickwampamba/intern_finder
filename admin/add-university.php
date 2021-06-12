<?php 
    if (isset($_REQUEST['add-university'])) {
      
      $location = $_REQUEST['location'];
      $email = $_REQUEST['email'];
      $name = $_REQUEST['name'];
      $submitteddate = date("Y-m-d");
      $UID = strtoupper(substr($name, 0,3).rand(1000,9999));

      include 'conn/conn.php';

      $sql = "INSERT INTO `university`(`UID`, `name`, `email`, `location`, `submitteddate`) VALUES ('$UID','$name','$email','$location','$submitteddate')";
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
              <label for="email">University Name:</label>
              <input type="text" class="form-control" placeholder="Enter university name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Location:</label>
              <input type="text" class="form-control" id="pwd" placeholder="Enter location" name="location" required="">
            </div>
            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="add-university">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>