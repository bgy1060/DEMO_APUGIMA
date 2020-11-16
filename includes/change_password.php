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

	$sql = "UPDATE users SET user_password='$_GET[newpw]' WHERE uid='$_SESSION[userid]';";
	$result = mysqli_query($conn, $sql);
	if ($result)
		echo "<script>alert('Your password is successfully updated.');</script>";
	else
		echo "<script>alert('Error occured. Try again.');</script>";
?>
<meta http-equiv="refresh" content="0;url='../manage.php'">
