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

	<h1 style="margin-top:50px" class="pull-left"><a href="user.php">User Settings</a></h1>
	<h3 style="margin-top:50px" class="pull-right"><a href="">Hi, <?php echo $username; ?>.</a></h3>
	<div class="row-fluid">
		<br/>
<?php if($accesstype == "admin"){?>
	<h4 style="margin-top:70px; margin-right:-100px" class="pull-right">Admin</h4>
<?php }else{?>
<h4 style="margin-top:50px; margin-right:-100px" class="pull-right">Employee</h4>
<?php }?>
</div>

</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
        <ul class="nav nav-list">
          <li class="nav-header"></li>
          <li><a  class="link-inventory" href="inventory.php"><i class="icon-th-list"></i> Inventory</a></li>
          <li><a class="link-supplier" href="supplier.php"><i class="icon-user"></i> Supplier</a></li>
          <li><a class="link-supplier" href="customersales.php"><i class="icon-globe"></i> Customer Sales</a></li>
          
          <li><a class="link-cashier" href="cashier.php"><i class="icon-shopping-cart"></i> Cashier</a></li>
          <li class="active"><a class="link-register" href="user.php"><i class="icon-wrench"></i> User Settings</a></li>
           <li><a class="link-logout" href= ""><i class="icon-off"></i> Logout</a></li>
        </ul>
        
    </div>

    <div class="span10 well inventory">
                     <div class="row-fluid">
                     <div class="span12 search"> 
                     	<form action = "" method = "post" class="form-search">
                      <button class="btn btn-medium btn-success adduser-button"  type="button" style="margin-right:10px"><i class='icon-plus-sign'></i> Add User Account</button> 
                     	
                     		<div class="input-append pull-right">
                      <input class="span7 search-query" id="appendedInputButton" name="search" type="text"  placeholder="Search for user" > 
                      <button class="btn btn-medium btn-info search-button"  type="button" style="margin-right:10px"><i class="icon-search"></i> Search</button> 
                     		</div>
                     	
                     	</form>

                    </div>
          
                
                 <!-- Show User List -->
                      <div class="span11 show-inventory" >
                      	<?php
								//DB SELECT Code
								$sqlselect = "SELECT * FROM user";

								$result = mysql_query($sqlselect);
							?>

                      <table class="table table-hover search-result">  
                        <thead>  
                        <tr>
                           <th>Username</th>  
                           <th>First Name</th>  
                           <th>Last Name</th>  
                           <th>Gender</th> 
                           <th>Date of Birth</th> 
                           <th>Address</th>
                           <th>Access Type</th> 
                           <th>Action</th>
                        </tr>  
                        </thead>  
                        <tbody>  
                        
                          <?php while ($row = mysql_fetch_assoc($result)) { ?>

							<tr class="invent info">
							<td class="employeeid" data-name="<?php echo $row['Employee_ID']; ?>"><?php echo $row['Username']; ?></td>
							<td><?php echo $row['First_Name']; ?></td>
							<td><?php echo $row['Last_Name']; ?></td>
							<td><?php echo $row['Sex']; ?></td>
							<td><?php echo $row['Dob']; ?></td>
							<td><?php echo $row['Address']; ?></td>
							<td><?php echo $row['Access_Type']; ?></td>
							<td class='btn-group'>
					 <a data-toggle="modal" href="" class="btn btn-primary btn-lg edititem-button"><i class='icon-pencil'></i> Edit</a>
						<button class="btn btn-medium btn-danger deleteitem-button"><i class='icon-remove'></i> Delete</button>
				</td> 
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

	$('.adduser-button').click(function(){
		url = "register2.php";
		$('#myModal').load(url).modal('show');

	});

$('.search-button').on('click',function(){
	datastring = $('.form-search').serialize();
	//alert(datastring);
	$.ajax({
		url: "usersearch.php",
		type: "post",
		data: datastring,
		success: function(data){
			$('.invent').remove();
			$('.append-tr').remove();
			$('.search-result').append(data);
		}
	});
});

$('.search-result').on('click', 'tr td .edititem-button', function(){
		userid = $(this).parent().parent().find('.employeeid').data('name');
		url = "usermodal.php?userid=" + userid;
		$('#myModal').load(url).modal('show');

});

$('.search-result').on('click', 'tr td .deleteitem-button', function(){
	userid = $(this).parent().parent().find('.employeeid').data('name');
	x = confirm("Delete this user?");
	if(x){
	$.ajax({
		url: "userdelete.php",
		type: "post",
		data: {
			userid: userid
		},
		success: function (){
		 				
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

});

</script>
