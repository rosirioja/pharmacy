<?php
session_start();
	include('connect.php');

	$newUser = $_POST['newUser'];
	$newPass = md5($_POST['newPass']);

	/*$newUser = 'alfredjuen';
	$newPass = 'alfred';*/
	$query = mysql_query("Select * from user where Username = '$newUser' AND Password = '$newPass';");
	$sql = mysql_fetch_array($query);
	
	if($sql != null){
	
	
		$type = $sql['Access_Type'];
		echo $type;

		$_SESSION['accesstype'] = $type;
		$_SESSION['username'] = $sql['Username']; 
	
			header("location:inventory.php");
	
	}else{
		header("location:login.php");
	}
	
?>




