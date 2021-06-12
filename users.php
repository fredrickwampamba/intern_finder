<?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <?php 
          include 'conn/conn.php';

          if (isset($_REQUEST['user'])) {
            $userID = $_REQUEST['user'];
            $conn->query("DELETE FROM users WHERE userID = '$userID'");
            echo $error = "<div class='bg-success text-white'>User deleted successfully</div>";
          }
         ?>
         <div class="text-right"><a href="add-user.php">Add User</a></div>
        <div class="table-responsive">
          <table class="table">
            <caption>List of users</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">UserID</th>
                <th scope="col">Username</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                $count = $result->num_rows;
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['userID']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php if($count != 1){ ?><a href="?user=<?php echo $row['userID']; ?>" title="Delete">Delete</a><?php } ?></td>
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