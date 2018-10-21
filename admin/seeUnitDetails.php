<?php
session_start();
$expireAfter = 60;
if(isset($_SESSION['last_action'])){
    $secondsInactive = time() - $_SESSION['last_action'];
    $expireAfterSeconds = $expireAfter * 60;
    if($secondsInactive >= $expireAfterSeconds){
        session_unset();
        session_destroy();
    } 
}
if($_SESSION['admin']==null){
header("Location:index.php?msg=Invalid User Name or Password");
	exit();
	die();
}


if(isset($_POST['logout']))
	{
		session_unset();
        session_destroy();
		header("Location:index.php?msg=Thank You for Using Traders Point");
	exit();
	die();
	}
  ?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/fonts.css" rel="stylesheet">
  <link href="../css/fonts2.css" rel="stylesheet">
  <link href="../css/slippry.css" rel="stylesheet">
  
  </head>
  <body>
  
  <ul id="slider">
  <li>
    <a href="#slide1"><img style="width:100%" src="../images/header-img.jpg" alt="<center><h1 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Traders Point</h1><h2 style='color:white;font-family: Acme, sans-serif;font-size:3.2vw'>First Order Providing and Services Provider to Manufacturers and Traders in Sialkot</h2></center>"></a>
  </li>
  <li>
    <a href="#slide2"><img src="../images/pic2.jpeg"  alt="<center><h2 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Manufacturing Orders</h2><a class='btn btn-info btn-lg' style='color:white' href='../register.php'>Get Yourself Registered !</a></center>"></a>
  </li>
  <li>
    <a href="#slide3"><img src="../images/pic3.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Fabric Sales and Purchase</h3><a class='btn btn-info btn-lg' href='../FabricSales.php' style='color:white'>See Fabric Section</a></center>"></a>
  </li>
  <li>
    <a href="#slide4"><img src="../images/pic4.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Registration in Chamber!</h3><a class='btn btn-info btn-lg' style='color:white' href='../registerInChamber.php'>Register in Chamber</a></center>"></a>
  </li>
  <li>
    <a href="#slide5"><img src="../images/pic5.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Workers and Working Units!</h3><a class='btn btn-info btn-lg' style='color:white' href='../WorkingUnits.php'>See Working Units</a></center>"></a>
  </li>
</ul>

<nav id="mNavbar" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Trader's Point</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="adminDashboard.php">Home</a></li>
        <li><a href="FabricDetails.php">Fabric Details</a></li>
		<li><a href="UnitsDetails.php">Working Units Details</a></li>
		<li><a href="mAds.php">Manufacturing Ads</a></li>
		<li><a href="fAds.php">Fabric Ads</a></li>
		<li><a href="wAds.php">Working Units Ads</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
        <li>
		<form method="post">
		<input style="margin-top:10px" type="submit" class="btn btn-danger" value="LOG OUT" name="logout" />
		</form>
		</li>

      </ul>

    </div>
  </div>
</nav>


<script src="../js/slippry.min.js"></script>
	<script>
$(document).ready(function(){
	  $('#slider').slippry(
		defaults = 
		{
			loadingClass: 'sy-loading',
			transition: 'kenburns',
			kenZoom: 140,
			useCSS: true,
			speed: 6000,
			pause: 10000,
			initSingle: false,
			auto: true,
			preload: 'visible',
			pager: false,
			easing:'swing',
		} 
	  
	  )
	});
    </script>
 <br />
 <div class="container">
 <div class="row">
 
 <h1 class="text-center">Working Unit Details</h1>
 
 <div class="col-md-4"></div>
<?php
 require"connect_db.php";
	$id=$_GET['id'];
	$query="select * from unitsads WHERE id='$id'";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $categories=$row['categories'];
	  $machines=$row['machines'];
	  $workers=$row['workers'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $postedOn=$row['postedOn'];
	  $AdPic=$row['AdPic'];
	}
	  ?>
	  <div class="col-md-4">
<br />
	<div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?></div>
      <div class="panel-body"><img src="../<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div class="panel-footer">
	  <b>Categories: </b> <?php echo $categories; ?><br />
	  <b>No of Machines: </b> <?php echo $machines; ?><br />
	  <b>No of Workers: </b><?php echo $workers; ?><br />
	  <b>Description: </b><?php echo $AdDesc; ?><br />
	  <b>Posted On: </b> <?php echo $postedOn; ?><br />
	  </div>
    </div>
	 <?php
	}
	else
	{
 ?>
 <h3 class="alert alert-danger">Nothing Found !</h3>
	<?php 
	}
	?>
	  </div>
 
 
 <div class="col-md-4"></div>
 

 
</div>
</div>
<br />

 
 
 
<?php include "footer.php" ?>