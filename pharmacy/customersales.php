<?php
session_start();
if (!isset($_SESSION['accesstype'])){
	header('Location: login.php');
}
	$accesstype = $_SESSION['accesstype'];
	$username = $_SESSION['username'];
	include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<script src="js/jquery-2.0.0.min.js"></script>	
	<title>Admin</title>
	<script src="js/jquery.pnotify.min.js"></script>	
	<link rel="stylesheet" href="css/jquery.pnotify.default.css"  type="text/css"/> 
	<link rel="stylesheet" href="css/bootplus-responsive.css"  type="text/css"/> 
	<link rel="stylesheet" href="css/bootplus-responsive.min.css"  type="text/css"/> 
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css"/>
	<link rel="stylesheet" href="css/bootstrap-responsive.css"  type="text/css"/>
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css"  type="text/css"/>


	<script src="js/bootstrap-alert.js"></script>
	<script src="js/bootstrap-button.js"></script>
	<script src="js/bootstrap-carousel.js"></script>
	<script src="js/bootstrap-collapse.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/bootstrap-fileupload.min.js"></script>
	<script src="js/bootstrap-modal.js"></script>
	<script src="js/bootstrap-paginator.min.js"></script>
	<script src="js/bootstrap-popover.js"></script>
	<script src="js/bootstrap-scrollspy.js"></script>
	<script src="js/bootstrap-tab.js"></script>	
	<script src="js/bootstrap-transition.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<script src="js/jquery.pnotify.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
</head>

<body>
		<div class="container-fluid">

	<h1 style="margin-top:50px" class="pull-left"><a href="transactions.php">Customer Sales</a></h1>
	<h3 style="margin-top:50px" class="pull-right"><a href="">Hi, <?php echo $username; ?>.</a></h3>
	<div class="row-fluid">
		<br/>
<?php if($accesstype == "admin"){?>
	<h4 style="margin-top:70px; margin-right:-100px" class="pull-right">Admin</h4>
<?php }else{?>
<h4 style="margin-top:70px; margin-right:-100px" class="pull-right">Employee</h4>
<?php }?>
</div>

</div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
        <ul class="nav nav-list">
          <li class="nav-header"></li>
          <li class="link-supplier"><a  class="link-inventory" href="inventory.php"><i class="icon-th-list"></i> Inventory</a></li>
          <li><a class="link-supplier" href="supplier.php"><i class="icon-user"></i> Supplier</a></li>
          <li class="active"><a class="link-supplier" href="customersales.php"><i class="icon-globe"></i> Customer Sales</a></li>
          <li><a class="link-cashier" href="cashier.php"><i class="icon-shopping-cart"></i> Cashier</a></li>
          <?php if($accesstype == "admin") { ?>
          <li><a class="link-register" href="user.php"><i class="icon-wrench"></i> User Settings</a></li>
          <?php } ?>
           <li><a class="link-logout" href=""><i class="icon-off"></i> Logout</a></li>
        </ul>
        
    </div>

    <div class="span10 well inventory">
           
                <div class="row-fluid">
                     <div class="span12 search"> 
                     	<form action = "" method = "post" class="form-search">
                     		From: <input class="datefrom" type="date" />
                     		To: <input class="dateto" type="date" />
                     		<button class="go-button">Go</button>
                     	<div class="input-append pull-right">
                      <input class="span7 search-query" id="appendedInputButton" name="search" type="text"  placeholder="Search for supplier" > 
                      <a class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px"><i class="icon-search"></i> Search</a> 
                     	</div>
                     	</form>

                    </div>
          
                 <!-- Show Customer -->
                 <div style="margin-top:20px" class="span11 show-customer" >
 					 	<?php
								//DB SELECT Code
								$sqlselect = "SELECT * FROM ordermedicine";

								$result = mysql_query($sqlselect);
								$row = mysql_fetch_array($result);
								
							?>

                      <table class="table table-hover search-result">  
                        <thead>
                        <tr>
                           <th>Customer ID</th>  
                           <th>Customer Name</th>  
                           <th>Customer Address</th>  
                           <th>Total Amount Purchase</th> 
                           <th>Date of Transaction</th>  
                        </tr>  
                        </thead>  
                        <tbody>  
                        
                          <?php
							$total = 0;
                           while ($row = mysql_fetch_assoc($result)) { ?>

							<tr class="customer info">
							<td class="custid" data-name="<?php echo $row['Order_Med_ID']; ?>"><?php echo $row['Order_Med_ID']; ?></td>
							<td><?php echo $row['Cust_Name']; ?></td>
							<td><?php echo $row['Cust_Address']; ?></td>
							<td><?php echo $row['Order_Total_Amt_Purchase']; 
								$total += $row['Order_Total_Amt_Purchase'];
								?></td>
							<td><?php echo $row['Order_Date']; ?></td>
							</tr>
							<?php } ?>
							<tr class="customer info">
								<td colspan='3' style="text-align: right">Total Amount:</td>
								<td colspan='2'><?php echo $total; ?></td>
							</tr>
                        </tbody>  
                     </table> 
                     
                 </div>

                     </div>
              </div>
              </div>
          </div>
        </div>
    </div>   
 </div>
</body>
		
</html>


<script type="text/javascript">
$(document).ready(function(){


	$('.search-button').on('click', function(){
		datastring = $('.form-search').serialize();
		//alert(datastring);
		$.ajax({
			url: "customersearch.php",
			type: "POST",
			data: datastring,
			success: function(data){
				console.log(data);
				$('.customer').remove();
				$('.append-tr').remove();
				$('.search-result').append(data);
					
			}

		});

	});	

	$('.go-button').click(function(e){
		e.preventDefault();
		datefrom = $('.datefrom').val();
		dateto = $('.dateto').val();
		//alert(datefrom);
		$.ajax({
			url: "customergo.php",
			type: "post",
			data: {
				datefrom: datefrom,
				dateto: dateto
			},
			success: function(data){
				$('.customer').remove();
				$('.search-result').append(data);
			}
		});

	});

});

</script>
