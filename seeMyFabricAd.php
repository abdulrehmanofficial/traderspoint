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
if($_SESSION['fabricUser']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

?>


<?php include "fabricHeader.php" ?>

<div class="container-fluid">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Your Fabric Ads Preview</h3>
<?php 
	$email=$_SESSION['fabricUser'];
	 require"connect_db.php";
	$query="select * from fabricads WHERE email='$email' ORDER BY ID DESC";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $category=$row['category'];
	  $fabricName=$row['fabricName'];
	  $colorCode=$row['colorCode'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $price=$row['price'];
	  $qty=$row['qty'];
	  $grade=$row['grade'];
	  $AdPic=$row['AdPic'];
	  $postedOn=$row['postedOn'];
	  
	  ?>
	  <div class="col-md-4">
<br />
	      <a href="AdDetail.php?AdDetail=<?php echo $id; ?>"><div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?></div>
      <div class="panel-body"><img src="<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div class="panel-footer">
	  <b>Fabric Name: </b> <?php echo $fabricName; ?><br />
	  <b>Category: </b> <?php echo $category; ?><br />
	  <b>Description:</b><?php echo $AdDesc; ?><br />
	  <b>Available Colors Codes / Names:</b><?php echo $colorCode; ?><br />
	  <b>Price:</b> <?php echo $price; ?><br />
	  <b>Available Quantity:</b> <?php echo $qty; ?><br />
	  <b>Fabric Grade:</b> <?php echo $grade; ?><br />
	   <b>Posted On:</b> <?php echo $postedOn; ?><br />
	  </div>
    </div>
	</a>
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