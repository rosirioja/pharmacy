<?php
	include('connect.php');

	$datefrom = $_POST['datefrom'];
	$dateto = $_POST['dateto'];

	$query = "SELECT * FROM ordermedicine WHERE Order_Date BETWEEN '$datefrom' AND '$dateto'";
	$result = mysql_query($query);
	$total =0 ;
	//echo print_r($result);
	$output = "";
	if($result){
	while($row = mysql_fetch_assoc($result)){
		$output .= '<tr class="customer info">';
		$output .= '<td class="custid" data-name='.$row["Order_Med_ID"].'>'.$row["Order_Med_ID"].'</td>';
		$output .= '<td>'.$row['Cust_Name'].'</td>';
		$output .= '<td>'.$row['Cust_Address'].'</td>';
		$output .= '<td>'.$row['Order_Total_Amt_Purchase'].'</td>';
		
		$total += $row['Order_Total_Amt_Purchase'];
		
		$output .= '<td>'.$row['Order_Date'].'</td>';
		$output .= '</tr>';
		
	}
		$output .= "<tr class='customer info'><td colspan='3' style='text-align: right'>Total Amount:</td>";
		$output .= "<td colspan='2'>".$total."</td>";
		$output .= '</tr>';
}else{
	$output .= "<tr class='append-tr error'><td colspan='7'>";
		$output .= "No Results Found.";
		$output .= "</td></tr>";
}

	echo $output;
?>