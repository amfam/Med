<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <ul class= "head">
         <li><a href="index.php?logout='1'">Medical Inventory</a>
         </li>
     </ul>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- logged in user information -->
		
        
       <ul class="nav_menu">
		  <li>    <a href="guest_med.php">Medicine  Search</a> </li>
        
         <li>
		      <a href="guest_comp.php">Company Search</a>
        </li>
        </ul>
		<!--	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
	
        
         
        
	</div>
   
		
</body>
</html>