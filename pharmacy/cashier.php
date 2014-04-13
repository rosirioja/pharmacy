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
	<script src="js/jquery.pnotify.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
</head>

<body>
<div class="container-fluid">

  <h1 style="margin-top:50px" class="pull-left"><a href="cashier.php">Cashier</a></h1>
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
          <li><a class="link-supplier" href="supplier.php"><i class="icon-user"></i> Supplier</a></li>
          <li><a class="link-supplier" href="customersales.php"><i class="icon-globe"></i> Customer Sales</a></li>
          
          <li class="active"><a class="link-cashier" href="cashier.php"><i class="icon-shopping-cart"></i> Cashier</a></li>
          <?php if($accesstype == "admin") { ?>
          <li><a class="link-register" href="user.php"><i class="icon-wrench"></i> User Settings</a></li>
          <?php } ?>
           <li><a class="link-logout" href="logout.php"><i class="icon-off"></i> Logout</a></li>
        </ul>
        
    </div>

    <div class="span10 well inventory">
                   <div class="row-fluid">
                     <div class="span12 search"> 
                     	<form action = "" method = "post" class="form-search">
                        <div class="input-append pull-right">
                      <input class="span7 search-query" id="appendedInputButton" name="search" type="text"  placeholder="Search for medicine" >
                      <a class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px"><i class="icon-search"></i> Search</a> 
                      </div>
                     	</form>

                    </div>
          
                
                 <!-- Show Inventory -->
                      <div style="margin-top:20px" class="span11 show-inventory" >
                      	<?php
								//DB SELECT Code
								$sqlselect = "SELECT * FROM  medicineproduct";

								$result = mysql_query($sqlselect);
							?>

                      <table class="table table-hover search-result">  
                        <thead>  
                        <tr>
                           <th>Product ID</th>  
                           <th>Product Name</th>  
                           <th>Quantity Per Unit</th>  
                           <th>Price Per Unit</th> 
                           <th>Description</th>  
                           <th>Stock</th> 
                           <th>Action</th> 
                        </tr>  
                        </thead>  
                        <tbody>  
                        
                          <?php while ($row = mysql_fetch_assoc($result)) { ?>

							<tr class="invent info">
							<td class="productid" data-name="<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_ID']; ?></td>
							<td class="productname" data-name="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></td>
							<td ><?php echo $row['Quantity_Per_Unit']; ?></td>
							<td class="productprice" data-name="<?php echo $row['Prod_Unit_Price']; ?>" ><?php echo $row['Prod_Unit_Price']; ?></td>
							<td><?php echo $row['Product_Desc']; ?></td>
							<td class="productstock" data-name="<?php echo $row['Prod_Stock']; ?>"><?php echo $row['Prod_Stock']; ?></td>
							<td>
							
					 <a data-toggle="modal" href="" class="btn btn-success btn-lg additem-button"><i class="icon-plus-sign"></i> Add Item</a>
		
				</td>
							</tr>
							<?php } ?>
                        </tbody>  
                     </table> 
                 </div>
                     
                 <!-- Order -->
                          <div class="row-fluid">

                              <h3>Order</h3>

                          </div>

                          <div class="row-fluid">
                            <div class="span10" style="margin-left:50px">
                            <table class="table table-hover cust-table">
                              <tr>
                                <td>Customer Name:</td>
                                <td><input class="custname" type="text" name="custname" class="input input-medium" /></td>
                                <td>Address:</td>
                                <td><input class="custaddress" type="text" name="custaddress" class="input input-medium" /></td>
                              </tr>
                            </table>
                            <hr />
                                <form class="order-form" method="post" action="">
                            <table class="table table-hover order-table">  
                              <thead>  
                              <tr> 
                                 <th>Product Name</th>  
                                 <th>Quantity</th>
                                 <th>Price per quantity</th>  
                                 <th>Total</th> 
                                  <th style="text-align:center">Action</th> 
                              </tr>  
                              </thead>  
                              <tbody>
                              
                              <tr class="success">
                                <td colspan="3" style="text-align:right;">Total Amount:</td>
                                <td class="totalamount" colspan="2"></td>
                                
                              </tr>  
                              </tbody> 
                               
                            </table>  
                                </form>
                           
                            	
                           
                          </div>

                          <div class="row-fluid">
                         <div class="row-fluid" style="margin-top:40px">
                             <div class="span10 pull-right btn-group" style="margin-right:-500px"> 
                            <a href="cashierorderform.php" class="btn btn-small print-button"><i class='icon-print'></i> Printer-friendy version</a>
                            <a href="#" class="btn btn-small btn-success assess-button"><i class='icon-ok-circle'></i> Assess Payment</a>
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

