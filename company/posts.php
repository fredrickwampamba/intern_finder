<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <?php 
          include 'conn/conn.php';

          if (isset($_REQUEST['del'])) {
            $postID = $_REQUEST['del'];
            $deleteddate = date("Y-m-d");
            $conn->query("UPDATE posts SET deleted = 1, deleteddate = '$deleteddate' WHERE postID = '$postID'");
            echo $error = "<div class='bg-success text-white'>Post deleted successfully</div>";
          }
         ?>
         <div class="text-right"><a href="add-post.php">Add Post</a></div>
        <div class="table-responsive">
          <small class="text-danger">Scroll horizontally to see all information</small>
          <table class="table">
            <caption>List of your posts</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">PostID</th>
                <th scope="col">Name</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Applied</th>
                <th scope="col">Accept Only</th>
                <th scope="col">Applicants</th>
                <th scope="col">Docs</th>
                <th scope="col">Int. Type</th>
                <th scope="col">Certification</th>
                <th scope="col">Submitted Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $CID = $_SESSION['CID'];
                $sql = "SELECT * FROM posts WHERE deleted!=1 AND CID = '$CID'";
                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['postID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['start']; ?></td>
                <td><?php echo $row['end']; ?></td>
                <td><span class="badge badge-success" style="padding-top: 5px; background-color: green;"><?php echo $row['applied']; ?></span></td>
                <td><?php echo $row['ac_years']; ?></td>
                <td><?php echo $row['applicants']; ?></td>
                <td><?php echo $row['docs']; ?></td>
                <td><?php echo $row['intern_type']; ?></td>
                <td><?php echo $row['certification']; ?></td>
                <td><?php echo $row['submitteddate']; ?></td>
                <td><a href="applicants.php?po=<?php echo $row['postID']; ?>" title="Applicants">Applicants</a>&nbsp;<a href="post-edit.php?po=<?php echo $row['postID']; ?>" title="Update">Update</a>&nbsp;<a href="?del=<?php echo $row['postID']; ?>" title="Delete">Delete</a></td>
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