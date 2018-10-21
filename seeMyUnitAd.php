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
  </head>
  <body>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
	  <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
	
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/header-img.jpg" alt="Traders Point - Who we are" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-family: 'Passion One', cursive;font-size:42px">Trader's Point</h3>
          <p style="font-size:25px;font-family: 'Sirin Stencil', cursive;">First Order Providing and Services Provider to Manufacturers and Traders in Sialkot</p>
        </div>
      </div>

      <div class="item">
        <img src="images/header-img.jpg" alt="Manufacturing Orders" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-family: 'Passion One', cursive;font-size:42px">Manufacturing Orders</h3>
          <p  style="font-size:25px;font-family: 'Sirin Stencil', cursive;">We Help the Manufactures Get Order From Customers Here ! Get yourself Registered Today !</p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/header-img.jpg" alt="Fabric Sales and Purchase" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-family: 'Passion One', cursive;font-size:42px">Fabric Sales and Purchase</h3>
          <p  style="font-size:25px;font-family: 'Sirin Stencil', cursive;">Trader's Point is a Big Platform for Sales and Purchase of Fabric !</p>
        </div>
      </div>
      <div class="item">
        <img src="images/header-img.jpg" alt="Registration in Chamber" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-family: 'Passion One', cursive;font-size:42px">Registration in Chamber</h3>
          <p  style="font-size:25px;font-family: 'Sirin Stencil', cursive;">We make You Register in Chamber while Sitting at Home!</p>
        </div>
      </div>
	  <div class="item">
        <img src="images/header-img.jpg" alt="Registration in Chamber" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-family: 'Passion One', cursive;font-size:42px">Workers and Working Units</h3>
          <p  style="font-size:25px;font-family: 'Sirin Stencil', cursive;">We Provide Spare woking units and workers for Manufacturing your Goods!</p>
        </div>
      </div>
 
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <nav id="mNavbar" class="navbar navbar-inverse navbar-fixed-top">
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
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
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
<br >
	<script>
  $(document).ready(function() {
  var $navbar = $("#mNavbar");
  
  AdjustHeader(); // Incase the user loads the page from halfway down (or something);
  $(window).scroll(function() {
      AdjustHeader();
  });
  
  function AdjustHeader(){
    if ($(window).scrollTop() > 500) {
      if (!$navbar.hasClass("navbar-fixed-top")) {
        $navbar.addClass("navbar-fixed-top");
      }
    } else {
      $navbar.removeClass("navbar-fixed-top");
    }
  }
});
    </script>

<div class="container-fluid">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Your Fabric Ads Preview</h3>
<?php 
	$email=$_SESSION['Units'];
	 require"connect_db.php";
	$query="select * from unitsads WHERE email='$email' ORDER BY ID DESC";
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
	  
	  ?>
	  <div class="col-md-4">
<br />
	<div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?></div>
      <div class="panel-body"><img src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div class="panel-footer">
	  <b>Categories: </b> <?php echo $categories; ?><br />
	  <b>No of Machines: </b> <?php echo $machines; ?><br />
	  <b>No of Workers: </b><?php echo $workers; ?><br />
	  <b>Description: </b><?php echo $AdDesc; ?><br />
	  <b>Posted On: </b> <?php echo $postedOn; ?><br />
	  </div>
    </div>
	  </div>
	  <?php
	}
	}
	else
	{
		?>
		<div class="alert alert-danger">
		<h4>Oops! You Didn't Set any Ad Before.. GO back and Create your First Ad !</h4>
		</div>
	<?php
	}
?>

<br /><br />

</div>

</div>



<?php include "footer.php" ?>