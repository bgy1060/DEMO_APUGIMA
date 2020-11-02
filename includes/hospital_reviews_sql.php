1. prescriptions
<?php
	$sql = "SELECT * FROM prescriptions;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if result is null
	if ($resultCheck >0){
		echo $resultCheck ."<br>";
		while ($row = mysqli_fetch_assoc($result)) { //for each row
			echo $row['memo'].  "<br>";
		}
	}
?>
2. hospital_reviews_sql
<?php
	$sql = "SELECT hospital_id, memo, rate FROM hospital_reviews WHERE uid=나;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if result is null
	if ($resultCheck >0){
		while ($row = mysqli_fetch_assoc($result)) { //for each row
			echo $row['hopsital_id'];
			echo $row['memo'];
			echo $row['rate']. "<br>";
		}
	}
  else {
		echo "empty";
	}
?>
2. medicine_reviews_sql
<?php
	$ID=1;
	$sql = "SELECT medicine_id, memo, rate FROM medicine_reviews WHERE uid=$ID;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if result is null
	if ($resultCheck >0){
		while ($row = mysqli_fetch_assoc($result)) { //for each row
			$medicine_id = $row['medicine_id'];
			$memo = $row['memo'];
			$rate = $row['rate'];
			echo "<div class='col-lg-12'><h3 class='card-title'>$medicine_id</h3>
				<p class='card-text'>$memo $rate 점<a href='#' >삭제</a></p>
			</div>";
		}
	}
	else {
		echo "<p>empty</p>";
	}
?>
