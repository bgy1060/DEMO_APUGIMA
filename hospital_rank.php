<?php
	include_once 'includes/dbh.inc.php';
	session_start();
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
          var data = new google.visualization.arrayToDataTable([
            <?php
            echo "['Hospital Name', 'Rate', { role: 'annotation' }]";
            $sql = "SELECT A.hospital_name, AVG(B.rate), RANK() OVER ( ORDER BY AVG(B.rate) DESC) AS ranking
                      FROM hospitals AS A, hospital_reviews AS B
                      WHERE A.hospital_id=B.hospital_id
                      GROUP BY B.hospital_id
                      ORDER BY ranking LIMIT 10;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { //for each row
                echo ", [";
                echo "\"", $row['hospital_name'], "\", ", $row['AVG(B.rate)'],",", $row['ranking'];
                echo "]";
            }
            ?>
          ]);

          var options = {
            legend: { position: 'none', maxLines: 5},
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
              x: {
                0: { side: 'top', label: 'Rate'} // Top x-axis.
              }
            },
            hAxis: {maxValue: 5},
            textStyle: { fontSize:15},
            bar: { groupWidth: "90%" },
          };

          var chart = new google.charts.Bar(document.getElementById('chartdiv'));
          chart.draw(data, options);
        };
      </script>
 <!-- Navigation -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Apugima</a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Covid19
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="covidregion.php">Regional cases</a>
              <a class="dropdown-item" href="covidimport.php">Imported cases</a>
              <a class="dropdown-item" href="covidprogress.php">Progress</a>
            </div>
          </li>
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

              <a class="dropdown-item" href="diary.php">Diary</a>
              <a class="dropdown-item" href="prescriptions.php">Prescriptions</a>
              <a class="dropdown-item" href="myreview.php">My Review</a>
							<a class="dropdown-item" href="manage.php">Manage</a>
						</div>
        	</li>
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
      <h5 class="card-header">Ranking</h5>
      <div class="card-body" >
				<!-- Comment with nested comments -->
        <div id="chartdiv" style='height:500px;'></div>
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


</body>

</html>
