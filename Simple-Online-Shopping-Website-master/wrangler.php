<html>
<head>
	<title>Wrangler</title>
	<link rel="stylesheet" type="text/css" href="css/shirt.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li class="active"> <a href="index.php">HOME</a></li>
			</ul>
		</div>
	</header>
<div><center><h2>Wrangler</h2></center></div>
<div align="center"><br>
	<?php

include("includes/connection.php");
error_reporting(0);
$catg=3;
$subcatg=3;


   $sel=mysqli_query($db,"select * from items where catg='$catg' and subcatg='$subcatg'");
   echo"<form method='post'><table border='0' align='center'><tr>";
   $n=1;
    while($arr=mysqli_fetch_array($sel))
   {
   $i=$arr['itemno'];
   $j=$arr['img'];
    if($n%2==0)
	{
	echo "<tr>";
	}
   echo "
   <td height='280' width='240' align='center'><img src='images/$j' height='200' width='200'><br/>
  
 <b>Item No:</b>".$arr['itemno'].
   "<br><b>Price:</b>Rs&nbsp;".$arr['price'].
   "<br><br><input class='btn' type='submit' name='$i' value='Add to Cart'>

   </td>";
  $n++;

   }
   	  echo "</tr></table>
       </form>";

session_start();
$status=""; 
$k = 17;
while( $k < 20 ) {
	if( isset($_POST[$k]) ) $code = $k;
	$k++;
}

 $userid=$_SESSION["id"];
 $itemid=$code;
 $query = "INSERT INTO cart (userid, itemid, catg,subcatg) VALUES('$userid', '$code', '$catg','$subcatg')";
              mysqli_query($db, $query);
if(empty($_SESSION["shopping_cart"])) {
    
} else {
 
 }
 
 



	?><br>
</div>
</body>
</html>