<?php
    include_once 'includes/dbh.inc.php';
    session_start();
    if(!isset($_SESSION['userid'])){?>
        <script>
             alert("로그인 먼저 해주세요.");
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

<body style="height:100%;">

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
            
	</div>

    <!-- Content Row -->
    <!-- Search Widget -->

    <div class="card mb-4"  >
      <h5 class="card-header">Please write a review of the hospital you visited</h5>
      <div class="card-body"  >
        <div class="row">
      <div class="col-lg-8 mb-4">
        <form action="hospital_write_action.php" method="POST">
          <div class="control-group form-group">
            <div class="controls" style="width:150%;">
              <label>Hospital Name:</label>
              <input type="text" class="form-control" name="hospital_name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls" style="width:150%;">
              <label>Grade:</label>
              <input type="text" class="form-control" name="hospital_grade" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls" style="width:150%;">
              <label>Memo:</label>
              <textarea style="height : 300px;" rows="10" cols="100" class="form-control" name="params_memo" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <button style="margin-left:69%;" type="submit" class="btn btn-primary" id="sendPreButton">Register</button>
          
       
        </for>
      </div>

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

	
</body>

</html>
