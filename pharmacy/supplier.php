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

	<h1 style="margin-top:50px" class="pull-left"><a href="supplier.php">Supplier</a></h1>
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
          <li ><a  class="link-inventory" href="inventory.php"><i class="icon-th-list"></i> Inventory</a></li>
          <li class="active"><a class="link-supplier" href="supplier.php"><i class="icon-user"></i> Supplier</a></li>
          <li><a class="link-supplier" href="customersales.php"><i class="icon-globe"></i> Customer Sales</a></li>
          
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
                     	<div class="input-append pull-right">
                      <input class="span7 search-query" id="appendedInputButton" name="search" type="text"  placeholder="Search for supplier" > 
                      <a class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px"><i class="icon-search"></i> Search</a> 
                     	</div>
                     	</form>

                    </div>
          
                
                 <!-- Show Inventory -->
                      <div style="margin-top:20px" class="span11 show-inventory" >
                      	<?php
								//DB SELECT Code
								$sqlselect = "SELECT a.*, b.Product_Name FROM  supplier a LEFT JOIN medicineproduct b ON a.Product_ID = b.Product_ID ORDER BY a.Supplier_ID";

								$result = mysql_query($sqlselect);
								$row = mysql_fetch_array($result);
							?>

                      <table class="table table-hover search-result">  
                        <thead>  
                        <tr>
                           <th>Supplier ID</th>  
                           <th>Supplier Name</th>  
                           <th>Product Name</th>  
                           <th>Date Supplied</th> 
                           <th>Supplier Address</th>
                           <th>Supplier Contact</th>  

                        </tr>  
                        </thead>  
                        <tbody>  
                        
                          <?php while ($row = mysql_fetch_assoc($result)) { ?>

							<tr class="invent info">
							<td class="productid" data-name="<?php echo $row['Product_ID']; ?>"><?php echo $row['Supplier_ID']; ?></td>
							<td><?php echo $row['Supplier_Name']; ?></td>
							<td><?php echo $row['Product_Name']; ?></td>
							<td><?php echo $row['Supplied_Date']; ?></td>
							<td><?php echo $row['Supplier_Address']; ?></td>
							<td><?php echo $row['Supplier_Contact']; ?></td>
							</tr>
							<?php } ?>
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

$('.link-logout').click(function(){
			var x = confirm("Do you want to Logout?");
			if(x){
				$.ajax({
					url: "logout.php",
					type: "get"
				});
			}else{
				return false;
			}
	});

$('.search-button').on('click', function(){
		datastring = $('.form-search').serialize();
		$.ajax({
			url: "suppliersearch.php",
			type: "POST",
			data: datastring,
			success: function(data){
				console.log(data);
				$('.invent').remove();
				$('.append-tr').remove();
				$('.search-result').append(data);
			}

		});

	});	

});

</script>
