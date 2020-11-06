<?php
	include_once 'includes/dbh.inc.php';
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
<style>
	.mb-4, .my-4 {
		margin-bottom: 1.5rem !important;
		margin-left: 9rem !important;
		width: 40%;
	}
	.controls{
		display : flex;
	}
	.form-control{
		width: 40% !important;
		position: absolute;
    	left: 200px;
	}
	h5{
		border-bottom: 3px dashed #bcbcbc;
   	 	padding-bottom: 7px;
		margin-top: 15px;
	}
	.col-lg-8 {
    flex: none;
    max-width: none;
	}
	.input-group-append {
    position: absolute;
    right: 30px;
	}
	#sendPreButton{
		position: absolute;
		left: 35%;
		top: 110%;
	}
</style>
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
            <a class="nav-link" href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Page
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="dropdown-item" href="#">Diary</a>
              <a class="dropdown-item" href="prescriptions.php">Prescriptions</a>
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
		<h1 class="mt-4 mb-3">Prescriptions</h1>
		<div class="mt-auto mb-3 ml-auto"></div>
	</div>


</div>
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h5>Please write your prescription</h5>
        <form id="sendPrescription" action="prescriptions_create.php" method="post" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Hospitals:</label>
              <input type="text" class="form-control" name="params_hosptial" id="pre_hospital" required data-validation-required-message="Please search hospital.">
			<span class="input-group-append">
					<input type="button" onclick="openChild('modal_search_hospital.php', this);" class="btn btn-secondary" value="Search" ></input>
			</span> 
			  <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
			  <label>Diseases:</label>
			  <input type="text" class="form-control"  name="params_disease" id="pre_disease" required data-validation-required-message="Please search disease.">
			<span class="input-group-append">
					<input type="button" onclick="openChild('modal_search_disease.php', this);" class="btn btn-secondary" value="Search" ></input>
			</span>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Date:</label>
              <input type="date" class="form-control" name="params_date">
            </div>
		  </div>
		  <div class="control-group form-group">
            <div class="controls">
              <label>Doctor Name:</label>
              <input type="text" class="form-control" name="params_doctor">
            </div>
		  </div>
		  <div class="control-group form-group">
            <div class="controls">
              <label>Price :</label>
			  <input type="text" class="form-control" name="params_price">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Memo:</label>
              <textarea style="height : 50px;" rows="10" cols="100" class="form-control" name="params_memo" maxlength="999" style="resize:none"></textarea>
			</div>
			<p class="help-block"></p>
		  </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendPreButton">Send Prescription</button>
        </form>
      </div>

    </div>
    <!-- /.row -->
	<?php
		$sql = "SELECT * FROM prescriptions, hospitals, diseases WHERE prescriptions.hospital_id = hospitals.hospital_id AND prescriptions.disease_id=diseases.disease_id;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo $row['prescription_id'] ."번 ". $row['prescription_date']. " 병원이름: " . $row['hospital_name']. " 질병이름: ". $row['disease_name'].  " 메모: " .$row['memo'] . " 가격: ".$row['prescription_price']. "원". "교수님: " . $row['doctor_name'] . "<br>";
			}
		}
	?>
</body>

</html>