<?php
	include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$sql = "SELECT * FROM users;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if result is null
	if ($resultCheck >0){
		echo $resultCheck ."<br>";
		while ($row = mysqli_fetch_assoc($result)) { //for each row
			echo $row['user_uid'].  "<br>";
		}
	}
?>
</body>
</html>
