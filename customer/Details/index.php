<?php
session_start();
 include "header.php" ?>

<div class="container">

<div class="row">

<?php
	$id=$_GET['id'];
	 require"../connect_db.php";
	$query="select * from companyAds WHERE id='$id'";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $_SESSION['AdEmail']=$row['email'];
	  $category=$row['category'];
	  $products=$row['products'];
	  $AdTitle=$row['AdTitle'];
	  $AdDesc=$row['AdDesc'];
	  $priceRange=$row['priceRange'];
	  $minOrder=$row['minOrder'];
	  $SearchTags=$row['SearchTags'];
	  $AdPic=$row['AdPic'];
	  $postedOn=$row['postedOn'];
	}
	?>
	<h2 style="font-family: 'Carter One', cursive;" class="text-center"><?php echo $AdTitle; ?></h2>
	<div class="col-md-4">
	<img src="../<?php echo $AdPic; ?>" class="img-responsive img-thumbnail"/>
	</div>
	<div class="col-md-8">
	<h4><b>Description:</b> <?php echo $AdDesc; ?><br /></h4>
	<h4><b>Minimum Order:</b> <?php echo $minOrder; ?> Pieces<br /></h4>
	<h4><b>Price Range / Piece:</b> <?php echo $minOrder; ?> $<br /></h4>
	<h4><b>Category:</b> <?php echo $category; ?><br /></h4>
	<h4><b>Products:</b> <?php echo $products; ?><br /></h4>
	
	<?php
	$AdEmail=$_SESSION['AdEmail'];
	 require"../connect_db.php";
	$query="select * from portfolio WHERE email='$AdEmail' ORDER BY ID DESC LIMIT 1";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
		$pic1=$row['pic1'];
		$pic2=$row['pic2'];
		$pic3=$row['pic3'];
		$pic4=$row['pic4'];
		$pic5=$row['pic5'];
		$pic6=$row['pic6'];
	}
	?>
	<h3 class="alert alert-success" style="font-family: 'Carter One', cursive;">Portfolio</h3>
	<a href="../../<?php echo $pic1; ?>"><img src="../../<?php echo $pic1; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	<a href="../../<?php echo $pic2; ?>"><img src="../../<?php echo $pic2; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	<a href="../../<?php echo $pic3; ?>"><img src="../../<?php echo $pic3; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	<a href="../../<?php echo $pic4; ?>"><img src="../../<?php echo $pic4; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	<a href="../../<?php echo $pic5; ?>"><img src="../../<?php echo $pic5; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	<a href="../../<?php echo $pic6; ?>"><img src="../../<?php echo $pic6; ?>" style="width:200px;height:150px" class="img-responsive img-thumbnail"/></a>
	
	
	<?php
	}
	?>
	</div>
	<?php
	
	}
	else
	{
		?>
			<h3 class="text-center" style="font-family: 'Carter One', cursive;color:red">**** No Information ! ****</h3>
		<?php
	}

?>



</div>

<hr />
<div class="row">
<?php
	$AdEmail=$_SESSION['AdEmail'];
	 require"../connect_db.php";
	$query="select * from registerfororders WHERE email='$AdEmail'";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
		$name=$row['name'];
		$company=$row['company'];
		$designation=$row['designation'];
		$registerDate=$row['registerDate'];
	}
?>




<div class="panel-group" id="accordion">
	<div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title text-center">
          <a style="font-family: 'Carter One', cursive;" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Login OR Signup to Continue !</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse in">
        <div class="panel-body">
		<center><a class="btn btn-success" href="../login.php?ref=<?php echo md5("chat"); ?>&address=<?php echo $AdEmail; ?>">Login</a> <b>OR</b> <a class="btn btn-primary" href="../register.php?ref=<?php echo md5("afterReg"); ?>&address=<?php echo $AdEmail; ?>">Signup</a> <b>For Conversation with this Customer !</b></center>
		</div>
      </div>
	</div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title text-center">
          <a style="font-family: 'Carter One', cursive;" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Contact Supplier !</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		
		<form method="post" action="mailSupplier.php">
		<input type="text" style="margin-bottom:7px" class="form-control" name="emailAddress" placeholder="Please Enter Your Email Address" />
		<input type="text" style="margin-bottom:7px" class="form-control" name="Subject" placeholder="Please Subject of Contact" />
		<input type="hidden" style="margin-bottom:7px" class="form-control" name="supplierEmail" value="<?php echo $AdEmail; ?>" />
		<textarea style="margin-bottom:7px" rows="10" class="form-control" name="message" placeholder="Type Your Message Here !"></textarea>
		<center><input type="submit" class="btn btn-success" name="SendMessage" value="Contact Supplier"/></center>
		</form>
		
		</div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title text-center">
          <a style="font-family: 'Carter One', cursive;" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Company Information</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<h4><b>Company Name: </b><?php echo $company; ?></h4>
		<h4><b>Registrar Name: </b><?php echo $name; ?></h4>
		<h4><b>Designation of Registrar in Company: </b><?php echo $designation; ?></h4>
		<h4><b>Registered with us at: </b><?php echo substr($registerDate,0,10); ?></h4>
		
		</div>
      </div>
    </div>
  </div>

</div>

<?php
	}
?>

</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b49c30e4af8e57442dca64a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->




<?php include "footer.php" ?>