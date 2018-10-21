<?php
session_start();
if(isset($_POST['registerFabric']))
{
  if(empty($_POST['name'])||empty($_POST['company'])||empty($_POST['designation'])||empty($_POST['email'])||empty($_POST['Pass'])||
  empty($_POST['confirmPass']))
  {
	  echo '<script>alert("Please Fill out all the Required Information to Register ! Please Re enter and Try again")</script>';
  }
  else
  {
	  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	  {
   echo '<script>alert("Email Address is not a valid address !!")</script>';
	  }
	  else if(filter_var($_POST['name'], FILTER_VALIDATE_INT))
	  {
		echo '<script>alert("Name Cannot Contain Numbers !!")</script>';
	  }
	  else if(filter_var($_POST['company'], FILTER_VALIDATE_INT))
	  {
		echo '<script>alert("Company Name Cannot Contain Numbers !!")</script>';
	  }
	  else if(filter_var($_POST['designation'], FILTER_VALIDATE_INT))
	  {
		echo '<script>alert("Designation Cannot Contain Numbers !!")</script>';
	  }
	  else if(strlen($_POST['Pass']) < 6)
	  {
		echo '<script>alert("Password cannot be less than 6 Characters !!")</script>';
	  }
	  else{
	  if($_POST['Pass']==$_POST['confirmPass'])
	  {
		  $name=strtoupper($_POST['name']);
		  $company=strtoupper($_POST['company']);
		  $designation=$_POST['designation'];
		  $email=$_POST['email'];
		  $pass=md5($_POST['Pass']);
		  
			   require"connect_db.php";
			  $emailCheck="select * from registerforfabric WHERE email='$email'";
			  $emailResult=mysqli_query($connect,$emailCheck);
			  
			  $CompanyCheck="select * from registerforfabric WHERE company='$company'";
			  $CompanyResult=mysqli_query($connect,$CompanyCheck);
			  
			  if(mysqli_num_rows($emailResult)>0)
			  {
				  echo '<script>alert("Email Already Exists ! Please Try another Email !")</script>';
				  echo '<script>window.location="registerForFabric.php"</script>';
			  }
			  else if(mysqli_num_rows($CompanyResult)>0)
			  {
				  echo '<script>alert("Company Already Registered ! If You are the Owner Please Contact us to Resolve the Issue !")</script>';
				  echo '<script>window.location="registerForFabric.php"</script>';
			  }
			  else
			  {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$vCode = 'TP';
				for ($i = 0; $i < 4; $i++)
				{
					$vCode .= $characters[rand(0, $charactersLength - 1)];
				}

			  $query2="INSERT INTO registerforFabric(name,company,designation,email,pass,vCode) VALUES('$name','$company',
			  '$designation','$email','$pass','$vCode')";
			  
			  if ($connect->query($query2) === TRUE) 
			  {
			      $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                $headers .= 'From: <verification@traders.houseofsoftwares.com>' . "\r\n";
			      
				$msg="Assalam o Allikum,<br><h1>Welcome to Trader's Point !</h1><br>
				Your Email Verification Code is: ".$vCode."<br> Please Enter this Verification Code
				on the Verification page to Verify your Account ! <br> Thank you for Using Trader's Point!";
				mail($email,"Trader's Point Email Verification",$msg,$headers);

				$_SESSION['verifyEmail']=$email;


               echo '<script>alert("Confirmation Code has been Sent to your Email ! Kindly Check Email to Continue !")</script>';
	           echo '<script>window.location="fabricEmailVerify.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="registerForFabric.php"</script>';
              }
			  }  
		  }
	  else
	  {
		  echo '<script>alert("Password and Confirm Password Does not Match !");</script>';
			  echo '<script>window.location="registerForFabric.php"</script>';
	  }  
}
}
}

?>


<?php include "header.php" ?>

<div class="container-fluid">
<div class="row">


<div class="col-md-3"></div>

<div id="top" class="col-md-6">
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Register for Fabric Sales/Purchase</h3>
<br />

<form method="post">
<input style="margin-bottom:7px" type="text" class="form-control" name="name" placeholder="Please Enter Your Name"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="company" placeholder="Please Enter Your Company Name"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="designation" placeholder="Please Enter Your Designation"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="email" placeholder="Please Enter Your Email"/>
<input style="margin-bottom:7px" type="password" class="form-control" name="Pass" placeholder="Please Enter Your Password"/>
<input style="margin-bottom:7px" type="password" class="form-control" name="confirmPass" placeholder="Please Enter Your Confirm Password"/>
<center><input class="btn btn-success" type="submit" name="registerFabric" value="Register" /></center>
<br>
</form>



</div>

<div class="col-md-3"></div>

</div>
</div>



<?php include "footer.php" ?>