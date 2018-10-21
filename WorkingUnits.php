<?php include "header.php";
include("pagination/function.php");
?>
<head>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
</head>

<div class="container" style="padding-left:40px;padding-right:40px" id="about">

<div id="top" class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Search Working Units</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Search Your Required Working Unit By Category or Type of Unit !
</p>
<br />

<div class="col-md-4"></div>

<div class="col-md-4">
<form action="SearchWorkingUnit.php#top" method="post">
<input style="margin-bottom:7px;" type="text" class="form-control" name="searchUnit" placeholder="Search Working according to Category !!"/> 
<center><input type="submit" class="btn btn-success" name="btnSearchUnit" value="Search Working Unit"/></center>
</form>
<br />
<br />

</div>

<div class="col-md-4"></div>

</div>




<div class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Featured Working Units</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Mostly Hired Working Units are at the top and others are below and can also be Searched according to category !
</p>

<br />

<?php
 require"connect_db.php";
	$query="select * from unitsads ORDER BY ID DESC LIMIT 3";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $AdEmail=$row['email'];
	  $categories=$row['categories'];
	  $machines=$row['machines'];
	  $workers=$row['workers'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $postedOn=$row['postedOn'];
	  $AdPic=$row['AdPic'];
	  
	  
	   require"connect_db.php";
	  $query2="select completed from unitnotifications WHERE ownerEmail='$AdEmail' AND completed='Yes'";
	  $completedOrders=mysqli_query($connect,$query2);
	  $Completed=mysqli_num_rows($completedOrders);
	  
	  ?>
	  <div class="col-md-4">
<br />
	  <div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?> <b>[Completed Orders: <?php echo $Completed; ?>]</b></div>
      <div class="panel-body"><img style="max-height:200px;min-width:100%" src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div style="min-height:250px" class="panel-footer">
	  <b>Categories: </b> <?php echo $categories; ?><br />
	  <b>No of Machines: </b> <?php echo $machines; ?><br />
	  <b>No of Workers: </b><?php echo $workers; ?><br />
	  <b>Description: </b><?php echo $AdDesc; ?><br />
	  <b>Posted On: </b> <?php echo $postedOn; ?><br />
	  <br />
	  <center><a href="HireUnits.php?id=<?php echo $id; ?>" class="btn btn-success">Hire Unit</a></center>
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
	  <h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">All Working Units</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Working Units of All Categories are Here. Check Them out !
</p>

<br />
	  
	  
	  <?php
$connect=mysql_connect("localhost","developer_jugnoo","jugnoobutt2627");
mysql_select_db("developer_traders");



 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 3; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "unitsads ORDER BY ID DESC"; //you have to pass your query over here

$query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
    $data=mysql_query($query,$connect);
	if(mysql_num_rows($data) > 0)
	{
	while($row=mysql_fetch_array($data))
	{
	  $id=$row['id'];
	  $AdEmail=$row['email'];
	  $categories=$row['categories'];
	  $machines=$row['machines'];
	  $workers=$row['workers'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $postedOn=$row['postedOn'];
	  $AdPic=$row['AdPic'];
	  
	   require"connect_db.php";
	  $query2="select completed from unitnotifications WHERE ownerEmail='$AdEmail' AND completed='Yes'";
	  $completedOrders=mysqli_query($connect,$query2);
	  $Completed=mysqli_num_rows($completedOrders);
	  ?>
	  <div class="col-md-4">
<br />
	  <div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?> <b>[Completed Orders: <?php echo $Completed; ?>]</b></div>
      <div class="panel-body"><img style="max-height:200px;min-width:100%" src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div style="min-height:250px" class="panel-footer">
	  <b>Categories: </b> <?php echo $categories; ?><br />
	  <b>No of Machines: </b> <?php echo $machines; ?><br />
	  <b>No of Workers: </b><?php echo $workers; ?><br />
	  <b>Description: </b><?php echo $AdDesc; ?><br />
	  <b>Posted On: </b> <?php echo $postedOn; ?><br />
	  <br>
	  <center><a href="HireUnits.php" class="btn btn-success">Hire Unit</a></center>
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