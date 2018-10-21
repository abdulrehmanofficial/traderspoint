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
if($_SESSION['username']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}
?>


<?php include "loginHeader.php" ?>

<div class="container-fluid">
<div class="row">


<div class="col-md-3"></div>

<div id="top" class="col-md-6">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Your Company Ad Detail Preview</h3>
<br />
<?php
	$id=$_GET['AdDetail'];
	$email=$_SESSION['username'];
	 require"connect_db.php";
	$query="select * from companyads WHERE id='$id' LIMIT 1";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $category=$row['category'];
	  $products=$row['products'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $priceRange=$row['priceRange'];
	  $minOrder=$row['minOrder'];
	  $SearchTags=$row['SearchTags'];
	  $AdPic=$row['AdPic'];
	}
?>
    <img src="<?php echo $AdPic; ?>" class="img img-thumbnail" /><br />
	<h2><?php echo strtoupper($AdTitle); ?></h2><br />
	
	 <b>Category: </b> <?php echo $category; ?><br />
	 <b>Description:</b><br />
	 I manufacture <?php echo $products; ?> Products/Goods. <?php echo $AdDesc; ?><br />
	  <b>Price Range:</b> <?php echo $priceRange; ?><br />
	  <b>Minimum Order:</b> <?php echo $minOrder; ?> Pieces<br />
	  <b>Search Tags:</b> <?php echo $SearchTags; ?><br />
	  
	
<?php
	}
	else
	{
?>
	<div class="alert alert-danger"><h4>No Ad Exists !</h4></div>
<?php
	}
?>

<br /><br />

</div>

<div class="col-md-3"></div>

</div>
</div>



<?php include "footer.php" ?>