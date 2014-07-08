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
	<title>Admin</title>
	<script src="js/jquery-2.0.0.min.js"></script>	
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
	<script src="js/jquery.slimscroll.min.js"></script>
</head>

<body bgcolor="#BFE85B">
	<div class="container-fluid">

	<h1 style="margin-top:50px" class="pull-left"><a href="inventory.php">Inventory</a></h1>
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
          <li class="active"><a  class="link-inventory" href="inventory.php"><i class="icon-th-list"></i> Inventory</a></li>
          <li><a class="link-supplier" href="supplier.php"><i class="icon-user"></i> Supplier</a></li>
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
                     	<?php if($accesstype == "admin"){ ?>
                     		<div class="btn-group">
                     	<button class="btn btn-medium btn-success additem-button"  type="button" ><i class="icon-plus-sign"></i> Add Item</button> 
                 			<button class="btn btn-medium btn-success restock-button"  type="button"><i class="icon-plus-sign"></i> Restock Supply</button>
                     		</div>
                     	<?php }?>
                 			<div class="input-append pull-right">
                      <input class="span7 search-query" id="appendedInputButton" name="search" type="text"  placeholder="Search for medicine" >
                      <a class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px"><i class="icon-search"></i> Search</a> 
<!-- 
                      <button class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px">Search</button>  -->
                 			</div>

                       
                     	</form>
                     	<hr />
                    </div>
          				
 					<!-- Add Supply -->
                
   <div class="addstock" style="display:none; margin-bottom: 50px;">

                     <div>
                      <h2>Add Supply</h2></div> 
                   

                     <div class="row-fluid">  
                      <table class="table table-hover">
                        <thead>  
                        <tr>
                           <th>Medicine</th> 
                        </tr>  
                        </thead>  
                        <tbody>
                        <tr class="info">
                          <td>Product Name : <input class="input- productname" type="text"></td>
                          <td>Quantity Per Unit : <input class="quantity input-mini" type="number" min="0" max="10000"></td>
                          <td>Price Per Unit : <input class="price input-mini" type="number" min="0" max="100000"></td>
                          <td>Product Description : <input class="productdesc" type="text"></td>
                          <td>Stock : <input class="stock input-mini" type="number"></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-hover">
                         <thead>  
                        <tr>
                           <th>Supplier</th> 
                        </tr>  
                        </thead>  
                        <tbody>
                        <tr class="info">
                          <td>Supplier Name : <input class="input-large suppliername" type="text" ></td>
                          <td>Delivered on: <input type="date" class="input-large datedelivered" ></td>
                          <td>Supplier Address: <input type="text" class="input-large supplieraddress"  ></td>
                          <td>Supplier Contact: <input type="text" class="input-large suppliercontact" ></td>

                        </tr>

                        </tbody>

                      </table>
                         
                         <button class="btn btn-medium btn-success pull-right additemsave-button"  type="button" style="margin-right:10px"><i class="icon-ok-circle"></i> Add to Inventory</button>                 
                     </div>
                     <hr />

 					</div>
                
              <!--    Restock Supply -->
                 <div class="restock" style="display:none; margin-bottom:50px;">

                     <div>
                      <h2>Restock Supply</h2></div> 
                  <?php
                  $sqlselect = "SELECT * FROM medicineproduct";

                  $result = mysql_query($sqlselect);

                  ?>

                     <div class="row-fluid tablex">  
                      <table class="table table-hover tableproduct">
                        <thead>  

                           <th>Medicine</th> 
                  
                        </thead>  
                        <tbody>
                        	<tr class="info">
                        <td>Product name: 
                         	
                          	<select>
                          		<?php while( $row=mysql_fetch_assoc($result)) {?>
                          	<option data-id="<?php echo $row['Product_ID'];?>"><?php echo $row['Product_Name'];?></option>

                          		<?php } ?>
                          	</select>
                          </td>
                          <td>No. of Stocks to be Add:
                          	<input class="input-mini" type="number" name="supplierStocks">
                          </td>
                        	</tr>
						</tbody>	
           				</table>

           				<table  class="table table-hover tablesupplier">

                         <thead>  
                        <tr>
                           <th>Supplier</th> 
                        </tr>  
                        </thead>  

                        <tbody>
                   	<tr class="info">
                          <td>Supplier Name : <input type="text" class="input-large suppliername" type="input" ></td>
                          <td>Delivered on: <input type="date" class="input-large datedelivered" ></td>
                          <td>Supplier Address: <input type="text" class="input-large supplieraddress"  ></td>
                          <td>Supplier Contact: <input type="text" class="input-large suppliercontact" ></td>
                   	</tr>

                        </tbody>

                      </table>

                         <button class="btn btn-medium btn-success pull-right restocksave-button"  type="button" style="margin-right:10px"><i class="icon-ok-circle"></i> Save Changes</button>                 
                     </div>
                     <hr/>

 					</div>

                 <!-- Show Inventory -->
                      <div class="span11 show-inventory" >
                      	<?php
								//DB SELECT Code
								$sqlselect = "SELECT * FROM  medicineproduct";

								$result = mysql_query($sqlselect);
							?>

                      <table class="table table-hover search-result">  
                        <thead>  
                        <tr>
                           <th >Product ID</th>  
                           <th>Product Name</th>  
                           <th>Quantity Per Unit</th>  
                           <th>Price Per Unit</th> 
                           <th>Description</th>  
                           <th>Stock</th> 
                           <?php if($accesstype == "admin") { ?>
                           <th>Action</th> 
                           <?php } ?>
                        </tr>  
                        </thead>  
                        <tbody>  
                        
                          <?php while ($row = mysql_fetch_assoc($result)) { ?>

							<tr class="invent info">
							<td class="productid" data-name="<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_ID']; ?></td>
							<td><?php echo $row['Product_Name']; ?></td>
							<td><?php echo $row['Quantity_Per_Unit']; ?></td>
							<td><?php echo $row['Prod_Unit_Price']; ?></td>
							<td><?php echo $row['Product_Desc']; ?></td>
							<td><?php echo $row['Prod_Stock']; ?></td>
							<?php if($accesstype == "admin") { ?>
							<td class="btn-group">
							
					  <a data-toggle="modal" href="" class="btn btn-primary btn-lg edititem-button"><i class="icon-pencil"></i> Edit</a>
						<button class="btn btn-medium btn-danger deleteitem-button"><i class="icon-remove"></i> Delete</button>
				</td>
				<?php } ?>
							</tr>
							<?php } ?>
                        </tbody>  
                     </table> 
                 </div>

                   <!-- Edit Inventory -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  </div><!-- /.modal -->
                     

                     </div>




                <!--  <div class="row-fluid">
                 <div class="span12"> 
                <div class ="pull-right">
                <a href="#" class="btn btn-large btn-success">Add items</a>
                </div> -->
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

