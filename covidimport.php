<?php
	include_once 'includes/dbh.inc.php';

	session_start();


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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['is_travel', 'Number of covid patients by is_travel']
          <?php

            $sql = "SELECT is_travel, COUNT(is_travel) AS cnt FROM covid GROUP BY is_travel";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
              echo ", [";
						  echo "\"", $row['is_travel'], "\", ", (int)$row['cnt'];
              echo "]";
    
            }

          ?>
        ]);

        var options = {
          title: 'Classification of Covid 19 patients by country of entry abroad'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

        
      }
  </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Number of infected people']
          <?php

            $date1=$_POST['params_date1'];
            $date2=$_POST['params_date2'];

            if($_POST['enter']=='yes'){
              $sql = "SELECT COUNT(id) as cnt, covid_date 
              FROM covid 
              WHERE covid_date 
              BETWEEN '$date1' AND '$date2' AND is_travel!='대한민국' GROUP BY covid_date WITH ROLLUP";

            }

            else{
              $sql = "SELECT COUNT(id) as cnt, covid_date 
              FROM covid 
              WHERE covid_date 
              BETWEEN '$date1' AND '$date2' AND is_travel='대한민국' GROUP BY covid_date WITH ROLLUP";

            }

            
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
              echo ", [";
						  echo "\"", $row['covid_date'], "\", ", (int)$row['cnt'];
              echo "]";
    
            }

          
          ?>
        ]);

        var options = {
          title: 'Number of infected people depending on whether they have entered overseas',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);

      }
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

            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Covid19
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">

              <a class="dropdown-item " href="covidregion.php">Regional cases</a>
              <a class="dropdown-item active"  href="covidimport.php">Imported cases</a>

              <a class="dropdown-item" href="covidprogress.php">Progress</a>
            </div>
          </li>
          <li class="nav-item">

            <a class="nav-link " href="hospitals.php">Hospital</a>

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
    <h1 class="mt-4 mb-3">Covid 19
      <small>- Imported Case</small>
    </h1>
		<div class="mt-auto mb-3 ml-auto">
			</div>
		</div>

    <!-- Content Row -->
    <!-- Search Widget -->
    <hr>
    
    "Here you can see the results of an analysis of where Covid 19 patients in Korea were infected with the virus. 
    If you want to see all the Covid 19 source results of our data, just click the "view all result" checkbox button and click the "Find detail search" button. 
    If you want to see the trend of infections from overseas or domestic during some period, you can select the period, click "veiw local result" and select the yes or no button."
   
    <hr>

    <div class="card mb-4">
      <h5 class="card-header" style="display: flex !important;">Search
				
			</h5>
      <div class="card-body" >
      <form name="sendPrescription"  method="post" onsubmit="return checkForm();">
        <div class="card-body">
        <h4 style ="margin-left:56%;">Total search:</h4>
        <input style =" margin-left:41.4%; margin-top:2%"type='checkbox' name='total' value='yes' /> View all results
        <input style =" margin-left:2.4%; margin-top:2%"type='checkbox' name='total' value='no' /> View local results
        
        <h4 style ="float:left;margin">Period search:</h4>
        <br><br>
        
        <input style ="width:21%; float:left; margin-right:1%;" type="date" class="form-control" name="params_date1">  
        <h5 style ="float:left;">~</h5>
        <input style ="width:21%; float:left; margin-left:1%;" type="date" type="date" class="form-control" name="params_date2">
        <h4 style ="margin-left:10.3%;margin-top:1.5%; float:left; margin-bottom:2%">Whether to enter overseas:</h4> 
        <br><br><br>
      
       <div style ="margin-left:56%  ">
          <input type="radio" name="enter" value="yes"> Yes
          <input style ="margin-left:6%  "type="radio" name="enter" value="no"> No
        </div>
  
        <form method="post">
          <input style ="margin-left:39%;margin-top:4%;" type="submit" class="btn btn-primary" id="send" name="send" value="Find detailed search results" >
          </form>
        </form>

				<hr><br>

        <?php 
          
          function show($conn) 
          { 
          
          if($_POST['total']=='yes'){

          ?>
            <div id="piechart" style="margin-left: 12%; width: 900px; height: 500px;"></div>

          <?php  

            $sql = "SELECT COUNT(id) as cnt 
                    FROM covid";

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);


            echo "<h6><center> The <span style='color:blue'>total number</span> of Covid 19 infections is <span style='color:blue'>",$row['cnt'],"</span></center><h5>";

          }


          else{?>
            <div id="curve_chart" style="margin-left: 8%; width: 900px; height: 500px"></div>
            <br><br>

          <?php    
            
            $date1=$_POST['params_date1'];
            $date2=$_POST['params_date2'];

            if($_POST['enter']=='yes'){
              $sql = "SELECT COUNT(id) as cnt 
              FROM covid 
              WHERE covid_date BETWEEN '$date1' AND '$date2' AND is_travel!='대한민국' ";
            }

            else{
              $sql = "SELECT COUNT(id) as cnt 
              FROM covid 
              WHERE covid_date BETWEEN '$date1' AND '$date2' AND is_travel='대한민국' ";

            }

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            
            if($_POST['enter']=='yes'){
              echo "<h6><center> The number of infected people who entered the country from <span style='color:blue'> abroad </span> 
              during the selected period is <span style='color:blue'>",$row['cnt'],"</span></center><h5>";

            }

            else{
              echo "<h6><center> The number of <span style='color:blue'> domestic infections </span> 
              during the selected period is <span style='color:blue'>",$row['cnt'],"</span></center><h5>";

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
