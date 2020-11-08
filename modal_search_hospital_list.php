<?php
    include_once 'includes/dbh.inc.php';
    $hospital_name = $_GET['hospital_name'];
?>
<!DOCTYPE html>
<script type="text/javascript">

    function inputClose(hospital_name) {
        opener.document.getElementById("pre_hospital").value = hospital_name; //일반적인 방법
        localStorage.setItem("pre_hospital",hospital_name);
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
      <h5 class="card-header">'<?php echo $hospital_name; ?>' Search Results</h5>
	</div>

    <div class="list-table">

        <?php
          $sql2 = "select * from hospitals where hospital_name like '%$hospital_name%'";
          $result = mysqli_query($conn, $sql2);
          $resultCheck = mysqli_num_rows($result);
  
          if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                  $hospital_id = $row["hospital_id"];
                  $hospital_name = $row["hospital_name"];
                  echo "<a onclick=javascript:inputClose('$hospital_name'); > $hospital_id  $hospital_name </a> </br>";
              }
          }
        ?>
    </div>
</body>

</html>
