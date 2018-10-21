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
if($_SESSION['Units']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if(isset($_POST['PostMyUnitAd']))
{
  if(empty($_POST['categories'])||empty($_POST['machines'])||empty($_POST['AdTitle'])||empty($_POST['AdDesc'])||empty($_POST['workers'])||
  $_FILES['AdPic']['name']=='')
  {
	  echo '<script>alert("Please Fill out all the Required Information to Register ! Please Re enter and Try again")</script>';
  }
  else
  {
		  	$file_name1=$_FILES['AdPic']['name'];
			$file_tmp1=$_FILES['AdPic']['tmp_name'];
	
	    $folder1="images/units/$file_name1";
	    move_uploaded_file($file_tmp1,$folder1);
		  
		  $email=$_SESSION['Units'];
		  $categories=$_POST['categories'];
		  $machines=$_POST['machines'];
		  $workers=$_POST['workers'];
		  $AdTitle=$_POST['AdTitle'];
		  $AdDesc=$_POST['AdDesc'];
		  
		   require"connect_db.php";
		   
	  $queryCount="select * from unitsads WHERE email='$email'";
	  $count_rows=mysqli_query($connect,$queryCount);
	  $counted=mysqli_num_rows($count_rows);
	  if($counted > 0)
	  {
		  $NewQuery="Update unitsads SET categories='$categories', machines='$machines',workers='$workers'
		  ,AdTitle='$AdTitle',AdDesc='$AdDesc',AdPic='$folder1' WHERE email='$email'";
			  if ($connect->query($NewQuery) === TRUE) 
			  {
               echo '<script>alert("Your Ad has been Successfully been Updated !")</script>';
	           echo '<script>window.location="UnitsDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error in Updating!")</script>';
	          echo '<script>window.location="UnitsDashboard.php"</script>';
              }
	  }
	  else{
		   
		  $query="INSERT INTO unitsads(email, categories, machines, workers, AdTitle, AdDesc, AdPic) 
		  VALUES('$email','$categories','$machines','$workers','$AdTitle','$AdDesc','$folder1')";
		   if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Ad has been Successfully been Posted !")</script>';
	           echo '<script>window.location="UnitsDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error ! ")</script>';
	          echo '<script>window.location="UnitsDashboard.php"</script>';
              }
}
}
}

?>

<?php
if(isset($_POST['logout']))
{
	session_unset();
    session_destroy();
	header("Location:login.php?msg=Thanks For Using Traders Point ! Bye Bye !");
	exit();
	die();
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/fonts2.css" rel="stylesheet">
  <link href="css/slippry.css" rel="stylesheet">
  
  </head>
  <body>
  
  <ul id="slider">
  <li>
    <a href="#slide1"><img style="width:100%" src="images/header-img.jpg" alt="<center><h1 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Traders Point</h1><h2 style='color:white;font-family: Acme, sans-serif;font-size:3.2vw'>First Order Providing and Services Provider to Manufacturers and Traders in Sialkot</h2></center>"></a>
  </li>
  <li>
    <a href="#slide2"><img src="images/pic2.jpeg"  alt="<center><h2 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Manufacturing Orders</h2><a class='btn btn-info btn-lg' style='color:white' href='register.php'>Get Yourself Registered !</a></center>"></a>
  </li>
  <li>
    <a href="#slide3"><img src="images/pic3.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Fabric Sales and Purchase</h3><a class='btn btn-info btn-lg' href='FabricSales.php' style='color:white'>See Fabric Section</a></center>"></a>
  </li>
  <li>
    <a href="#slide4"><img src="images/pic4.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Registration in Chamber!</h3><a class='btn btn-info btn-lg' style='color:white' href='registerInChamber.php'>Register in Chamber</a></center>"></a>
  </li>
  <li>
    <a href="#slide5"><img src="images/pic5.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Workers and Working Units!</h3><a class='btn btn-info btn-lg' style='color:white' href='WorkingUnits.php'>See Working Units</a></center>"></a>
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
        <li><a href="UnitsDashboard.php">Home</a></li>
        <li><a href="seeMyUnitAd.php">See My Existing Ad</a></li>
		<li><a href="unitOrderHistory.php">Order History</a></li>
		
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<?php 
	 require"connect_db.php";
	$query="SELECT * from unitnotifications WHERE status='not read'";
	$data=mysqli_query($connect,$query);
	$nots=mysqli_num_rows($data);
	?>
	<li><a href="unitNotifications.php"><span class="glyphicon glyphicon-globe"></span>&nbsp;<b style="color:white;font-size:22px"><?php echo $nots; ?></b> Notifications</a></li>
         <li>
		 <form method="post" class="navbar-form">
                            <div class="input-group" style="width: 100%">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" name="logout" type="submit"><span class="glyphicon glyphicon-log-out"></span> Log Out</button>
                                </div>
                            </div>
        </form>
		</li>
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

<div class="container-fluid">
<div class="row">


<div class="col-md-2"></div>

<div class="col-md-8">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Your Company Information</h3>
<br />
<?php 
	$id=$_SESSION['LoginId'];
	$email=$_SESSION['Units'];
	 require"connect_db.php";
	$query="select * from registerforunits WHERE email='$email' AND id='$id'";
    $data=mysqli_query($connect,$query);
	while($row=mysqli_fetch_array($data))
	{
	  $name=$row['name'];
	  $company=$row['company'];
	  $designation=$row['designation'];
	  $email=$row['email'];
	}
?>
<p class="alert alert-info" style="font-size:24px;font-family: 'Passion One', cursive;">

Owner Name: <?php echo $name; ?><br />
Company: <?php echo $company; ?><br />
Designation: <?php echo $designation; ?><br />
Email: <?php echo $email; ?><br />
</p>
<br /><br />

<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-success">Edit Your Working Unit Ad Detail for Customer View !</h3>


<form method="post" enctype="multipart/form-data">
<input style="margin-bottom:7px" type="text" class="form-control" name="categories" placeholder="Enter Unit Categories e.g TShirts , Working Uniforms Manufacturing etc"/>
<input style="margin-bottom:7px" type="number" class="form-control" name="machines" placeholder="Enter Available Number of Machines"/>
<input style="margin-bottom:7px" type="number" class="form-control" name="workers" placeholder="Enter Available Number of Workers"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="AdTitle" placeholder="Enter Your Fabric Ad Title"/>
<textarea rows="3" cols="4" style="margin-bottom:7px" type="text" class="form-control" name="AdDesc" placeholder="Enter Description of Your Fabric Ad"></textarea>
<input style="margin-bottom:7px" type="file" class="form-control" name="AdPic"/>
<center><input class="btn btn-success" type="submit" name="PostMyUnitAd" value="Post My Unit Ad" /></center>
<br>
</form>



</div>

<div class="col-md-2"></div>

</div>
</div>



<?php include "footer.php" ?>