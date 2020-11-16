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
	
	window.onload = function() {
		checkDiseaseSession();
		checkHospitalSession();
	}
	function openChild(url, field) {
		var opt = "toolbar=no, resizable=yes, scrollbars=yes, location=no, resize=no,menubar=no, directories=no, copyhistory=0, width=600, height=400, top=100, left=100";  
		window.name = "ori_window";
		window.open(url, 'new_window', opt);
	}
	function checkDiseaseSession(){
		const disease = localStorage.getItem("pre_disease");
		if(disease == null || disease == undefined) return;
		document.getElementById("pre_disease").value = disease; //일반적인 방법
	}
	function checkHospitalSession(){
		const hospital = localStorage.getItem("pre_hospital");
		if(hospital == null || hospital == undefined) return;
		document.getElementById("pre_hospital").value = hospital; //일반적인 방법
	}

	function checkForm() {
		var hospital = document.sendPrescription.params_hosptial;
		// 병원 입력 유무 체크
		if(hospital.value == '' ) {
			window.alert("Please enter hospital");
			return false; // 병원 입력이 안되어 있다면 submint 이벤트를 중지, 페이지 reload
		}
		var disease = document.sendPrescription.params_disease;
		// 병 입력 유무 체크
		if(disease.value == ''){
			window.alert("Please enter disease name");
			window.reload();
			return false;
		}
		// TODO: 날짜 입력 유무 체크 -> 실패
		// var date = document.sendPrescription.params_date;
		// if(strtotime(date) == 0){
		// 	window.alert("Please enter date");
		// 	window.reload();
		// 	return false;
		// }

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

              <label >Hospital Name:</label>
              <br>
              <input style ="width:92%; float:left;" readonly type="text" class="form-control" name="params_hosptial" id="pre_hospital" required data-validation-required-message="Please search hospital.">
			        <span style ="float:left; margin-left:1%;" class="input-group-append">
					      <input type="button" onclick="openChild('modal_search_hospital.php', this);" class="btn btn-secondary" value="Search" ></input>
			        </span> 
			        <p class="help-block"></p>
              <br>
             
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls" style="width:150%;">
              <label>Rate:</label>
              <div>
                <input type="radio" name="hospital_grade" value="1"> ★
                <input type="radio" name="hospital_grade" value="2"> ★★
                <input type="radio" name="hospital_grade" value="3"> ★★★
                <input type="radio" name="hospital_grade" value="4"> ★★★★
                <input type="radio" name="hospital_grade" value="5"> ★★★★★
              </div>
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
