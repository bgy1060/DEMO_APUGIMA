<?php
	include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Apugima</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/custom.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Apugima</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Page
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="#">Diary</a>
              <a class="dropdown-item" href="prescriptions.php">Prescriptions</a>
              <a class="dropdown-item" href="myreview.php">My Review</a>
							<a class="dropdown-item" href="manage.php">Manage</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
		<div style="display: flex !important;">
    <h1 class="mt-4 mb-3">Hospitals
      <small>Reviews and ratings</small>
    </h1>
		<div class="mt-auto mb-3 ml-auto">
			<a href="hospitals_write.php" class="btn btn-primary">Write a review</a></div>
		</div>

    <!-- Content Row -->
    <!-- Search Widget -->

    <div class="card mb-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <form action='hospitals_search.php' method='get' class="input-group ml-auto mr-auto" style="width:60%;">
          <input type="text" class="form-control" name="input" placeholder="Search by hospital name or type...">
          <span class="input-group-append">
            <input type="submit" class="btn btn-secondary" value="Go !" ></input>
          </span>
        </form>
				<hr>
				<!-- Comment with nested comments -->
				<?php
					load_hospital_reviews($conn);
				?>
				<!--
				<div class="media mb-4">
					<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
					<div class="media-body">
						<h5 class="mt-0">Commenter Name</h5>리뷰내용
					</div>
				</div>
			-->

				<hr>
      </div>

	  </div>

  </div>
  <!-- /.container -->



  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">DEMO 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<?php
	function load_hospital_reviews($conn){
		$sql1 = "SELECT A.hospital_name, A.hospital_id, avg(B.rate) FROM hospitals AS A, hospital_reviews AS B WHERE A.hospital_id=B.hospital_id GROUP BY B.hospital_id;";
		$result1 = mysqli_query($conn, $sql1);
		$resultCheck = mysqli_num_rows($result1); //check if result is null
		if ($resultCheck >0){
			while ($row1 = mysqli_fetch_assoc($result1)) { //for each row
				$hospital_name = $row1['hospital_name'];
				$hospital_id = $row1['hospital_id'];
				$avg_rate = number_format($row1['avg(B.rate)'],1);
				echo "<h3>$hospital_name 평점: $avg_rate</h3>";
				$sql2 = "SELECT A.user_id, B.memo FROM users AS A, hospital_reviews AS B WHERE A.uid=B.uid AND hospital_id=$hospital_id;";
				$result2 = mysqli_query($conn, $sql2);
				$resultCheck = mysqli_num_rows($result2);
				while ($row2 = mysqli_fetch_assoc($result2)){
					$user_id = $row2['user_id'];
					$memo = $row2['memo'];
					echo "<div class='media mb-4'><img class='d-flex mr-3 rounded-circle' src='http://placehold.it/50x50' alt=''>
										<div class='media-body'>
											<h5 class='mt-0'>$user_id</h5>$memo
										</div>
									</div>";
				}
			}
		}
		else {
			echo "<h3 style='text-align: center;'>NO REVIEW</h3>";
		}
	}
	/*
		function load_hopsital_reviews($conn){
			$sql1 = "SELECT A.hospital_name, A.hospital_id, avg(B.rate) FROM hospitals AS A, hospital_reviews AS B WHERE A.hospital_id=B.hospital_id GROUP BY B.hospital_id;";
			$result1 = mysqli_query($conn, $sql1);
			$resultCheck = mysqli_num_rows($result1); //check if result is null
			if ($resultCheck >0){
				while ($row1 = mysqli_fetch_assoc($result1)) { //for each row
					$hospital_name = $row1['hospital_name'];
					$hospital_id = $row1['hospital_id'];
					$avg_rate = number_format($row1['avg(B.rate)'],1);
					echo "<h3>$hospital_name 평점: $avg_rate</h3>";
					$sql2 = "SELECT uid, memo FROM hospital_reviews WHERE hospital_id=$hospital_id;";
					$result2 = mysqli_query($conn, $sql2);
					$resultCheck = mysqli_num_rows($result2);
					while ($row2 = mysqli_fetch_assoc($result2)){
						$uid = $row2['uid'];
						$memo = $row2['memo'];
						echo "<div class='media mb-4'><img class='d-flex mr-3 rounded-circle' src='http://placehold.it/50x50' alt=''>
											<div class='media-body'>
												<h5 class='mt-0'>$uid</h5>$memo
											</div>
										</div>";
					}
				}
			}
		}
		*/
	?>
</body>

</html>
