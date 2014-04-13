<?php
	include ('connect.php');

	$productid = $_POST['productid'];
	$newstock = $_POST['supplierstocks'];	
	$suppliername = $_POST['suppliername'];
	$supplierdate = $_POST['supplierdate'];
	$supplieraddress = $_POST['supplieraddress'];
	$suppliercontact = $_POST['suppliercontact'];

	$query = "SELECT Prod_Stock FROM medicineproduct WHERE Product_ID = '$productid'";

	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);

	$prevstock = $row['Prod_Stock'];
	$supplierstocks = $prevstock + $newstock;
	echo $supplierstocks;
	//die();

	$query1= "INSERT INTO supplier (Supplier_ID, Supplier_Name, Supplied_Date, Supplier_Address, Supplier_Contact, Product_ID)
	values('','$suppliername','$supplierdate','$supplieraddress','$suppliercontact', '$productid')";

	$sendQuery = mysql_query($query1);

	$query2 = "UPDATE medicineproduct SET Prod_Stock = '$supplierstocks' WHERE Product_ID = '$productid' ";
	
	$sendQuery1 = mysql_query($query2);


?>