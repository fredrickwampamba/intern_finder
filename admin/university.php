<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <?php 
          include 'conn/conn.php';

          if (isset($_REQUEST['del'])) {
            $UID = $_REQUEST['del'];
            $deleteddate = date("Y-m-d");
            $conn->query("UPDATE university SET deleted = 1, deleteddate = '$deleteddate' WHERE UID = '$UID'");
            echo $error = "<div class='bg-success text-white'>University deleted successfully</div>";
          }
         ?>
         <div class="text-right"><a href="add-university.php">Add University</a></div>
        <div class="table-responsive">
          <table class="table">
            <caption>List of Universities</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">UID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Location</th>
                <th scope="col">Submitted Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM university WHERE deleted!=1";
                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['UID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['submitteddate']; ?></td>
                <td><a href="university-edit.php?uni=<?php echo $row['UID']; ?>" title="Update">Update</a>&nbsp;<a href="?del=<?php echo $row['UID']; ?>" title="Delete">Delete</a></td>
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