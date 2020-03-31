<?php

include_once 'includes/connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li class="active"> <a href="index.php">HOME</a></li>
				<li><a href="cart.php">CART</a></li>
			</ul>
		</div>

		<div class="button">
			<a href="shirt.php" class="btn">SHIRTS</a>
		</div>
		<div class="butn">
			<a href="jeans.php" class="btn">JEANS</a>
		</div>
		<div class="but">
			<a href="shoes.php" class="btn">FOOT WEARS</a>
		</div>
		<div class="a">
			<a href="reg.php" class="bttn">REGISTER</a>
			<a href="login.php" class="bttn">
				<?php 
				error_reporting(0);
					if ($_SESSION['login_user']=="") 
					{
   						echo "LOGIN";
					}
					else
					{
						echo "{$_SESSION['login_user']}";
					}

				 ?>
				
			</a>
			<a href="logout.php" class="bttn">LOGOUT</a>
		</div>
		<div class="title">
			<div class="os ">ONLINE SHOPPING</div>
		</div>
	</header>
		<footer>
			<ul>
				<li class="adbt"> <a href="admin/admin.php">ADMIN</a></li>
			</ul>
		</footer>
	
</body>