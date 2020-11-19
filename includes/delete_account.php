<?php
	include_once 'dbh.inc.php';
	session_start();
	if(!isset($_SESSION['userid'])){?>
			<script>
					 alert("Please log in first.");
					 location.replace("../login.php");
			</script>
	<?php
	}

	mysqli_query($conn, "BEGIN");
	$sqls = ["DELETE FROM hospital_reviews WHERE uid='$_SESSION[userid]';",
						"DELETE FROM medicine_reviews WHERE uid='$_SESSION[userid]';",
						"DELETE FROM prescriptions WHERE uid='$_SESSION[userid]';",
						"DELETE FROM diaries WHERE uid='$_SESSION[userid]';",
						"DELETE FROM users WHERE uid='$_SESSION[userid]';"];

	for ($i = 0; $i < count($sqls); $i++)
			if (!mysqli_query ($conn, $sqls[$i]))
					break;

	if ($i == count($sqls)){
			mysqli_query($conn, "COMMIT");
			echo "<script>alert('Your account is successfully deleted.');</script>";
			unset($_SESSION['userid']);
	}
	else {
			mysqli_query($conn, "ROLLBACK");
			echo "<script>alert('Error occurred. Try again.');</script>";
	}
?>
<meta http-equiv="refresh" content="0;url='../index.php'">
