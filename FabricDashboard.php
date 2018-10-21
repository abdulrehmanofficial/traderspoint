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

if(isset($_POST['PostMyAd']))
{
  if(empty($_POST['category'])||empty($_POST['fabricName'])||empty($_POST['AdTitle'])||empty($_POST['AdDesc'])||empty($_POST['price'])||
  empty($_POST['colorCode'])||empty($_POST['qty'])||empty($_POST['grade'])||$_FILES['AdPic']['name']=='')
  {
	  echo '<script>alert("Please Fill out all the Required Information to Register ! Please Re enter and Try again")</script>';
  }
  else
  {
		  	$file_name1=$_FILES['AdPic']['name'];
			$file_tmp1=$_FILES['AdPic']['tmp_name'];
	
	    $folder1="images/$file_name1";
	    move_uploaded_file($file_tmp1,$folder1);
		  
		  $email=$_SESSION['fabricUser'];
		  $category=$_POST['category'];
		  $fabricName=$_POST['fabricName'];
		  $qty=$_POST['qty'];
		  $grade=$_POST['grade'];
		  $colorCode=$_POST['colorCode'];
		  $AdTitle=$_POST['AdTitle'];
		  $AdDesc=$_POST['AdDesc'];
		  $price=$_POST['price'];
		  
		   require"connect_db.php";
		  $query="INSERT INTO fabricads(email, fabricName, colorCode, category, AdTitle, AdDesc, price, qty, grade, AdPic) 
		  VALUES('$email','$fabricName','$colorCode','$category','$AdTitle','$AdDesc','$price','$qty','$grade','$folder1')";
		   if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Ad has been Successfully been Posted !")</script>';
	           echo '<script>window.location="FabricDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error: " . $sql . "<br>" . $connect->error)</script>';
	          echo '<script>window.location="FabricDashboard.php"</script>';
              }

}
}

?>


<?php include "fabricHeader.php" ?>

<div class="container-fluid">
<div class="row">


<div class="col-md-2"></div>

<div id="top" class="col-md-8">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Your Company Information</h3>
<br />
<?php 
	$id=$_SESSION['LoginId'];
	$email=$_SESSION['fabricUser'];
	 require"connect_db.php";
	$query="select * from registerforfabric WHERE email='$email' AND id='$id'";
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

<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-success">Edit Your Fabric Ad Detail for Customer View !</h3>


<form method="post" enctype="multipart/form-data">
<input style="margin-bottom:7px" type="text" class="form-control" name="category" placeholder="Enter Fabric Category e.g Fire Resistant , Cotton , Polyster etc"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="fabricName" placeholder="Enter Fabric Name"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="colorCode" placeholder="Enter Available Colors Code or Names"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="qty" placeholder="Enter Available Quantity"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="grade" placeholder="Enter Fabric Grade e.g A Grade,B Grade etc"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="AdTitle" placeholder="Enter Your Fabric Ad Title"/>
<textarea rows="3" cols="4" style="margin-bottom:7px" type="text" class="form-control" name="AdDesc" placeholder="Enter Description of Your Fabric Ad"></textarea>
<input style="margin-bottom:7px" type="text" class="form-control" name="price" placeholder="Enter Price in Rs"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="AdPic"/>
<center><input class="btn btn-success" type="submit" name="PostMyAd" value="Post My Fabric Ad" /></center>
<br>
</form>



</div>

<div class="col-md-2"></div>

</div>
</div>



<?php include "footer.php" ?>