<?php 
session_start();

if($_SESSION['verifyEmail']==null){
    header("Location:login.php?msg=Invalid User Name or Password");
        exit();
        die();
    }


if(isset($_POST['Verify']))
{
  if(empty($_POST['code']))
  {
	  echo '<script>alert("Please Enter Verification Code to Continue !")</script>';
  }
  else
  {
	      $code=$_POST['code'];
           require"connect_db.php";
           $verifyEmail=$_SESSION['verifyEmail'];

            $preQuery="select vCode from registerforunits WHERE email='$verifyEmail'";
            $preData=mysqli_query($connect,$preQuery);
            $preRow=mysqli_fetch_array($preData);

            if($code==$preRow['vCode'])
            {
                $query="Update registerforunits SET vStatus='Yes' WHERE email='$verifyEmail'";
              if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Email has been Verified Please Login to Proceed !")</script>';
	           echo '<script>window.location="login.php#top"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="unitEmailVerify.php#top"</script>';
              }
            }
            else
            {
                  echo '<script>alert("Invalid Verification Code ! Try Again !")</script>';
    	          echo '<script>window.location="unitEmailVerify.php#top"</script>';
            }
  }
}

?>


<?php include "header.php" ?>

<div class="container-fluid">
<div class="row">


<div class="col-md-3"></div>

<div id="top" class="col-md-6">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">
Please Check your Email for the Verification Code to Continue !
</h3><br />
<form method="post">
<input style="margin-bottom:7px" type="text" class="form-control" name="code" placeholder="Please Enter Verification Code"/>
<center><input class="btn btn-success" type="submit" name="Verify" value="Verify !" /></center>
<br>
</form>



</div>

<div class="col-md-3"></div>

</div>
</div>



<?php include "footer.php" ?>