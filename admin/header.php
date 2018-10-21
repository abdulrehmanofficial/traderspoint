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
      <li><a href="index.php">Home</a></li>
        <li><a href="../index.php#about">About Us</a></li>
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown" href="../registerInChamber.php">Register in Chamber <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../nameCheck.php">Name Availability Check in Chamber</a></li>
            <li><a href="../registerInChamber.php">Registration in Chamber</a></li>
          </ul>
        </li>
		<li><a href="../login.php">Manufacturing Orders</a></li>
		<li><a href="../FabricSales.php">Fabric Sales & Purchase</a></li>
		<li><a href="../WorkingUnits.php">Working Units</a></li>
		<li><a href="../index.php#contact">Contact Us</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
        <li><a  href="../register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a  href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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