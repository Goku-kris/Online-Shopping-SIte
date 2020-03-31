<?php
include("includes/connection.php");
session_start();
$_SESSION["id"]=0;
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      if (empty($username)) 
  	{ 
  	echo "<script>alert('Username is required');</script>";
  	 }
  if (empty($password)) 
  	{ 
  			echo "<script>alert('Password is required');</script>"; 
  	}
      $sql = "SELECT id FROM users WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$id =  $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION["loggedin"] = true;
         $_SESSION["id"] = $id;

       

    mysqli_query($db, $query);

         echo "<script>alert('Login Successfull');</script>";
         header("location: index.php");
      }else {
         echo "<script>alert('Invalid Login User');</script>";
         $flag='Invalid Login User';
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/des.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li class="active"> <a href="index.php">HOME</a></li>
			</ul>
		</div>
	</header>
	<form role="form" method="post" name="login" action = "" onSubmit="return valid();">
	<div class="login-box">
		<h1>Login</h1>
		<div class="textbox">
			Username:
			<input type="text" placeholder="Username" name="username">
		</div><br><br>
		<div class="textbox">
			Password:
			<input type="password" placeholder="Password" name="password">
		</div><br><br>
		<input class="btn" type="submit" name="submit" value="Login">
	</div>
</form>

</body>
</html>