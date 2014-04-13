<?php
	include ('connect.php');

	$search = $_POST['search'];

	$sqlselect = "SELECT * FROM user WHERE Username = '$search'";
	$sql = mysql_query($sqlselect);
	$row = mysql_fetch_array($sql);

	$output = "";

		if($row['Username'] == $search){
		$output .= '<tr class = "append-tr info">';
		$output .= '<td class="employeeid" data-name="'.$row['Employee_ID'].'">'.$row['Username'].'</td>';
		$output .= '<td>'.$row['Last_Name'].'</td>';
		$output .= '<td>'.$row['First_Name'].'</td>';
		$output .= '<td>'.$row['Sex'].'</td>';
		$output .= '<td>'.$row['Dob'].'</td>';
		$output .= '<td>'.$row['Address'].'</td>';
		$output .= '<td>'.$row['Access_Type'].'</td>';

		$output .= '<td><a data-toggle="modal" href="" class="btn btn-primary btn-lg edititem-button"><i class="icon-pencil"></i> Edit</a>
						<button class="btn btn-medium btn-danger deleteitem-button"><i class="icon-remove"></i> Delete</button></td>';
		$output .= '</tr>';
	}else{
		$output .= '<tr class = "append-tr error">';
		$output .= '<td colspan="8">No result found.</td>';
		$output .= '</tr>';

	}


	echo $output;

?>