<?php
	include('connect.php');

	$productid = array();
	$quantity = array();
	$productprice = array();

	if(isset($_REQUEST['productid'])){
		$productid = $_REQUEST['productid'];
		$quantity = $_REQUEST['quantity'];
		$productprice = $_REQUEST['productprice'];
		$totalamount = $_REQUEST['totalamount'];

		$custname = $_REQUEST['custname'];
		$custaddress = $_REQUEST['custaddress'];
		$totalamount = $_REQUEST['totalamount'];

	}

	$datenow = date("Y-m-d");
	$count = sizeof($productid);

/*
	foreach ($productid as  $value) {
		echo $value."<br>";

		$query = "INSERT INTO orderdetails VALUES ('', '', '$value', '$', '')";
		$sendquery = mysql_query($query);
	}*/

$query1 = "INSERT INTO ordermedicine VALUES ('', '$custaddress', '$custname', '$count', '$totalamount', '$datenow')";
$sendquery1 = mysql_query($query1);
$id = mysql_insert_id();

for($i=0; $i<count($productid); $i++ ){
		$query = "INSERT INTO orderdetails VALUES ('', '$id', '$productid[$i]', '$quantity[$i]', '$productprice[$i]')";
		$sendquery = mysql_query($query);

		$pid = $productid[$i];
		$quan = $quantity[$i];

		$query2 = "SELECT Prod_Stock FROM medicineproduct WHERE Product_ID = '$pid'";
		$result = mysql_query($query2);
		$row = mysql_fetch_assoc($result);
		$stock = $row['Prod_Stock'];

		$newstock = $stock - $quan;

		$query3 = "UPDATE medicineproduct SET Prod_Stock = '$newstock' WHERE Product_ID = '$pid'";
		$sendquery2 = mysql_query($query3);
}

?>