$('.print-button').click(function(){

  custname = $(this).parent().parent().parent().parent().children().find('.cust-table').children().find('.custname').val();
  custaddress = $(this).parent().parent().parent().parent().children().find('.cust-table').children().find('.custaddress').val();
  totalamount = $(this).parent().parent().parent().parent().children().find('.order-table').find('tbody').children().find('.totalamount').text();

  localStorage.custname = custname;
  localStorage.custaddress = custaddress;
  localStorage.totalamount = totalamount;

  var productname = [];
  var quantity =  [];
  var productprice = [];
  var producttotal =[];

  $('.orderdetails').each(function(){
    console.log($(this).find('.total').text());
    prodname = $(this).children().first().find('.prodname').val();
    prodquantity = $(this).children().first().next().find('input').val();
    prodprice = $(this).find('.price').find('input').val();
    prodtotal = $(this).find('.total').text();

    productname.push(prodname);
    quantity.push(prodquantity);
    productprice.push(prodprice);
    producttotal.push(prodtotal);
  });

    console.log(productname);
    localStorage['productname'] = JSON.stringify(productname);
    localStorage['quantity'] = JSON.stringify(quantity);
    localStorage['productprice'] = JSON.stringify(productprice);
    localStorage['producttotal'] = JSON.stringify(producttotal);

});

$('.assess-button').click(function(){
  console.log($(this).parent().parent().parent().parent().children().find('.order-table').find('tbody').children().find('.totalamount'));
  custname = $(this).parent().parent().parent().parent().children().find('.cust-table').children().find('.custname').val();
  custaddress = $(this).parent().parent().parent().parent().children().find('.cust-table').children().find('.custaddress').val();
  totalamount = $(this).parent().parent().parent().parent().children().find('.order-table').find('tbody').children().find('.totalamount').text();
 // alert(custname + " " + custaddress + " " + totalamount);
  orderdetails = $('.order-form').serialize();
  //orderinfo = "custname=" + custname + "&custaddress=" + custaddress +"&totalamount=" + totalamount;
  orderinfo = {
    custname: custname,
    custaddress: custaddress,
    totalamount: totalamount
  };
  datastring = orderdetails + '&' + $.param(orderinfo);
  alert(datastring);
x = confirm("Assess Payment? Note: Order Details can no longer be changed after assessment.");
if(x){
  $.ajax({
    url: "cashierorder.php",
    type: "post",
    data: datastring,
    success: function(data){
      alert(data);
      $.pnotify({
        title: "Success",
        text: "Successfully assessed the payment.",
        type: 'success',
        delay: 2000
      });
/*
      setTimeout(function(){
        window.location.reload()
      }, 2000);*/
    }
  });
}else{
  return false;
}
});

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
			url: "cashiersearch.php",
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

$('.search-result').on('click', 'tr td .additem-button', function(){
	productid = $(this).parent().parent().first().find('.productid').data('name');
	productname = $(this).parent().parent().first().find('.productname').data('name');
	productprice = $(this).parent().parent().first().find('.productprice').data('name');
	productstock = $(this).parent().parent().first().find('.productstock').data('name');

	$('.order-table tbody').prepend("<tr class='info orderdetails'><td> <input type='hidden' name='productid[]' value="+productid+"><input type='hidden' class='prodname' value="+productname+">"+ productname +"</td><td class='prodquantity'><input name='quantity[]' type='number' class='orderquantity1 input-small'/></td><td class='price'><input type='hidden' name='productprice[]' value="+productprice+">"+productprice+"</td><td class='total'>0.00</td><td style='text-align:center'><a class='btn btn-danger deleteorder-button' style='margin-top:38psx' href='#'><i class='icon-remove'></i> Delete</a></td></tr>");
	settotal();
});

$('.order-table').on('click', 'tbody tr td .deleteorder-button', function(){
	$(this).parent().parent().remove();
});

$('.order-table').on('keyup', 'tbody tr td .orderquantity1', function(){
	price = $(this).parent().next().text();
	total = price * $(this).val();
	$(this).parent().next().next().text(parseFloat(total).toFixed(2));
		settotal();
});

function settotal(){
	var total = 0;

	$(".total").each(function(){
		total += parseFloat($(this).text());
		$(".totalamount").text(parseFloat(total).toFixed(2));
	});
}
}); 		
</script>
