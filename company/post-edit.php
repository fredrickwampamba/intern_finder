<?php include 'comp/header.php'; ?>

<?php 
    if (isset($_REQUEST['update-post'])) {
      
      $docs = implode(',', $_REQUEST['docs']);
      $start = $_REQUEST['start'];
      $end = $_REQUEST['end'];
      $name = $_REQUEST['name'];
      $ac_years = $_REQUEST['ac_years'];
      $applicants = $_REQUEST['applicants'];
      $intern_type = $_REQUEST['intern_type'];
      $certification = $_REQUEST['certification'];
      $description = addslashes($_REQUEST['description']);
      $CID = $_SESSION['CID'];
      $submitteddate = date("Y-m-d");
      $postID = $_REQUEST['po'];

      include 'conn/conn.php';

      $sql = "UPDATE posts SET description = '$description', docs = '$docs', start = '$start', `end` = '$end', name = '$name', ac_years = '$ac_years', applicants = '$applicants', intern_type = '$intern_type', certification = '$certification' WHERE postID = '$postID'";
      if ($conn->query($sql)) {

        $error = "<div class='bg-success text-white'>Data Updated successfully</div>";
      }else{
        $error = "<div class='bg-danger text-white'>Data not saved</div>";
      }

    }
 ?>


 <?php 
      include 'conn/conn.php';

      if (empty($_REQUEST['po'])) {
        echo '<script type="text/javascript">window.location="posts.php";</script>';
      }
        $postID = $_REQUEST['po'];
        $po_info = $conn->query("SELECT * FROM posts WHERE postID = '$postID' LIMIT 1")->fetch_assoc();
     ?>
      <div class="col-md-9">
        <form method="POST">
          <div class="text-center col-md-12"><?php echo $error; ?></div>
            <div class="form-group">
              <label for="email">Post Name:</label>
              <input type="text" class="form-control" placeholder="Enter post name" value="<?php echo $po_info['name']; ?>" name="name"required="">
            </div>
            <div class="form-group">
              <label for="email">(Internship) From:</label>
              <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $po_info['start']; ?>" name="start" required="">
            </div>
            <div class="form-group">
              <label for="date">(Internship) To:</label>
              <input type="date" class="form-control" id="phone" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $po_info['end']; ?>" name="end" required="">
            </div>
            <div class="form-group">
              <label for="pwd">Required Documents: <small class="text-danger">Press & Hold Control to select multiple</small></label>
              <?php $db_docs_arr = explode(",", $po_info['docs']); ?>
              <select name="docs[]" multiple required class="form-control">
                <option value="Introduction Letter" <?php if(in_array("Introduction Letter", $db_docs_arr)){echo "selected";} ?>>Introduction Letter</option>
                <option value="UCE" <?php if(in_array("UCE", $db_docs_arr)){echo "selected";} ?>>UCE</option>
                <option value="UACE" <?php if(in_array("UACE", $db_docs_arr)){echo "selected";} ?>>UACE</option>
                <option value="Circulum Vitae" <?php if(in_array("Circulum Vitae", $db_docs_arr)){echo "selected";} ?>>Circulum Vitae</option>
                <option value="Previous perfomance / results" <?php if(in_array("Previous perfomance / results", $db_docs_arr)){echo "selected";} ?>>Previous perfomance / results</option>
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
                <option value="<?php echo $po_info['ac_years']; ?>" selected><?php echo $po_info['ac_years']; ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="date">Number of Applicants:</label>
              <input type="number" class="form-control" min="1" value="<?php echo $po_info['applicants']; ?>" name="applicants" placeholder="Enter number of applicants" required="">
            </div>

            <div class="form-group">
              <label for="pwd">Internship type:</label>
              <select name="intern_type" required class="form-control">
                <option value="">Choose</option>
                <option value="Free">Free</option>
                <option value="Pay to intern">Pay to intern</option>
                <option value="<?php echo $po_info['intern_type']; ?>" selected><?php echo $po_info['intern_type']; ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="pwd">Certification:</label>
              <select name="certification" required class="form-control">
                <option value="">Choose</option>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
                <option value="<?php echo $po_info['certification']; ?>" selected><?php echo $po_info['certification']; ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="pwd">Description:</label>
              <textarea name="description" required class="form-control" rows="5" placeholder="Enter description here"><?php echo $po_info['description']; ?></textarea>
            </div>

            <div class="form-group col-md-6 pt-4">
              <label for="inputCity">&nbsp;</label><br>
              <button type="submit" class="btn btn-success btn-block" name="update-post">Submit</button>
            </div>
        </form>

      </div>
    </div>

  </div>

  </body>
</html>