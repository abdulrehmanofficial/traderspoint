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





<div class="container" style="padding-left:40px;padding-right:40px">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Featured Fabrics</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Mostly Ordered Fabrics are at the top and others are below and can also be Searched according to category and Fabric Names or Colors
</p>

<br />

<?php require"connect_db.php";
	$query="select * from fabricads ORDER BY ID DESC LIMIT 3";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
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
	  
	  
	  $query2="select delivered from fabricnotifications WHERE email='$AdEmail' AND delivered='Yes'";
	  $deliveredOrders=mysqli_query($connect,$query2);
	  $Completed=mysqli_num_rows($deliveredOrders);
	 
	  ?>
	  <div class="col-md-4">
<br />
	  <div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?> <b>[Completed Orders: <?php echo $Completed; ?>]</b></div>
      <div class="panel-body"><img src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div style="min-height:330px" class="panel-footer">
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
	<input type="hidden" name="hidden_id" value="<?php echo $id;?>"/>
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
	  <hr />
	  
	  
	  <div class="row">
	  <h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">All Fabrics</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Fabrics of All Kinds and Stuffs are Here. Check Them out !
</p>

<br />
	  
	  
	  <?php
$connect=mysql_connect("localhost","developer_jugnoo","jugnoobutt2627");
mysql_select_db("developer_traders");



 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 3; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "fabricads ORDER BY ID DESC"; //you have to pass your query over here

$query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
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
	  <div style="min-height:330px" class="panel-footer">
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
	  
	  <?php
echo "<div id='pagingg'>";
echo pagination($statement,$limit,$page);
echo "</div>";
?>
	  
</div>


<br />

<?php include "footer.php" ?>