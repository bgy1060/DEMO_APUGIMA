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
            <a class="nav-link " href="hospitals.php">Hospital</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="medicines.php">Medicine</a>
          </li>
					<li class="nav-item">
						<a class="nav-link " href="columns.php">Column</a>
					</li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <div align='center' style="margin-top:7%">
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        <br>
 
        <form method='get' action='login_ok.php'>
                <div class="form-group">
                        <label style="margin-right:24%">Your email</label>
                        <input style="width:30%;"class="form-control" name="id" type="text">
                </div> <!-- form-group// -->
                <div class="form-group">
                        <label style="margin-right:22.3%">Your password</label>
                        <input style="width:30%;"class="form-control" name="id" type="text">
                </div> <!-- form-group// -->
                <br>
                <input class="btn btn-secondary" style="width:30%" type="submit" value="Login">
        </form>
        <br />
        <button class="btn btn-secondary" style="width:30%" id="join" onclick="location.href='./join.php'">Sign up</button>
 
        </div>
 

        
</body>
 
</html>


