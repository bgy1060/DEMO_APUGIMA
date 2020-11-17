
<?php
    include_once 'includes/dbh.inc.php';
    $medicine_name  = $_GET['drug_name'];
?>
<!DOCTYPE html>
<script type="text/javascript">
   function inputClose(drug_name) {
        opener.document.getElementById("pre_drug").value = drug_name; //일반적인 방법
        localStorage.setItem("pre_drug",drug_name);
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
      <h5 class="card-header">'<?php echo $medicine_name; ?>' Search Results</h5>
	</div>

    <div class="list-table">

        <?php
          $sql2 = "select distinct medicine_name, medicine_id from medicines where medicine_name like '%$medicine_name%'";
          $result = mysqli_query($conn, $sql2);
          $resultCheck = mysqli_num_rows($result);
  
          if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                  // 따옴표 때문에 ...
                  $medicine_id = $row["medicine_id"];
                  $medicine_name = $row["medicine_name"];
                  echo "<a onclick=javascript:inputClose('$medicine_name'); > $medicine_name  </a> </br>";
              }
          }
        ?>
    </div>
</body>

</html>

