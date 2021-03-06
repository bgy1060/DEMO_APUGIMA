

<!DOCTYPE html>
<?php session_start(); ?>
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
            <a class="nav-link" href="hospitals.php">Hospital</a>
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


  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/main_pic_1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Take care of your body condition</h3>
            <p>Apugima helps you to record and manage your physical condition.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/main_pic_2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Choose a right hospital</h3>
            <p>Select the right hospital by comparing and analyzing reviews of different hospitals through Apugima.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/main_pic_3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Learn and consume</h3>
            <p>Apugima has information about a variety of medicines.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Apugima</h1>



    <!-- Portfolio Section -->

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_1.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Fitness management</p>
            </h4>
            <p class="card-text">You can manage my daily condition and keep track of information about the hospitals you attend and medications you take.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_2.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Hospital selection</p>
            </h4>
            <p class="card-text">By viewing the hospital reviews left by multiple users, you can choose a suitable hospital that can treat your illness.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_3.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Medicine information</p>
            </h4>
            <p class="card-text">You can view the drug reviews left by various users and choose the right drug for your symptoms.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_4.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Best medical staff</p>
            </h4>
            <p class="card-text">By having the user record the information of the medical staff, it is easy to get information about the best medical staff.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_5.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Compare reviews</p>
            </h4>
            <p class="card-text">There are many reviews on this site. Compare and select all of these reviews.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/sub_6.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p>Share your information</p>
            </h4>
            <p class="card-text">This site accepts a wide variety of users. Please provide the information you know for these users.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Our Site Hopes</h2>
        <p>This is why we got to work on the project:</p>
        <ul>
          <li>There is no web site to manage my body condition</li>
          <br>
          <li>We wanted to see reviews about the hospital in one place</li>
          <br>
          <li>We wanted many people to have the same information</li>
          <br>
          <li>In order for people to record the hospital information they went to</li>
          <br>
        </ul>
        <p>We hope that this site we have carefully created will become a site that many people need. We promise to provide convenient services to users by steadily managing and analyzing data so that more users can use it.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="img/bottom.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr><br><br>

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
