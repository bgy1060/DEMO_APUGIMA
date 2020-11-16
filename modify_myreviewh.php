<?php
    include_once 'includes/dbh.inc.php';
    session_start();

    $hospital_review_id = $_GET['rid'];
    $uid = $_SESSION['userid'];

    $hospital_query = "SELECT * from hospital_reviews WHERE hospital_review_id=$hospital_review_id";
    $hospital_result = mysqli_query($conn, $hospital_query);
    if(mysqli_num_rows($hospital_result)==1) {
      $hospital_row = mysqli_fetch_array($hospital_result);
      $memo = $hospital_row["memo"];
      $rate = $hospital_row["rate"];

      // 병원 이름 가져오기
      $hospital_id = $hospital_row['hospital_id'];
      $hospital_query = "SELECT hospital_name from hospitals WHERE hospital_id=$hospital_id";
      $hospital_result = mysqli_query($conn, $hospital_query);
      $hospital_row = mysqli_fetch_array($hospital_result);
      $hospital_name = $hospital_row['hospital_name'];
    }
?>

<script>

  window.onload = function() {
    document.getElementById("modify_memo").value = '<?php echo $memo ?>';//일반적인 방법
    document.getElementById("pre_hospital").value = '<?php echo $hospital_name ?>';
    fillradio(<?php echo $rate ?>);
	}

  function fillradio(rate){
    console.log(rate);
    $('[name=hospital_grade]:radio[value="'+rate+'"]').prop('checked',true);
 }
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

	</div>

    <!-- Content Row -->
    <!-- Search Widget -->

    <div class="card mb-4"  >
      <h5 class="card-header">Please modify a review of the hospital you visited</h5>
      <div class="card-body"  >
        <div class="row">
      <div class="col-lg-8 mb-4">
        <form action='hospital_modify_action.php' method="POST">
          <div class="control-group form-group">
            <div class="controls" style="width:150%;">
            <INPUT TYPE="hidden" NAME="review_id" SIZE=10 value=<?php echo $hospital_review_id ?>>

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
              <textarea style="height : 300px;" rows="10" cols="100" class="form-control" id="modify_memo" name="params_memo" maxlength="999" style="resize:none"></textarea>
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
