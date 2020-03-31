
<html><head>

  <meta charset="utf-8">
  <title>Cart</title>
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
<div class="cart">

   <h1>Items in Cart</h1><br><br>

      <?php

include("includes/connection.php");
session_start();
     $userid=$_SESSION["id"];
$query ="SELECT * FROM cart ,items,users where cart.userid=users.id and cart.itemid=items.item_id and cart.userid='$userid';";
 $sel=mysqli_query($db, $query);
   echo"<form method='post'><table border='0' align='center'><tr>";
   $n=1;
    while($arr=mysqli_fetch_array($sel))
   {
   $i=$arr['itemno'];
   $j=$arr['img'];
   $o=$arr['cartid'];
    if($n%2==0)
  {
  echo "<tr>";
  }
   echo "
   <td height='100' width='800' align='center'><img src='images/$j' height=100' width='100'><br/>
  
 <font color='red'><b>Item No:</b>".$arr['itemno'].
   "<br><b>Price:</b>Rs&nbsp;".$arr['price'].
   "<br><br><input class='btn' type='submit' name='$o' value='Remove from Cart'>".
   "</font><br><br>

   </td>";
  $n++;

   }
      echo "</tr></table>
       </form>";

$status=""; 
$k = 0;
while( $k < 30 ) {
  if( isset($_POST[$k]) ) 
    {
      $code = $k;
      $userid=$_SESSION["id"];
 $cartid=$code;
 header("Refresh:0");
 $query = "DELETE FROM cart WHERE userid='$userid' and cartid='$cartid';";
 mysqli_query($db, $query);
    }
  $k++;
}
?>
<div class="button">
      <a href="checkout.php" class="btn">Place Order</a>
    </div>
</div>
</body></html>