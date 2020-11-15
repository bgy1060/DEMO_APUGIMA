
<?php
	include_once 'dbh.inc.php';
    $sql = "DELETE FROM prescriptions WHERE prescription_id=$_GET[id];";
	$result = mysqli_query($conn, $sql);
	if ($result)
		echo "<script>alert('Your prescription is successfully deleted.');</script>";
	else
		echo "<script>alert('Error occured. Try again.'); </script>";
?>
<meta http-equiv="refresh" content="0;url='../prescriptions.php'">

