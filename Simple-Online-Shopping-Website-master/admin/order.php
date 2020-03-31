<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/admnstyle.css">
	<title>Admin Home</title>
</head>
<body >
	<header>
		<div class="main">
			<ul>
				<li class="active"> <a href="home.php">HOME</a></li>
				<li><a href="admin.php">Logout</a></li>
			</ul>
		</div>
	</header>
<div class="button">
			<a href="add.php" class="btn">Add Item</a>
		</div>
		<div class="but">
			<a href="view.php" class="btn">View Item</a>
		</div>
		
<div class="add" align="center">
<?php

include("connection.php");
session_start();
$query ="SELECT * FROM orders,items where orders.itemid=items.item_id";
 $sel=mysqli_query($db, $query);
   echo"<form method='post'><table border='0' align='center'><tr>";
   $n=1;
    while($arr=mysqli_fetch_array($sel))
   {
   $i=$arr['itemid'];
   $j=$arr['userid'];
   $o=$arr['img'];
   $p=$arr['orderid'];
    if($n%2==0)
  {
  echo "<tr>";
  }
   echo "
   <td height='100' width='800' align='center'><img src='../images/$o' height=100' width='100'><br/>
  
 <font color='red'>
  <b>User Id:</b>".$arr['userid'].
 "<br><b>Item No:</b>".$arr['itemid'].
 "<br><br><input class='btn' type='submit' name='$p' value='Delivered'>".
   "</font><br><br>

   </td>";

  $n++;
   }
      echo "</tr></table></form>";

      $status=""; 
$k = 0;
while( $k < 100 ) 
{
  if( isset($_POST[$k]) ) 
    {

      $code = $k;
      $userid=$_SESSION["id"];
 	$orderid=$code;
 	header("Refresh:0");
 	$query = "DELETE FROM orders WHERE userid='$userid' and orderid='$orderid';";
	 mysqli_query($db, $query);
	 
    }
  $k++;
}
?>
</div>

</body>
</html>
