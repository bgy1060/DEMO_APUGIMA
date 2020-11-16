<?php
  include_once 'includes/dbh.inc.php';
  session_start();
  
?>

<!DOCTYPE html>
<html>
<style>
.col-lg-4{
	max-width:none !important;
}
.card-date{
	font-size: 15px;
    position: absolute;
    right: 20px;
    top: 15px;
}
</style>

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
						<a class="nav-link active" href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
		<div style="display: flex !important;">
    <h1 class="mt-4 mb-3">Columns</h1>
		<div class="mt-auto mb-3 ml-auto"></div>
		</div>

    <!-- Content Row -->
    <!-- Search Widget -->

    <div class="card mb-4">
      <h5 class="card-header">Column List</h5>
      <div class="card-body">
          <span class="input-group-append">
          </span>
        </form>
				<hr>
				<!-- Comment with nested comments -->
				<?php
					load_columns($conn);
				?>

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
	function load_columns($conn){
		$sql = "SELECT * FROM columns;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				$column_id = $row['column_id'];
				$title = $row['title'];
				$date = $row['column_date'];
				$content = $row['content'];
				echo "<div class='col-lg-4 mb-4'>
					<div class='card h-100'>
					  <h4 class='card-header'>$column_id. $title
					  	<p class='card-date'> $date</p>
					  </h4>
						<div class='card-body'>
							<p class='card-text'>$content</p>
						</div>
					</div>
			  	</div>";
			}
		}
	}
  ?>
</body>

</html>