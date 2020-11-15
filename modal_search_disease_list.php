
<?php
    include_once 'includes/dbh.inc.php';
    $disease_name  = $_GET['disease_name'];
?>
<!DOCTYPE html>
<script type="text/javascript">
   function inputClose(disease_name) {
        opener.document.getElementById("pre_disease").value = disease_name; //일반적인 방법
        localStorage.setItem("pre_disease",disease_name);
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
      <h5 class="card-header">'<?php echo $disease_name; ?>' Search Results</h5>
	</div>

    <div class="list-table">

        <?php
          $sql2 = "select * from diseases where disease_name like '%$disease_name%'";
          $result = mysqli_query($conn, $sql2);
          $resultCheck = mysqli_num_rows($result);
  
          if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                  // 따옴표 때문에 ...
                  $disease_id = $row["disease_id"];
                  $disease_name = $row["disease_name"];
                  echo "<a onclick=javascript:inputClose('$disease_name'); > $disease_name  </a> </br>";
              }
          }
        ?>
    </div>
</body>

</html>

