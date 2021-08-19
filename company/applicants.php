<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <?php 
          include 'conn/conn.php';

          if (isset($_REQUEST['del'])) {
            $appID = $_REQUEST['del'];
            $conn->query("DELETE FROM applicants WHERE appID = '$appID'");
            echo $error = "<div class='bg-success text-white'>Application deleted successfully</div>";
          }


          if (empty($_REQUEST['po'])) {
            echo '<script type="text/javascript">window.location="posts.php";</script>';
          }
            $postID = $_REQUEST['po'];
            $po_info = $conn->query("SELECT * FROM posts WHERE postID = '$postID' LIMIT 1")->fetch_assoc();

            $applicants = $conn->query("SELECT SUM(applied) as applicants FROM posts WHERE deleted!=1 AND CID = '$CID' AND postID = '$postID'")->fetch_assoc()['applicants'];
         ?>

         <!-- <div class="text-right"><a href="add-post.php">Add Post</a></div> -->
        <div class="table-responsive">
            <h3><strong>Applicants for : </strong> <span class="text-danger"><?php echo $po_info['name']; ?> (<?php echo $po_info['start']; ?> - <?php echo $po_info['end']; ?>) Count: <?php echo number_format($applicants); ?> / <?php echo $po_info['applicants']; ?></span></h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">AppID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">University</th>
                <th scope="col">Docs</th>
                <th scope="col">Download Documents</th>
                <th scope="col">Submitted Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $CID = $_SESSION['CID'];
                $postID = $_REQUEST['po'];
                $sql = "SELECT applicants.*, (SELECT COUNT(*) FROM app_docs WHERE app_docs.appID = applicants.appID) as doc_count, university.name as university_name FROM applicants LEFT JOIN university on university.UID = applicants.S_university WHERE postID = '$postID'";
                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['appID']; ?></td>
                <td><?php echo $row['S_name']; ?></td>
                <td><?php echo $row['S_email']; ?></td>
                <td><?php echo $row['S_phone']; ?></td>
                <td><?php echo $row['S_address']; ?></td>
                <td><?php echo $row['university_name']; ?></td>
                <td><?php echo $row['doc_count']; ?></td>
                <td><a href="docs.php?app=<?php echo $row['appID']; ?>" download target="about:blank">Download</a></td>
                <td><?php echo $row['submitteddate']; ?></td>
                <td><a href="email.php?app=<?php echo $row['appID']; ?>&post=<?php echo $_REQUEST['po']; ?>" title="Send Email">Email</a>&nbsp;<a href="?del=<?php echo $row['appID']; ?>" title="Delete">Delete</a></td>
              </tr>
              <?php
                  $i++;
                }
               ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  </body>
</html>