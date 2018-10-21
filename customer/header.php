<?php
require_once('location.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
// create a variable for the country code
$var_country_code = $geoplugin->countryCode;
// redirect based on country code:
if ($var_country_code == "PK") 
{
header('Location: https://traders.houseofsoftwares.com');
die();
}
else 
{
    
}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/fonts.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/fonts2.css" rel="stylesheet">
  <link href="css/slippry.css" rel="stylesheet">
  
  </head>
  <body>
  
  <ul id="slider">
  <li>
    <a href="#slide1"><img style="width:100%" src="images/1.jpg" alt="<center><h1 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Traders Point</h1><h2 style='color:white;font-family: Acme, sans-serif;font-size:3.2vw'>Provides you Trusted & Verified Exporters from Pakistan</h2></center>"></a>
  </li>
  <li>
    <a href="#slide2"><img src="images/2.jpg"  alt="<center><h2 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Verified Exporters & Traders</h2><p>All the Exporters Registered are Verified from the Chamber of Commerce Pakistan !</p></center>"></a>
  </li>
  <li>
    <a href="#slide3"><img src="images/3.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Fraud Prevention</h3><p>You can Ask For Specific Exporter From us before dealing with him, Also Rating is also available !</p></center>"></a>
  </li>
  <li>
    <a href="#slide4"><img src="images/4.jpg"></a>
  </li>
  <li>
    <a href="#slide5"><img src="images/5.jpg"></a>
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
      <li><a href="About#top">About Us</a></li>
	  <li><a href="SurgicalExporters#top">Surgical Exporters</a></li>
	  <li><a href="SportsExporters#top">Sports Exporters</a></li>
	  <li><a href="GarmentsExporters#top">Garments Exporters</a></li>
	  <li>
	  <form action="Search/index.php#top" class="navbar-form navbar-left" method="post" role="search">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search Here">
		<input type="submit" name="searchBtn" class="btn btn-primary" value="Search" />
    </div>
    
	</form>
	  </li>
    </ul>
	
	<ul class="nav navbar-nav navbar-right">
        <li><a  href="register.php#top"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a  href="login.php#top"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </div>
</nav>


<script src="js/slippry.min.js"></script>
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