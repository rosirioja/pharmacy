 <?php
  include('connect.php');

    $productid = $_GET['productid'];
    //DB SELECT Code
    $sqlselect = "SELECT * FROM  medicineproduct WHERE Product_ID = '$productid'";

    $result = mysql_query($sqlselect);
    $row = mysql_fetch_assoc($result);
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
  <script src="js/bootstrap-modal.js"></script>
  <script src="js/bootstrap-paginator.min.js"></script>
  <script src="js/bootstrap-popover.js"></script>
  <script src="js/bootstrap-scrollspy.js"></script>
  <script src="js/bootstrap-tab.js"></script> 
  <script src="js/bootstrap-transition.js"></script>
  <script src="js/bootstrap-typeahead.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
</head>

<body>

 <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Item</h4>
        </div>
        <div class="modal-body">
           <div class="span12 edit-inventory">
      
           	<form class='edititem-form' method="post" action="">
           	<table class="table table-hover table-striped table-bordered ">

           		<tr>
           			 <th>Product ID</th>  
           			 <td class="productid" name="<?php echo $row['Product_ID']; ?>"><input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID']; ?>" /><?php echo $row['Product_ID']; ?></td>
           		</tr>
           		<tr class="info">
           			 <th >Product Name</th>  
           			 <td><input type="text" name="Product_Name" placeholder="Product Name" value="<?php echo $row['Product_Name']; ?>" /></td>
           		</tr>
           		<tr>
                           <th>Quantity Per Unit</th>  
							<td><input type="text" name="Quantity" value="<?php echo $row['Quantity_Per_Unit']; ?>" /></td>

           		</tr>
           		<tr class="info">
                           <th>Amount</th> 
							<td><input type="text" name="Price" value="<?php echo $row['Prod_Unit_Price']; ?>" /></td>

           		</tr>
           		<tr>
                           <th>Description</th>  
							<td><input type="text" name="Product_Desc" value="<?php echo $row['Product_Desc']; ?>" /></td>

           		</tr>
           		<tr class="info">
                           <th>Stock</th> 
							<td><?php echo $row['Prod_Stock']; ?></td>

           		</tr>
           	</table>
           	</form>
                 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save-itemchange"><i class="icon-ok-circle icon-white"></i> Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

  </body>

  </html>

  <script type="text/javascript">
  $(document).ready(function(){

    $('.save-itemchange').click(function(){
      datastring = $('.edititem-form').serialize();
      alert(datastring);
      $.ajax({
        url: "inventorymodalsave.php",
        type: "post",
        data: datastring,
        success: function(){
          $.pnotify({
            title: 'Success',
            text: 'Successfully changed an Item',
            type: 'success',
            delay: 2000
          });

          setTimeout(function(){
            window.location.reload('inventory.php');
          });
        }

      });

    });

  });
  </script>