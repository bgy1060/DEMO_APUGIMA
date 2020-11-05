<?php
	include_once 'dbh.inc.php';
	$sql = "DELETE FROM medicine_reviews WHERE medicine_review_id='$_GET[rid]';";
	$result = mysqli_query($conn, $sql);
	if ($result)
		echo "<script>alert('Your review is successfully deleted.');</script>";
	else
		echo "<script>alert('Error occured. Try again.');</script>";
?>
<meta http-equiv="refresh" content="0;url='../myreviewm.php'">
