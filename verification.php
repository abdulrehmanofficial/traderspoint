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
if($_SESSION['Verification']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if(isset($_POST['Verify']))
{
  if(empty($_POST['ntn'])||empty($_POST['cnic']))
  {
	  echo '<script>alert("Please Fill out all the Required Information to Verify ! Please Re enter and Try again")</script>';
  }
  else if(!filter_var($_POST['ntn'], FILTER_VALIDATE_INT))
  {
	echo '<script>alert("NTN Number cannot contain any alphabet !")</script>';
  }
  else if(!filter_var($_POST['cnic'], FILTER_VALIDATE_INT))
  {
	echo '<script>alert("CNIC cannot contain any alphabet !")</script>';
  }
  else
  {
	      $ntn=$_POST['ntn'];
		  $cnic=$_POST['cnic'];
		  $email=$_SESSION['Verification'];
		  $id=$_SESSION['LoginId'];
		   require"connect_db.php";
		  $query="Update registerfororders SET ntn='$ntn', cnic='$cnic' WHERE email='$email'";
		    if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Request for Verification has been filed ! You will soon be informed by email!")</script>';
	           echo '<script>window.location="index.php"</script>';
			   session_unset();
			   session_destroy();
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="verification.php"</script>';
              }
  }
}

?>


<?php include "header.php" ?>

<div class="container-fluid">
<div class="row">


<div class="col-md-3"></div>

<div class="col-md-6">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">
Dear <?php echo $_SESSION['username']?>,<br>
Please Verify Yourself that you are the Owner of <?php echo $_SESSION['Company']?> !</h3>
<br />

<form method="post">
<input style="margin-bottom:7px" type="text" class="form-control" name="ntn" placeholder="Please Enter Your NTN(National Tax Number) Number"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="cnic" placeholder="Please Enter Your CNIC Number"/>
<center><input class="btn btn-success" type="submit" name="Verify" value="Verify !" /></center>
<br>
</form>



</div>

<div class="col-md-3"></div>

</div>
</div>



<?php include "footer.php" ?>