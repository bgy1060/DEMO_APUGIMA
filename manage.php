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
            <a class="nav-link" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="#">Column</a>
					</li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Page
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="#">Diary</a>
              <a class="dropdown-item" href="#">Prescriptions</a>
              <a class="dropdown-item" href="myreview.php">My Review</a>
							<a class="dropdown-item active" href="manage.php">Manage</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">My Page
      <small>Manage</small>
    </h1>

		<!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h4>Manage your account</h4>
				<!--
        <form name="manageAccount" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>ID: </label>
              <input type="text" class="form-control" id="user_id" required data-validation-required-message="Please enter your id.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Password: </label>
              <input type="text" class="form-control" id="password" required data-validation-required-message="Please enter your password.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Name:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
            </div>
          </div>
          <div id="success"></div>
          <! - - For success/fail messages
          <button type="submit" class="btn btn-primary" id="manageAccountButton">Change</button>
        </form>
				-->
				<?php
				$id='';
				echo "<a href='includes/delete_account.php?id=$id'>DELETE ACCOUNT</a>";
				?>
      </div>

    </div>
    <!-- /.row -->

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
