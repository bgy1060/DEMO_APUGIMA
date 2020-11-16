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

<script>
	function openChild(url, field) {
		var opt = "toolbar=no, resizable=yes, scrollbars=yes, location=no, resize=no,menubar=no, directories=no, copyhistory=0, width=600, height=400, top=100, left=100";
		window.name = "ori_window";
		window.open(url, 'new_window', opt);
	}
</script>

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
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Covid19
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item active" href="covidregion.php">Regional cases</a>
              <a class="dropdown-item" href="covidimport.php">Imported cases</a>
              <a class="dropdown-item" href="covidprogress.php">Progress</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown ">
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
    <h1 class="mt-4 mb-3">Covid19
    <small>- Regional Cases</small>
    </h1>

		<!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
      <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <form name="sendPrescription"  method="post" onsubmit="return checkForm();">
        <div class="card-body">
        <h4>Period search:</h4> 

        <input style ="width:32%; float:left; margin-right:1%;" type="date" class="form-control" name="params_date1">  
        <h5 style ="float:left;">~</h5>
        <input style ="width:32%; float:left; margin-left:1%;" type="date" type="date" class="form-control" name="params_date2">
        <br><br><br>

        <h4>Local search:</h4> 
        <input style ="width:57%; float:left;" readonly type="text" class="form-control" name="params_local" id="pre-region" required data-validation-required-message="Please search local.">
			        <span style ="float:left; margin-left:1%;" class="input-group-append">
					      <input style ="float:left; margin-left:1%;" type="button" onclick="openChild('modal_search_local.php', this);" class="btn btn-secondary" value="Search" ></input>
			        </span>
			        <p class="help-block"></p>
        <br><br><br>
        <form method="post">
          <input type="submit" class="btn btn-primary" id="send" name="send" value="Find detailed search results" >
          </form>
        </form>
        <hr>


        <?php 
          
          function show($conn) 
          { 
          
          $local = trim($_POST['params_local']);

          $date1=$_POST['params_date1'];

          $date2=$_POST['params_date2'];

         
          $sql="SELECT COUNT(id) as cnt, covid_date, region 
          FROM covid 
          WHERE DATE(covid_date) BETWEEN '$date1' and '$date2' and region='$local'
          GROUP BY covid_date, region WITH ROLLUP ";

          $result = mysqli_query($conn, $sql);
          
          $resultCheck = mysqli_num_rows($result);
          
          echo $date1;
          echo $date2;
          echo $local;
          echo $resultCheck;

          if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $covid_date = $row["covid_date"];
                $region = $row["region"];
                echo $covid_date.$region;
            }
          }
          } 
            if(array_key_exists('send',$_POST))
          { 
            show($conn); 
          } 
        ?>
        

      </div>

    </div>
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
