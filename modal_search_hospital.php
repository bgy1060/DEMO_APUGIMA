
<?php
	include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<style>
  body{
    padding-top : 0 !important;
  }
</style>
<head>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/custom.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>
      <!-- Content Row -->
    <!-- Search Widget -->
    <div class="card mb-4">
      <h5 class="card-header">Search Hospitals</h5>
      <div class="card-body">
				<form action='modal_search_hospital_list.php' method='get' class="input-group ml-auto mr-auto" style="width:60%;">
          <input type="text" class="form-control" name="hospital_name" placeholder="Search by hospital name...">
          <span class="input-group-append">
            <input type="submit" class="btn btn-secondary" value="Go !" ></input>
          </span>
        </form>
      </div>

	  </div>

</html>

