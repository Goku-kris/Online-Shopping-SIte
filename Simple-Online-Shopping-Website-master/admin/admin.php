<?php
include("../includes/connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['t1']);
      $mypassword = mysqli_real_escape_string($db,$_POST['p1']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['adlogin_user'] = $myusername;
         $_SESSION["adloggedin"] = true;
         $_SESSION["adid"] = $id;
         echo "<script>alert('Login Successfull');</script>";
         header("location: ../admin/home.php");
      }else {
         echo "<script>alert('Invalid Login User');</script>";
         header("location: admin.php");
      }
   }
?>


<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/admnstyle.css">
</head>
<body>
<header>
    <div class="main">
      <ul>
        <li class="active"> <a href="../index.php">Client</a></li>
      </ul>
    </div>
  </header>
<div><br><h1 align="center"><font face="Courier New, Courier, monospace">Admin Login</font></h1>
</div>

<br><br><br><br><br>
<div class="add" align="center">
<br><h2>Admin Login</h2>
<table width="200" border="0" align="center">
<form role="form" method="post" name="login" action = "" onSubmit="return valid();">
<tr><td colspan="2"></td></tr>
  <tr>
    <td width="81"><font color="white">UserName:</font></td>
    <td width="103"><label>
      <input name="t1" type="text" id="t1" onChange="return nam()">
    </label></td>
  </tr>
  <tr>
    <td><font color="white">Password:</font></td>
    <td><input name="p1" type="password" id="p1" onChange="return pass()"></td>
  </tr>
 
  <tr>
    <td colspan="2" align="center"><label>
    <input class="btn" name="sub" type="submit" id="sub" value="Login">
    </label></td>
   
  </form>
</table>
</div>



</body>
</html>