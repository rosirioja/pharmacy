<?php

	include('connect.php');
	$searchmed = $_POST['search'];
	
	//DB SELECT Code
	$sqlselect = "SELECT a.*, b.Product_Name FROM  supplier a LEFT JOIN medicineproduct b ON a.Product_ID = b.Product_ID WHERE Supplier_Name = '$searchmed' ORDER BY a.Supplier_ID";

	$result = mysql_query($sqlselect);
	$row = mysql_fetch_assoc($result);
	
	$output = "";
	//Search output
	if ($row != null){
	if ($searchmed==$row['Supplier_Name']) {
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
		$output .= "<td class='productid' data-name=".$row['Product_ID'].">".$row['Supplier_ID']."</td>";
	
		$output .= "<td>".$row['Supplier_Name']."</td>";
		$output .= "<td>".$row['Product_Name']."</td>";
		$output .= "<td>".$row['Supplied_Date']."</td>";
		$output .= "<td>".$row['Supplier_Address']."</td>";
		$output .= "<td>".$row['Supplier_Contact']."</td>";
		$output .= "</tr>";
		//$output .= "</table>";


		}
	}
	else
	{
		/*$output .= "No results found";
		//header('location: search.php');*/
		$output .= "<tr class='append-tr error'><td colspan='6'>";
		$output .= "No Results Found.";
		$output .= "</td></tr>";
	}

	echo $output;
	?>

