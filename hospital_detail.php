<?php
	include_once 'includes/dbh.inc.php';
	session_start();
	if(!isset($_SESSION['userid'])){?>
			<script>
					 alert("Please log in first.");
					 location.replace("./login.php");
			</script>
	<?php
	}
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
            <a class="nav-link active" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
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
      <h5 class="card-header">Hospital Information</h5>
      <div class="card-body">
				<hr>
				<!-- Comment with nested comments -->
				<?php
					load_hospital_detail($conn);
				?>

				<hr>
				<div style='text-align:center;'><a href="hospitals.php">Back</a></div>
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
	function load_hospital_detail($conn){
		$sql= "SELECT * FROM hospitals WHERE hospital_id='$_GET[id]';";
		$result = mysqli_query($conn, $sql);
		if ($result){
			$row = mysqli_fetch_assoc($result);
			echo "<h3>$row[hospital_name]</h3>";
			echo "<p>Hospital type: $row[hospital_type]<br>";
			echo "Address: $row[hospital_address]<br>";
			echo "Contact: $row[hospital_number]<br></p>";
		}
		else {
			echo "<h3 style='text-align: center;'>Error occured. Try again.</h3>";
		}
	}
	?>
</body>

</html>
