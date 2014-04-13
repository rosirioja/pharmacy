<?php
	include ('connect.php');

	$productid = $_POST['Product_ID'];
	$productname = $_POST['Product_Name'];
	$quantity = $_POST['Quantity'];
	$price = $_POST['Price'];
	$productdesc = $_POST['Product_Desc'];

	$query = "UPDATE medicineproduct SET Product_Name = '$productname', Product_Desc = '$productdesc', Quantity_Per_Unit = '$quantity', Prod_Unit_Price = '$price' WHERE Product_ID = '$productid'";

	$sendQuery = mysql_query($query);

	if(!$sendQuery){
		die("Error! Maybe because of wrong or incomplete input in the Supplier form. Please Check.").mysql_error();
	}
	else{
		echo "Record updated";
	}

?>