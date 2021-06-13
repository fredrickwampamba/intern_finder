<?php include 'comp/header.php'; ?>

<?php 
    if (isset($_REQUEST['update-company'])) {
      
      $location = $_REQUEST['location'];
      $phone = $_REQUEST['phone'];
      $email = $_REQUEST['email'];
      $name = $_REQUEST['name'];
      $submitteddate = date("Y-m-d");
      $CID = $_SESSION['CID'];

      include 'conn/conn.php';

      /*file upload*/
      if (file_exists($_FILES['logo']['tmp_name']) || is_uploaded_file($_FILES['logo']['tmp_name'])) {
        $filetmp = $_FILES["logo"]["tmp_name"];
        $filename = $_FILES["logo"]["name"];
        $extension = end((explode(".", $filename)));
        $target_file = "logos/" . md5(date('R')).".".$extension;
        if (move_uploaded_file($filetmp, $target_file)) {
          unlink($conn->query("SELECT * FROM company WHERE CID = '$CID' LIMIT 1")->fetch_assoc()['logo']); // deleting old photo

          $sql = $conn->query("UPDATE company SET logo = '$target_file' WHERE CID = '$CID'");
          # code...
        echo "string";
        }

      }

      $sql = "UPDATE company SET name = '$name', phone = '$phone', email = '$email', location = '$location' WHERE CID = '$CID'";
      if ($conn->query($sql)) {
        $error = "<div class='bg-success text-white'>Data Updated successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>

  <?php 
      include 'conn/conn.php';

        $CID = $_SESSION['CID'];
        $co_info = $conn->query("SELECT * FROM company WHERE CID = '$CID' LIMIT 1")->fetch_assoc();
        
     ?>

      <div class="col-md-9">
        <form method="POST" enctype="multipart/form-data">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Company Name:</label>
              <input type="text" class="form-control" placeholder="Enter company name" name="name" value="<?php echo $co_info['name']; ?>" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $co_info['email']; ?>" name="email" required="">
            </div>
            <div class="form-group">
              <label for="email">Contact Phone:</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" value="<?php echo $co_info['phone']; ?>" name="phone" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Location:</label>
              <input type="text" class="form-control" id="pwd" placeholder="Enter location" value="<?php echo $co_info['location']; ?>" name="location" required="">
            </div>

            <div class="form-group">
              <label for="pwd">Company Logo:</label>
              <input type="file" class="form-control" name="logo" required="" accept="image/*">
            </div>

            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="update-company">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>