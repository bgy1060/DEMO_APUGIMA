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
      <a class="navbar-brand" href="index.html">Apugima</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="#">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Page
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="#">Diary</a>
              <a class="dropdown-item" href="#">Prescriptions</a>
              <a class="dropdown-item" href="myreview.php">My Review</a>
							<a class="dropdown-item" href="#">Manage</a>
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
			<a href="#" class="btn btn-primary">Write a review</a></div>
		</div>

    <!-- Content Row -->
    <!-- Search Widget -->
    <div class="card mb-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <form action='medicines_search.php' method='get' class="input-group ml-auto mr-auto" style="width:50%;">
          <input type="text" class="form-control" name="input" placeholder="Search by hospital name or type...">
          <span class="input-group-append">
            <input type="submit" class="btn btn-secondary" value="Go !" ></input>
          </span>
        </form>

				<hr>
				<!-- Comment with nested comments -->
				<?php
					load_medicine_reviews_searched($conn);
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
				<div style='text-align:center;'><a href="medicines.php">Back</a></div>
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
	  function load_medicine_reviews_searched($conn){
			$input = $_GET['input'];
	    $sql0 = "SELECT medicine_id FROM medicines WHERE medicine_name LIKE '%$input%' OR medicine_symptom LIKE '%$input%';";
	    $result0 = mysqli_query($conn, $sql0);
	    $resultCheck = mysqli_num_rows($result0);
	    if ($resultCheck >0){
	      while ($row0 = mysqli_fetch_assoc($result0)){
	        $target_id = $row0['medicine_id'];
	        $sql1 = "SELECT A.medicine_name, A.medicine_id, avg(B.rate) FROM medicines AS A, medicine_reviews AS B WHERE B.medicine_id='$target_id' AND A.medicine_id=B.medicine_id GROUP BY B.medicine_id;";
	        $result1 = mysqli_query($conn, $sql1);
	        $resultCheck = mysqli_num_rows($result1); //check if result is null
	        if ($resultCheck >0){
	          while ($row1 = mysqli_fetch_assoc($result1)) { //for each row
	            $medicine_name = $row1['medicine_name'];
	            $medicine_id = $row1['medicine_id'];
							$avg_rate = number_format($row1['avg(B.rate)'],1);
	            echo "<h3>$medicine_name 평점: $avg_rate</h3>";
	            $sql2 = "SELECT A.user_id, B.memo FROM users AS A, medicine_reviews AS B WHERE A.uid=B.uid AND medicine_id='$medicine_id';";
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
						echo "<h3 style='text-align: center; padding:100px'>NO REVIEW WITH THE NAME OR TYPE $input</h3>";
					}
	      }
	    }
			else {
				echo "<h3 style='text-align: center;padding:100px'>NO MEDICINE WITH THE NAME OR TYPE $input</h3>";
			}
	}
	?>
</body>

</html>
