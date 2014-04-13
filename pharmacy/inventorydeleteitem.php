<?php
	include('connect.php');

	$productid = $_POST['productid'];

	$query = "DELETE FROM medicineproduct WHERE Product_ID = '$productid' ";

	$sendQuery = mysql_query($query);

	if(!$sendQuery){
		die("Error! Maybe because of wrong or incomplete input in the Supplier form. Please Check.").mysql_error();
	}
	else{
		echo "Record deleted";
	}
?>