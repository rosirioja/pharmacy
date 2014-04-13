<?php

	include('connect.php');

	$searchmed = $_POST['search'];
	
	//DB SELECT Code
	$sqlselect = "SELECT * FROM  medicineproduct WHERE Product_Name like '%$searchmed%' 
	or  Product_Desc like '%$searchmed%'";

	$result = mysql_query($sqlselect);
	$row = mysql_fetch_array($result);
	
	$output = "";
	//Search output
	if ($searchmed==$row['Product_Name'] || $searchmed==$row['Product_Desc']) {
	/*$output .= "<table border='1'>
				<tr> 
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Description</th>
				<th>Quantity Per Unit</th>
				<th>Unit Price</th>
				<th>Stock</th>
				<th>Expiry_Date</th>
		
				</tr>";*/
		$output .= "<tr class='append-tr info'>";
		$output .= "<td class='productid' data-name=".$row['Product_ID'].">".$row['Product_ID']."</td>";
		$output .= "<td class='productname' data-name=".$row['Product_Name'].">".$row['Product_Name']."</td>";
		$output .= "<td>".$row['Quantity_Per_Unit']."</td>";
		$output .= "<td class='productprice' data-name=".$row['Prod_Unit_Price'] .">".$row['Prod_Unit_Price']."</td>";
		$output .= "<td>".$row['Product_Desc']."</td>";
		$output .= "<td class='productstock' data-name=".$row['Prod_Stock'].">".$row['Prod_Stock']."</td>";
		$output .= "<td><a data-toggle='modal' href='' class='btn btn-success btn-lg additem-button'><i class='icon-plus-sign'></i> Add Item</a></td>";
		$output .= "</tr>";
		//$output .= "</table>";


	}
	else
	{
		/*$output .= "No results found";
		//header('location: search.php');*/
		$output .= "<tr class='append-tr error'><td colspan='7'>";
		$output .= "No Results Found.";
		$output .= "</td></tr>";
	}

	echo $output;
	?>

