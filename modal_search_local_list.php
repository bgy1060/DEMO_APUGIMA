
<?php
    include_once 'includes/dbh.inc.php';
    $region = $_GET['region'];
?>
<!DOCTYPE html>
<script type="text/javascript">

    function inputClose(region) {
        opener.document.getElementById("pre-region").value = region; //일반적인 방법
        localStorage.setItem("pre-region",region);
        self.close();
    }

</script>
<style>
  body{
    padding-top : 0 !important;
  }
  .list-table{
    margin-left: 5%;
  }
</style>
<html>
<head>
    <link href="vendor/bootstrap/css/custom.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>
    <div class="card mb-4">
      <h5 class="card-header"><?php echo $region; ?> Search Results</h5>
	</div>

    <div class="list-table">

        <?php
          $sql2 = "select * from covid where region like '%$region%'";
          $result = mysqli_query($conn, $sql2);
          $resultCheck = mysqli_num_rows($result);
  
          if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                  $region_id = $row["id"];
                  $region = $row["region"];
                  echo "<a onclick=javascript:inputClose($region); > $region_id  $region </a> </br>";
              }
          }
        ?>
    </div>
</body>

</html>

