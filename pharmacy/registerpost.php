<?php

	include('connect.php');

	$lname = $_POST['newUserLastname'];
	$fname = $_POST['newUserFirstname'];
	$address = $_POST['address'];
	$newUser = $_POST['newUser'];
	$newPass = md5($_POST['newPass']);
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$accessType = $_POST['AccessType'];

	$query = "INSERT INTO user (Employee_ID, Username, Password, First_Name, Last_Name, Address, Dob, Sex, Access_Type) 
	values('', '$newUser','$newPass','$fname','$lname','$address','$dob','$gender','$accessType')";
	
	$sendQuery = mysql_query($query);

	if(!$sendQuery){
		die("ERROR").mysql_error();
	}
	else{
		echo "1 record inserted";

	}




?>