<?php include 'comp/header.php'; ?>

<?php 
    if (isset($_REQUEST['add-post'])) {
      
      $docs = implode(',', $_REQUEST['docs']);
      $start = $_REQUEST['start'];
      $end = $_REQUEST['end'];
      $name = $_REQUEST['name'];
      $ac_years = $_REQUEST['ac_years'];
      $applicants = $_REQUEST['applicants'];
      $intern_type = $_REQUEST['intern_type'];
      $certification = $_REQUEST['certification'];
      $CID = $_SESSION['CID'];
      $submitteddate = date("Y-m-d");
      $postID = strtoupper(substr($name, 0,3).rand(1000,9999));

      include 'conn/conn.php';

      $sql = "INSERT INTO `posts`(`postID`, `docs`, `name`, `CID`, `start`, `end`, `ac_years`, `applicants`, `intern_type`, `certification`, `submitteddate`) VALUES ('$postID','$docs','$name','$CID','$start','$end','$ac_years','$applicants','$intern_type','$certification','$submitteddate')";
      if ($conn->query($sql)) {

        $error = "<div class='bg-success text-white'>Data Saved successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>

      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Post Name:</label>
              <input type="text" class="form-control" placeholder="Enter post name" name="name"required="">
            </div>
            <div class="form-group">
              <label for="email">(Internship) From:</label>
              <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" name="start" required="">
            </div>
            <div class="form-group">
              <label for="date">(Internship) To:</label>
              <input type="date" class="form-control" id="phone" min="<?php echo date('Y-m-d'); ?>" name="end" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Required Documents: <small class="text-danger">Press & Hold Control to select multiple</small></label>
              <select name="docs[]" multiple required class="form-control">
                <option value="Introduction Letter">Introduction Letter</option>
                <option value="UCE">UCE</option>
                <option value="UACE">UACE</option>
                <option value="Circulum Vitae">Circulum Vitae</option>
                <option value="Previous perfomance / results">Previous perfomance / results</option>
              </select>
            </div>

            <div class="form-group">
              <label for="pwd">Accepted Years:</label>
              <select name="ac_years" required class="form-control">
                <option value="">Choose</option>
                <option value="Any">Any</option>
                <option value="Year I or greater">Year I or greater</option>
                <option value="Year II or greater">Year II or greater</option>
                <option value="Year III or greater">Year III or greater</option>
                <option value="Year IV or greater">Year IV or greater</option>
                <option value="Year V or greater">Year V or greater</option>
              </select>
            </div>

            <div class="form-group">
              <label for="date">Number of Applicants:</label>
              <input type="number" class="form-control" min="1" name="applicants" placeholder="Enter number of applicants" required="">
            </div>

            <div class="form-group">
              <label for="pwd">Internship type:</label>
              <select name="intern_type" required class="form-control">
                <option value="">Choose</option>
                <option value="Free">Free</option>
                <option value="Pay to intern">Pay to intern</option>
              </select>
            </div>

            <div class="form-group">
              <label for="pwd">Certification:</label>
              <select name="certification" required class="form-control">
                <option value="">Choose</option>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>

            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="add-post">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>