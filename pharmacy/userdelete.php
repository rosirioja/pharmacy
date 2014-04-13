<?php
	include ('connect.php');

	$userid = $_POST['userid'];

	$query = "DELETE FROM user WHERE Employee_ID = '$userid'";

	$sendquery = mysql_query($query);
?>