<?php
session_start();
include("connection.php");

	$catg = "";
  $img = "";
  $itemno = "";
  $price = "";
    $subcatg = "";
    $errors = array();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$catg = mysqli_real_escape_string($db, $_POST['catg']);
  $img = mysqli_real_escape_string($db, $_POST['t5']);
  $itemno = mysqli_real_escape_string($db, $_POST['t1']);
  $price = mysqli_real_escape_string($db, $_POST['t2']);
    $subcatg = mysqli_real_escape_string($db, $_POST['subcatg']);
  	
  	if (empty($catg)) 
  	{ 
  		array_push($errors, "Category is required");
  	echo "<script>alert('Category is required');</script>";
  	 }
  if (empty($img)) 
  	{ 
  		array_push($errors, "Image is required");
  			echo "<script>alert('Image is required');</script>";
  	 }
  if (empty($itemno)) 
  	{ 
  		array_push($errors, "itemno is required");
  			echo "<script>alert('itemno is required');</script>"; 
  	}
  	 if (empty($price)) 
  	{ 
  		array_push($errors, "Price is required");
  			echo "<script>alert('Price is required');</script>"; 
  	}
  	 if (empty($subcatg)) 
  	{ 
  		array_push($errors, "Subcatg is required");
  			echo "<script>alert('Subcatg is required');</script>"; 
  	}

  	if (count($errors) == 0)
   {


    $query = "INSERT INTO items( catg, subcatg, img, itemno, price) VALUES ('$catg','$subcatg','$img','$itemno','$price')";
    mysqli_query($db, $query);
    echo "<script>alert('Item Successfully Inserted');</script>";
  }
  else
  {
  	echo "<script>alert('Item Not Inserted');</script>";
  }
 } 
?>
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
		<div class="but">
			<a href="view.php" class="btn">View Item</a>
		</div>
    <div class="butn">
      <a href="order.php" class="btn">Orders</a>
    </div>
<div class="add" align="center">
	<form role="form" method="post" name="login" action = "" onSubmit="return valid();">
<table align="center">
<tr>
	<td width="111"><span class="style3">Category:</span></td>
	<td width="264">
	<select name="catg">
  <option value='catg'>Select One</option>
<?php
$q=mysqli_query($db,"select distinct(catg) from items ");
while($n=mysqli_fetch_array($q)){
echo "<option value=".$n['catg'].">".$n['catg']."</option>";
}
?>
</select>
</td>
</tr>
<tr>
	<td><span class="style3">Sub Categoty:</span></td>
<td><input name="subcatg" type="text" id="subcatg"></td>
</tr>
<tr>
<td><span class="style3">Image:</span></td>
<td><input name="t5" type="text" id="t5"></td>
</tr>
<tr>
  <td><span class="style3">Item No: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Price:</span></td>
  <td><label>
  <input name="t2" type="text" id="t2">
  </label></td>
</tr>
<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Add Item" class="btn"></td></tr>
</table>
</form></div>
</body>
</html>