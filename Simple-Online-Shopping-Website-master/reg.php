<?php
include("includes/connection.php");

session_start();

// initializing variables
$username = "";
$email    = "";
$num    = "";
$address    = "";
$errors = array(); 

// connect to the database

// REGISTER USER
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  $num = mysqli_real_escape_string($db, $_POST['num']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) 
  	{ 
  		array_push($errors, "Username is required");
  	echo "<script>alert('Username is required');</script>";
  	 }
  if (empty($email)) 
  	{ 
  		array_push($errors, "Email is required");
  			echo "<script>alert('Email is required');</script>";
  	 }
  if (empty($password)) 
  	{ 
  		array_push($errors, "Password is required");
  			echo "<script>alert('Password is required');</script>"; 
  	}


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $username) {
      array_push($errors, "Username already exists");
      echo "<script>alert('Username already exists');</script>"; 
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
      echo "<script>alert('Email already exists');</script>"; 
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0)
   {


    $query = "INSERT INTO users (name, email, password,contactno,address) 
              VALUES('$username', '$email', '$password','$num','$address')";
    mysqli_query($db, $query);
   $_SESSION['login_user'] = $username;
    $_SESSION['loggedin'] = true;
    header('location: index.php');
  }
  else
  {
  	echo "<script>alert('Error');</script>";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="css/desn.css">
</head>
<body>
	<div>
		<ul>
			<li class="active"> <a href="index.php">HOME</a></li>
		</ul>
	</div>
	<div class="form">
		<form id="registration" method="post" action="">
			<input type="text" name="name" id="button" placeholder="Enter your name"><br><br>
			<input type="text" name="email" id="button" placeholder="Enter your email"><br><br>
			<input type="text" name="pass" id="button" placeholder="Enter your password"><br><br>
			<input type="radio" name="gender" id="rd"><span id="but">Male</span><input type="radio" name="gender" id="rd"><span id="but">Female</span><br><br>
			<select id="ph"><option>+91</option><option>+92</option><option>+93</option><option>+94</option><option>+95</option></select>
			<input type="number" name="num" placeholder="Enter your phone number" id="phone"><br><br>
			<input type="text" name="address" id="button" placeholder="Enter your address"><br><br>
			<input type="text" name="city" id="button" placeholder="Enter your city"><br><br>
			<input type="text" name="country" id="button" placeholder="Enter your country"><br><br>
			<input type="submit" value="Register" id="butt"><br><br>
		</form>
	</div>
</body>
</html>