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
      <a class="navbar-brand" href="index.php">Apugima</a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">

            <a class="nav-link " href="hospitals.php">Hospital</a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">

						<a class="nav-link " href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Page
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="diary.php">Diary</a>
              <a class="dropdown-item" href="prescriptions.php">Prescriptions</a>
              <a class="dropdown-item" href="myreview.php">My Review</a>
							<a class="dropdown-item" href="manage.php">Manage</a>
            
          <li class="nav-item">
          <?php
                
                if(isset($_SESSION['userid'])) {
          ?>
                        <a class="nav-link" href='./logout.php'>Logout</a>
        <?php
                }
                else {
        ?>              <a class="nav-link" href='./login.php'>Login</a>
        <?php   }
        ?>
        </div>
        </li>

					</li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">My Page
      <small>My Review</small>
    </h1>
    <!--
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Pricing</li>
    </ol>-->

		<!-- Content Row -->
    <div class="row">
      <div class="col-lg-4-2 mb-4">
        <div class="card h-100">
          <a href="myreviewh.php" class="btn"><h3>Hospital</h3>Manage my reviews</a>
        </div>
      </div>
      <div class="col-lg-4-2 mb-4">
        <div class="card h-100">
          <a href="myreviewm.php" class="btn btn-primary"><h3>Medicine</h3>Manage my reviews</a>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-body" style="min-height:40vh;">
        <div class="row">
					<?php
						load_myreview_medicine($conn);
					?>
					<!--
          <div class="col-lg-12">
						<h3 class="card-title">Hospital Code</h3>
            <p class="card-text">Review</p>
						<a href="#" >삭제</a>
          </div>-->
        </div>
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
	  function load_myreview_medicine($conn){
	    $ID=1;
	    $sql = "SELECT A.medicine_name, B.medicine_review_id, B.memo, B.rate FROM medicines AS A, medicine_reviews AS B WHERE uid=$ID AND A.medicine_id=B.medicine_id;";
	    $result = mysqli_query($conn, $sql);
	    $resultCheck = mysqli_num_rows($result); //check if result is null
	    if ($resultCheck >0){
	      while ($row = mysqli_fetch_assoc($result)) { //for each row
					$medicine_name = $row['medicine_name'];
					$medicine_review_id = $row['medicine_review_id'];
	        $memo = $row['memo'];
	        $rate = $row['rate'];
	        echo "<div class='col-lg-12'><h4 class='card-title'>$medicine_name</h4>
	          <p>\"$memo\" ($rate 점)<a href='includes/delete_myreviewm.php?rid=$medicine_review_id'> DELETE</a></p>
	        </div>";
	      }
	    }
	    else {
	      echo "<p>empty</p>";
	    }
	  }
	?>

</body>
</html>
