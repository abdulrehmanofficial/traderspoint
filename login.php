<?php
session_start();
if(isset($_POST['LoginBtn']))
{
	if(empty($_POST['username'])||empty($_POST['password'])||empty($_POST['LoginType']))
	{
		echo '<script>alert("Please Fill out all the Required Information to Login ! Please Re enter and Try again")</script>';
	}
	else
	{
	$user=$_POST['username'];
	$pass=md5($_POST['password']);
	$type=$_POST['LoginType'];
	
	 require"connect_db.php";

	if($type=="company")
	{
		$query = "SELECT * FROM registerfororders WHERE email = '$user' AND pass = '$pass'";
		$data = mysqli_query($connect,$query);
		if (mysqli_num_rows($data) > 0) 
		{
            $row = mysqli_fetch_array($data);
			$status=$row['status'];
			$vStatus=$row['vStatus'];
            $_SESSION['username']= $row['email'];
			$_SESSION['LoginId']= $row['id'];
			$_SESSION['Company']= $row['company'];
			$_SESSION['last_action']= time();

			if($vStatus=="No")
			{
			$_SESSION['verifyEmail']=$row['email'];
			$_SESSION['username']=null;
            header('Location: emailVerify.php');
			exit();
			die();
			}
			else if($status=="Not Verified")
			{
			$_SESSION['status']= $row['status'];
			$_SESSION['username']=null;
			$_SESSION['Verification']=$row['email'];
            header('Location:verification.php');
			exit();
			die();
			}
			else
			{
			$_SESSION['status']= $row['status'];
            header('Location:CompanyDashboard.php');
			exit();
			die();
			}
		}
		else
    {
	header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
    }
	}
	else if($type=="fabric")
	{
		$query = "SELECT * FROM registerforfabric WHERE email = '$user' AND pass = '$pass'";
		$data = mysqli_query($connect,$query);
		if (mysqli_num_rows($data) > 0) 
		{
			$row = mysqli_fetch_array($data);
			$vStatus=$row['vStatus'];
            $_SESSION['fabricUser'] = $row['email'];
			$_SESSION['LoginId']=$row['id'];
			$_SESSION['last_action'] = time();
			
			if($vStatus=="No")
			{
			$_SESSION['verifyEmail']=$row['email'];
			$_SESSION['fabricUser']=null;
            header('Location: fabricEmailVerify.php');
			exit();
			die();
			}
			else
			{
            header('Location:FabricDashboard.php');
			exit();
			}
		}
	else
    {
	header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
    }
	}
	else if($type=="units")
	{
		$query = "SELECT * FROM registerforunits WHERE email = '$user' AND pass = '$pass'";
		$data = mysqli_query($connect,$query);
		if (mysqli_num_rows($data) > 0) 
		{
			$row = mysqli_fetch_array($data);
			$vStatus = $row['vStatus'];
            $_SESSION['Units'] = $row['email'];
			$_SESSION['LoginId'] = $row['id'];
			$_SESSION['last_action'] = time();

			if($vStatus=="No")
			{
			$_SESSION['verifyEmail']=$row['email'];
			$_SESSION['Units']=null;
            header('Location: unitEmailVerify.php');
			exit();
			die();
			}
			else
			{
            header('Location:UnitsDashboard.php');
			exit();
			}
		}
		else
    {
	header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
    }
	}
	
	}
  	
}


include "header.php";
  ?>
 <br />
 
 <div class="container">
 <div class="row">
 
  <div class="col-md-4">
 <h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Please Login for Fabric Purchasing !</h4>
 <br />
 <h4>If You want to Purchase Fabric,You can Login from here and can Order Fabric from Sellers Directly!</h4>
  <center><a href="PurchaserLogin.php" class="btn btn-success">Login for Fabric Purchase</a></center>
 <h4><a href="registerForFP.php">Not Registered Yet ?  Click here to Register !</a></h4>
 </div>
 
 
 <div id="top" class="col-md-4">
 
 <h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Login For Sellers and Company Holders</h4>
 <br />
 <form method="post">
 <input style="margin-bottom:7px" class="form-control" type="text" name="username" placeholder="Enter Your Username"/>
  <input style="margin-bottom:7px" class="form-control" type="password" name="password" placeholder="Enter Your Password"/>
  <select style="margin-bottom:7px" class="form-control" name="LoginType">
  <option value="">Select Type</option>
  <option value="company">Company Login</option>
  <option value="fabric">Fabric Sales Login</option>
  <option value="units">Working Units Login</option>
  </select>
  <center><input class="btn btn-success" name="LoginBtn" value="Login" type="submit"/></center>
 </form>
  <h4><a href="register.php">Not Registered Yet ?  Click here to Register !</a></h4>
 <?php 
 if(isset($_GET['msg']))
 {
	 $msg=$_GET['msg'];
?>
<h4 class="alert alert-danger"><?php echo $msg; ?></h4>
<?php 
 }
 ?>
 
 <br /><br /><br />
 </div>

 
  <div class="col-md-4">
 <h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Please Login for Working Unit Hiring !</h4>
 <br />
 <h4>If You want to Hire a Working Unit or Workers for Your Manufacturing Order. You can Login from Here !</h4>
 <center><a href="UnitsLogin.php" class="btn btn-success">Login for Working Unit Hire</a></center>
 <h4><a href="HirePurchaser.php">Not Registered Yet ?  Click here to Register !</a></h4>
 
 </div>
 
 
 

</div>



</div>


 
 
 
<?php include "footer.php" ?>