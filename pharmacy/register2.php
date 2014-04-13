
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
  <script src="js/jquery.pnotify.min.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
</head>

<body>

 <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add User Account</h4>
        </div>
        <div class="modal-body">
           <div class="span12 edit-register">
      
           	<form class='form-register' method="post" action="">
           	<table class="table table-bordered table-hover table-striped">

              <tr>
                 <th>Username</th>  
                 <td><input type="text" name = "newUser" placeholder="Username"></td>
              </tr>
           		<tr class="info">
                 <th>Password</th>  
							<td>
            <input type="password" name = "newPass" placeholder="Password">
              </td>

           		</tr>
           		<tr>
           			 <th>Name</th>  
					<td><input name = "newUserFirstname" class="input input-medium" type="text" placeholder="First Name">
           			 <input class="input input-medium" name = "newUserLastname" type="text" placeholder="Last name"></td>
           		</tr>
           		<tr class="info">
           			 <th>Address</th>  
           			 <td><textarea name = "address" type="text" placeholder="Address"></textarea></td>
           		</tr>
           		<tr>
                           <th>Date of Birth:</th> 
							<td><input type="date" name="dob"></td>

           		</tr>
           		<tr class="info">
                           <th>Gender</th>  
							<td><label class="radio">
					  <input type="radio" name="gender" id="male" value="Male" checked>
					 Male
					</label>
					<label class="radio">
					  <input type="radio" name="gender" id="female" value="Female">
					 Female
					</label></td>

           		</tr>
           		<tr>
                           <th>Access Type</th> 
							<td>
               <label class="radio">
				  <input type="radio" name="AccessType" id="admin" value="admin" checked>
				  Administrator
				</label>
				<label class="radio">
				  <input type="radio" name="AccessType" id="employee" value="employee">
				  Employee
				</label></td>

           		</tr>
           	</table>
           	</form>
                 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary register-button"><i class="icon-ok-circle"></i> Register this account</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

  </body>

  </html>

  <script type="text/javascript">
  $(document).ready(function(){


	$('.register-button').click(function(){
		datastring = $('.form-register').serialize();
		alert(datastring);

		$.ajax({
			url: "registerpost.php",
			type: "post",
			data: datastring,
			success: function(){
						$.pnotify({
		 				  title: 'Success',
		 				  text: 'Successfully created an account',
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