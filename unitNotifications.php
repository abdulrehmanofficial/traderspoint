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





<div class="container">
<div class="row">

<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Working Unit Hiring/Notifications</h3>
<br />

<table id="myTable" class="table table-condensed">
<thead>
<tr>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<?php 
	$email=$_SESSION['Units'];
	 require"connect_db.php";
	$query="select * from unitnotifications WHERE ownerEmail='$email' AND status='not read'";
    $data=mysqli_query($connect,$query);
	while($row=mysqli_fetch_array($data))
	{
	?>
<tr>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><a href="ApproveUnitNots.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Approve</a> <a href="dismissUnitNots.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Dismiss</a></td>
</tr>
	<?php
	}
?>
<tfoot>
<tr>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
<th>Action</th>
</tr>
</tfoot>
</table>


</div>
</div>

<script>

$(document).ready(function(){
    $('#myTable').DataTable();
});



</script>

<?php include "footer.php"; ?>