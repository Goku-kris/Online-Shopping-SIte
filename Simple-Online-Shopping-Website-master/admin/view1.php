<?php
session_start();
$name=$_SESSION['eid'];
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$catg = mysqli_real_escape_string($db, $_POST['catg']);
    $subcatg = mysqli_real_escape_string($db, $_POST['subcatg']);
  	
  	if (empty($catg)) 
  	{ 
  		array_push($errors, "Category is required");
  	echo "<script>alert('Category is required');</script>";
  	 }
  	 if (empty($subcatg)) 
  	{ 
  		array_push($errors, "Subcatg is required");
  			echo "<script>alert('Subcatg is required');</script>"; 
  	}

  	if (count($errors) == 0)
   {


    $query = "SELECT * FROM items where subcatg='$subcatg' and catg='$catg';";
    mysqli_query($db, $query);
  echo" <form method='post'><table border='0' align='center'><tr>";
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
   <td height='100' width='800' align='center'><img src='images/$j' height=100' width='100'><br/>
  
 <font color='red'><b>Item No:</b>".$arr['itemno'].
   "<br><b>Price:</b>Rs&nbsp;".$arr['price'].
   "</font><br><br>

   </td>";
  $n++;

   }
       echo "</tr></table>
       </form>";
 
 ?>