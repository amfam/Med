<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<!--<title>Medicine Directory</title>-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <ul class= "head">
         <li><a href="index.php">Medical Inventory</a>
         </li>
     </ul>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
        <p>
			Want to sign in as a guest? 
            <a href="guest.php">Guest</a>
		</p>
	</form>


</body>
</html>