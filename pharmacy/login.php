<?php
  session_start();
  if (isset($_SESSION['accesstype'])){
    header('Location: inventory.php');
  }
	include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
</head>
<body background="images/Background.jpg">

    <div class="container-fluid">
         <div class="row">
            <div class="span8">
                <img src ="images/PharmacistsMortar.png" width="1000" height="100"  alt="ACmed">
                <h3 style="margin-left:160px">Caring for your health.</h3>
                <h6 style="margin-left:230px">Copyright 2013 ©</h6>

            </div>
            <div class="span4 hero-unit " style="margin-top:150px">
                <form class="form-horizontal pull-right form-login"  action = "loginpost.php" method = "post">
                  <div class="control-group">
                    <label class="control-label" for="inputUsername" >Username</label>
                    <div class="controls">
                      <input type="text" id="inputUsername"  name = "newUser" placeholder="Username">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword" >Password</label>
                    <div class="controls">
                      <input type="password" id="inputPassword" name = "newPass" placeholder="Password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn btn-success login-button">Log in</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>

    </div>

 	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 	 <script src="js/bootstrap.js"></script>
</body>
		
</html>

<!-- 
<html>
<script type="text/javascript">
$(document).ready(function(){

	$('.login-button').click(function(){

		datastring = $('.form-login').serialize();
		alert(datastring);
		$.ajax({
			url: "logincheck.php",
			type: "POST",
			data: datastring,
			success: function(){
				alert("wth");
			}

		});

	});	

});

</script>

</html> -->