/*	$('.inventory').click(function({
		$('.invent').load('inventory.php');
	}));*/

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

	$('.search-result').on('click', 'tr td .edititem-button', function(){
		productid = $(this).parent().parent().first().find('.productid').data('name');
		url = "inventorymodal.php?productid=" + productid;
		$('#myModal').load(url).modal('show');
	});

	$('.search-result').on('click', 'tr td .deleteitem-button', function(){
		var x = confirm("Delete Item?");
		if(x == true){
		productid = $(this).parent().parent().first().find('.productid').data('name');
		//alert(productid);
		
		$.ajax({
			url: 'inventorydeleteitem.php',
			type: "post",
			data: {
				productid : productid
			},
			success: function(){
				$.pnotify({
		 				  title: 'Success',
		 				  text: 'Successfully Deleted an item',
		 				  type: 'danger',
		 				  delay: 2000
		 				  });
		 				
						setTimeout(function(){
							window.location.reload()

						},2000);
			}
		});
		}else{
			return false;
		}
	});

	$('.search-button').on('click', function(){
		datastring = $('.form-search').serialize();
		$.ajax({
			url: "inventorysearch.php",
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

		$('.account-button').click(function(e){
		e.preventDefault();
		datastring= $('.form-account').serialize();
		$.ajax({
			url: "registercheck.php",
			type: "POST",
			data: datastring,
			success: function(data){
				alert("Successfully added an account.");
			}
		})
	});

		$('.restock-button').click(function(){

			$('.addstock').fadeOut();
			$('.restock').toggle('slide');
			
	});

		$('.restocksave-button').click(function(){

			//console.log($(this).prev().prev().children().children().children().find('option:selected').data('id'));

			productid = $(this).prev().prev().children().children().children().find('option:selected').data('id');
			supplierstocks = $(this).prev().prev().children().children().children().find('input').val();
			suppliername = $(this).prev().find('tbody').children().children().find('.suppliername').val();
			supplierdate =  $(this).prev().find('tbody').children().children().find('.datedelivered').val();
			supplieraddress =  $(this).prev().find('tbody').children().children().find('.supplieraddress').val();
			suppliercontact =  $(this).prev().find('tbody').children().children().find('.suppliercontact').val();

			$.ajax({
				url: "inventoryrestock.php",
				type : "POST",
				data : {
					productid : productid,
					supplierstocks : supplierstocks,
					suppliername : suppliername,
					supplierdate : supplierdate,
					supplieraddress : supplieraddress,
					suppliercontact : suppliercontact
				},
				success : function(){
					$.pnotify({
		 				  title: 'Success',
		 				  text: 'Successfully restock an item',
		 				  type: 'success',
		 				  delay: 2000
		 				  });
		 				
						setTimeout(function(){
							window.location.reload()

						},2000);

				}
			});
		});

			$('.additem-button').click(function(){

			$('.restock').fadeOut();
			$('.addstock').toggle('slide');
		
	});
			$('.additemsave-button').click(function(){

				console.log($(this).prev().find('tbody').children().children());

				productname = $(this).prev().prev().find('tbody').children().children().find('.productname').val();
				quantity = $(this).prev().prev().find('tbody').children().children().find('.quantity').val();
				price = $(this).prev().prev().find('tbody').children().children().find('.price').val();
				productdesc = $(this).prev().prev().find('tbody').children().children().find('.productdesc').val();
				stock = $(this).prev().prev().find('tbody').children().children().find('.stock').val();

				suppliername = $(this).prev().find('tbody').children().children().find('.suppliername').val();
				supplierdate =  $(this).prev().find('tbody').children().children().find('.datedelivered').val();
				supplieraddress =  $(this).prev().find('tbody').children().children().find('.supplieraddress').val();
				suppliercontact =  $(this).prev().find('tbody').children().children().find('.suppliercontact').val();


				$.ajax({
					url: "inventoryadditem.php",
					type: "post",
					data: {
						productname: productname,
						quantity: quantity,
						price: price,
						productdesc: productdesc,
						stock: stock,
						suppliername: suppliername,
						supplierdate: supplierdate,
						supplieraddress: supplieraddress,
						suppliercontact: suppliercontact
					},
					success: function(){
						$.pnotify({
		 				  title: 'Success',
		 				  text: 'Successfully added an item in the inventory',
		 				  type: 'success',
		 				  delay: 2000
		 				  });
		 				
						setTimeout(function(){
							window.location.reload()

						},2000);

					}

				});
			});


});

</script>
