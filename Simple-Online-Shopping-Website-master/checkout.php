

<html><head>

  <meta charset="utf-8">
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="css/des.css">


</head>
<body>
<header>
<div class="main">
      <ul>
        <li class="active"> <a href="index.php">HOME</a></li>
        <li><a href="orders.php">YOUR ORDERS</a></li>
      </ul>
    </div>
</header>
    <div class="cart"><h1>
Order Summary</h1><br><br>
<?php

include("includes/connection.php");
session_start();
     $userid=$_SESSION["id"];
$query ="SELECT sum(price),name,contactno,address FROM cart ,items,users where cart.userid=users.id and cart.itemid=items.item_id and cart.userid='$userid';";
 $sel=mysqli_query($db, $query);
   $arr=mysqli_fetch_array($sel);
   echo " <font> Name: ".$arr['name']."</font>";
    echo " <br><font> Contact Number: ".$arr['contactno']."</font>";
     echo " <br><font> Delivery: ".$arr['address']."</font>";
      echo " <br><font>  Amount Payable:".$arr['sum(price)']."</font>";
  $query2 ="INSERT INTO orders
SELECT * FROM cart
WHERE userid='$userid'; ";
 mysqli_query($db, $query2);    
$query1 ="DELETE FROM cart WHERE userid='$userid';";
mysqli_query($db, $query1);
?>
<br><br><br><br><br>

<div class="button">
      <a href="orders.php" class="btn">Order Cancellation</a>
    </div>
</div>
</body></html>