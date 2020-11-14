<?php
	include_once 'dbh.inc.php';
	mysqli_query($conn, "BEGIN");
	$sqls = ["DELETE FROM hospital_reviews WHERE uid='$_GET[id]';",
						"DELETE FROM medicine_reviews WHERE uid='$_GET[id]';",
						"DELETE FROM prescriptions WHERE uid='$_GET[id]';",
						"DELETE FROM diaries WHERE uid='$_GET[id]';",
						"DELETE FROM users WHERE uid='$_GET[id]';"];

	for ($i = 0; $i < count($sqls); $i++)
			if (!mysqli_query ($conn, $sqls[$i]))
					break;

	if ($i == count($sqls)){
			mysqli_query($conn, "COMMIT");
			echo "<script>alert('Your account is successfully deleted.');</script>";
	}
	else {
			mysqli_query($conn, "ROLLBACK");
			echo "<script>alert('Error occured. Try again.');</script>";
	}

?>
<meta http-equiv="refresh" content="0;url='../index.php'">
