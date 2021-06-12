<?php 
    include 'conn/conn.php';

    $users_Count = $conn->query("SELECT *FROM users")->num_rows;
    $companies_count = $conn->query("SELECT *FROM company WHERE deleted!=1")->num_rows;
    $uni_Count = $conn->query("SELECT *FROM university WHERE deleted!=1")->num_rows;

 ?>
      <?php include 'comp/header.php'; ?>

      <div class="col-md-9">
        <div class="row">

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Users</h4>
                <p class="card-text">Count of the users</p>
                <span class="badge badge-success btn-block" style="font-size: 100px; padding-top: 20px; background-color: purple;"><?php echo $users_Count; ?></span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Companies</h4>
                <p class="card-text">Count of the companies</p>
                <span class="badge badge-success btn-block" style="font-size: 100px; padding-top: 20px; background-color: red;"><?php echo $companies_count; ?></span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Universities</h4>
                <p class="card-text">Count of the universities</p>
                <span class="badge badge-danger btn-block" style="font-size: 100px; padding-top: 20px; background-color: green;"><?php echo $uni_Count; ?></span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>

  </body>

</html>