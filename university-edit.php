<?php 
    if (isset($_REQUEST['update-university'])) {
      
      $location = $_REQUEST['location'];
      $email = $_REQUEST['email'];
      $name = $_REQUEST['name'];
      $submitteddate = date("Y-m-d");
      $UID = $_REQUEST['uni'];

      include 'conn/conn.php';

      $sql = "UPDATE `university` SET `name`='$name',`email`='$email',`location`='$location' WHERE UID = '$UID'";
      if ($conn->query($sql)) {
        $error = "<div class='bg-success text-white'>Data updated successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>
<?php include 'comp/header.php'; ?>
      
    <?php 
      include 'conn/conn.php';

      if (empty($_REQUEST['uni'])) {
        echo '<script type="text/javascript">window.location="university.php";</script>';
      }
        $UID = $_REQUEST['uni'];
        $uni_info = $conn->query("SELECT * FROM university WHERE UID = '$UID' LIMIT 1")->fetch_assoc();
     ?>

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">University Name:</label>
              <input type="text" class="form-control" placeholder="Enter university name" name="name" value="<?php echo $uni_info['name'] ?>" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $uni_info['email'] ?>" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Location:</label>
              <input type="text" class="form-control" id="pwd" placeholder="Enter location" name="location" value="<?php echo $uni_info['location'] ?>" required="">
            </div>
            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="update-university">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>