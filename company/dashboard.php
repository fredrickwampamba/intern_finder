<?php include 'comp/header.php'; ?>

    <?php 
        include 'conn/conn.php';
        $CID = $_SESSION['CID'];
        $posts_count = $conn->query("SELECT *FROM posts WHERE deleted!=1 AND CID = '$CID'")->num_rows;
        $applicants = $conn->query("SELECT SUM(applied) as applicants FROM posts WHERE deleted!=1 AND CID = '$CID'")->fetch_assoc()['applicants'];

     ?>
      <div class="col-md-9">
        <div class="row">

          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Posts</h4>
                <p class="card-text">Count of the posts</p>
                <span class="badge badge-success btn-block" style="font-size: 100px; padding-top: 20px; background-color: purple;"><?php echo $posts_count; ?></span>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Applicants</h4>
                <p class="card-text">Count of the applicants</p>
                <span class="badge badge-success btn-block" style="font-size: 100px; padding-top: 20px; background-color: green;"><?php echo $applicants; ?></span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>

  </body>

</html>