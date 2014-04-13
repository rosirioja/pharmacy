<?php
	include ('connect.php');

	$userid = $_POST['Employee_ID'];
	$username = $_POST['Username'];
	$lname = $_POST['Last_Name'];
	$fname = $_POST['First_Name'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$accesstype = $_POST['AccessType'];

	$query = "UPDATE user SET Username = '$username', Last_Name = '$lname', First_Name = '$fname', Sex = '$gender', Dob = '$dob', Address = '$address', Access_Type = '$accesstype' WHERE Employee_ID = '$userid'";

	$sendQuery = mysql_query($query);

	if(!$sendQuery){
		die("Error! Maybe because of wrong or incomplete input in the Supplier form. Please Check.").mysql_error();
	}
	else{
		echo "Record updated";
	}



?>