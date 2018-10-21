<?php include "header.php";
include("pagination/function.php");
?>
<head>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
</head>
<div id="top" class="container" style="padding-left:40px;padding-right:40px">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Search Fabric</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Search Your Required Fabric Here !
</p>
<br />
<div class="col-md-4"></div>

<div class="col-md-4">
<form action="SearchFabric.php#top" method="post">
<input style="margin-bottom:7px;" type="text" class="form-control" name="searchFabric" placeholder="Search Fabric Through Color / Fabric Name / Fabric Category"/> 
<center><input type="submit" class="btn btn-success" name="btnSearchFabric" value="Search Fabric"/></center>
</form>
<br />
<br />

</div>

<div class="col-md-4"></div>

</div>
</div>



<?php

if(isset($_POST['btnSearchFabric']))
{
	$searchFabric=$_POST['searchFabric'];

?>

<div class="container" style="padding-left:40px;padding-right:40px">

	  <div class="row">
	  <h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Required Fabrics</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Fabrics you Require are here ! Check Them out !
</p>

<br />
	  
	  
	  <?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("traders");


$query="select * from fabricads WHERE fabricName LIKE '%$searchFabric%' OR colorCode LIKE '%$searchFabric%' OR category LIKE '%$searchFabric%'
		ORDER BY ID DESC";
    $data=mysql_query($query,$connect);
	if(mysql_num_rows($data) > 0)
	{
	while($row=mysql_fetch_array($data))
	{
	  $id=$row['id'];
	  $AdEmail=$row['email'];
	  $category=$row['category'];
	  $fabricName=$row['fabricName'];
	  $colorCode=$row['colorCode'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $price=$row['price'];
	  $qty=$row['qty'];
	  $grade=$row['grade'];
	  $AdPic=$row['AdPic'];
	  
	  require"connect_db.php";
	  $query2="select delivered from fabricnotifications WHERE email='$AdEmail' AND delivered='Yes'";
	  $deliveredOrders=mysqli_query($connect,$query2);
	  $Completed=mysqli_num_rows($deliveredOrders);
	  
	  ?>
	  <div class="col-md-4">
<br />
	  <div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?> <b>[Completed Orders: <?php echo $Completed; ?>]</b></div>
      <div class="panel-body"><img src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div class="panel-footer">
	  <b>Fabric Name: </b> <?php echo $fabricName; ?><br />
	  <b>Category: </b> <?php echo $category; ?><br />
	  <b>Description:</b><?php echo $AdDesc; ?><br />
	  <b>Available Colors Codes / Names:</b><?php echo $colorCode; ?><br />
	  <b>Price:</b> <?php echo $price; ?> / Kg<br />
	  <b>Available Quantity:</b> <?php echo $qty; ?><br />
	  <b>Fabric Grade:</b> <?php echo $grade; ?><br />
	<form method="post" action="cart.php?add&id=<?php echo $row["id"];?>">
	<input type="number" name="quantity" placeholder="Quantity in Kg" class="form-control" value="1"/>
	<input type="hidden" name="hidden_name" value="<?php echo $fabricName;?>"/>
	<input type="hidden" name="hidden_price" value="<?php echo $price;?>"/>
	<center><input type="submit" style="margin-top:10px;"name="add_to_cart" class="btn btn-success" value="Add to Cart" /></center>
	</form>
	  </div>
    </div>
</div>

	  <?php
	}
	}
?>
	  
	  
	  </div>
	  
</div>

<?php

}
else
{
	echo "<center><h4 class='alert alert-danger'>Nothing Searched !! </h4></center>";	
}

?>


<br />

<?php include "footer.php" ?>