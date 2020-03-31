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
		
		
<div class="butn">
			<a href="order.php" class="btn">Orders</a>
		</div>
<div class="add" align="center">
<form  name="testform" method="post" enctype="multipart/form-data" >

<table align="center">
<tr><td width="118"><span class="style4">Category:</span></td>

<td width="281">
	<select name="catg">
  <option value=''>Select One</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select></td>
</tr>

<tr><td><span class="style4"> Sub Category:</span></td>
<td><select name="subcatg">
  <option value=''>Select One</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select></td>
</tr>
<br>
<br>
<tr>

	<td colspan="2" align="center"><input   class="btn" type="submit" name="submit" value="View Item"></td></tr>
</table>
</form>
<?php

include("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
	 $userid=$_SESSION["id"];
     $catg= $_POST['catg'];
     $subcatg = $_POST['subcatg'];
$query ="SELECT * FROM items where catg='$catg' and subcatg='$subcatg';";
 $sel=mysqli_query($db, $query);
   echo"<table border='0' align='center'><tr>";
   $n=1;
    while($arr=mysqli_fetch_array($sel))
   {
   $i=$arr['item_id'];
   $j=$arr['img'];
    if($n%2==0)
  {
  echo "<tr>";
  }
   echo "
   <td height='100' width='800' align='center'><img src='../images/$j' height=100' width='100'><br/>
  
 <font color='red'><b>Item No:</b>".$arr['item_id'].
   "<br><b>Price:</b>Rs&nbsp;".$arr['price'].
   "</font><br><br>

   </td>";
  $n++;

   }
      echo "</tr></table>";
}
?>
</div>
</body>
</html>