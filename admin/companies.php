<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <?php 
          include 'conn/conn.php';

          if (isset($_REQUEST['del'])) {
            $CID = $_REQUEST['del'];
            $deleteddate = date("Y-m-d");
            $conn->query("UPDATE company SET deleted = 1, deleteddate = '$deleteddate' WHERE CID = '$CID'");
            echo $error = "<div class='bg-success text-white'>Company deleted successfully</div>";
          }
         ?>
         <div class="text-right"><a href="add-company.php">Add Company</a></div>
        <div class="table-responsive">
          <table class="table">
            <caption>List of Companies</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">CID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Location</th>
                <th scope="col">Submitted Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM company WHERE deleted != 1";
                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['CID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['submitteddate']; ?></td>
                <td><a href="company-edit.php?co=<?php echo $row['CID']; ?>" title="Update">Update</a>&nbsp;<a href="?del=<?php echo $row['CID']; ?>" title="Delete">Delete</a></td>
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