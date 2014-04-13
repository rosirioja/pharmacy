<?php
	include ('connect.php');

	$productname = $_POST['productname'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$productdesc = $_POST['productdesc'];
	$stock = $_POST['stock'];

	$suppliername = $_POST['suppliername'];
	$supplierdate = $_POST['supplierdate'];
	$supplieraddress = $_POST['supplieraddress'];
	$suppliercontact = $_POST['suppliercontact'];

	$query = "INSERT INTO medicineproduct(Product_ID, Product_Name, Product_Desc, Quantity_Per_Unit, Prod_Unit_Price, Prod_Stock) 
	values('','$productname','$productdesc','$quantity','$price','$stock')";
	
	$sendQuery = mysql_query($query);

	$query1 = "SELECT Product_ID FROM medicineproduct WHERE Product_Name = '$productname'";

	$result = mysql_query($query1);
	$row = mysql_fetch_assoc($result);

	$productid = $row['Product_ID'];

	$query3 = "INSERT INTO supplier(Supplier_ID, Supplier_Name, Supplied_Date, Supplier_Address, Supplier_Contact, Product_ID)
	values('','$suppliername','$supplierdate','$supplieraddress','$suppliercontact', '$productid')";

	$sendQuery1 = mysql_query($query3);


?>