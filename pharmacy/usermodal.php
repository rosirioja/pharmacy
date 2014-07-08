 <?php
  include('connect.php');

    $userid = $_GET['userid'];
    //DB SELECT Code
    $sqlselect = "SELECT * FROM user WHERE Employee_ID = '$userid'";

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
  <script src="js/jquery.pnotify.min.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
</head>

<body>

 <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit User Account</h4>
        </div>
        <div class="modal-body">
           <div class="span12 edit-inventory">
      
           	<form class='edititem-form' method="post" action="">
           	<table class="table table-bordered table-hover table-striped">

           		<tr>
           			 <th>Username</th>  
           			 <td class="productid" name="<?php echo $row['Employee_ID']; ?>"><input type="hidden" name="Employee_ID" value="<?php echo $row['Employee_ID']; ?>" /><input type="text" name="Username" value="<?php echo $row['Username']; ?>" /></td>
           		</tr>
           		<tr class="info">
                 <th>First Name</th>  
                 <td><input type="text" name="First_Name" value="<?php echo $row['First_Name']; ?>" /></td>
              </tr>
              <tr>
                 <th>Last Name</th>  
                 <td><input type="text" name="Last_Name" value="<?php echo $row['Last_Name']; ?>" /></td>
              </tr>
           		<tr class="info">
                           <th>Gender</th>  
							<td>
                <?php
                  $status = $row['Sex'];
                  if ($status == "Male"){
                    $input1 = "checked";
                    $input2 = "";
                  }else{
                    $input1 = "";
                    $input2 = "checked";           
                  }
                ?>
                <label class="radio">
                  <input type="radio" name="gender" id="male" value="Male" <?php echo $input1; ?> />
                 Male
                </label>
                <label class="radio">
                  <input type="radio" name="gender" id="female" value="Female" <?php echo $input2; ?>>
                 Female
                </label>

              </td>

           		</tr>
           		<tr>
                           <th>Date of Birth</th> 
							<td><input name="dob" type="date" value="<?php echo $row['Dob']; ?>" /></td>

           		</tr>
           		<tr class="info">
                           <th>Address</th>  
							<td><textarea name="address" ><?php echo $row['Address']; ?></textarea></td>

           		</tr>
           		<tr>
                           <th>Access Type</th> 
							<td>
                <?php
                $access = $row['Access_Type'];
                if ($access == "admin"){
                  $input3 = "checked";
                  $input4 = "";
                }else{
                  $input3 = "";
                  $input4 = "checked";
                }
                ?>
                <label class="radio">
          <input type="radio" name="AccessType" id="admin" value="admin" <?php echo $input3; ?>>
          Administrator
        </label>
        <label class="radio">
          <input type="radio" name="AccessType" id="employee" value="employee" <?php echo $input4; ?>>
          Employee
        </label></td>

           		</tr>
           	</table>
           	</form>
                 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save-itemchange"><i class='icon-ok-circle'></i> Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

  </body>

  </html>

  <script type="text/javascript">
  $(document).ready(function(){

    $('.save-itemchange').click(function(){

      datastring = $('.edititem-form').serialize();
      //alert(datastring);
      $.ajax({
        url: "usermodalsave.php",
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
            window.location.reload('user.php');
          });
        }

      });

    });

  });
  </script>