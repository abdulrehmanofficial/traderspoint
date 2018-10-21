<?php
session_start();
if(isset($_POST['LoginBtn']))
{
	if(empty($_POST['username'])||empty($_POST['password']))
	{
		echo '<script>alert("Please Fill out all the Required Information to Login ! Please Re enter and Try again")</script>';
	}
	else
	{
	$user=$_POST['username'];
	$pass=md5($_POST['password']);
	
	 require"connect_db.php";

		$query = "SELECT * FROM adminLogin WHERE Username = '$user' AND Pass = '$pass'";
		$data = mysqli_query($connect,$query);
		if (mysqli_num_rows($data) > 0) 
		{
            $row = mysqli_fetch_array($data);
			$status=$row['status'];
            $_SESSION['admin']= $row['Username'];
			$_SESSION['last_action']= time();
            header('Location:adminDashboard.php');
            exit();
		}
	else
    {
	header("Location:index.php?msg=Invalid User Name or Password");
	exit();
	die();
    }
	}
  	
}
include "header.php";
  ?>
 <br />
 
 <div class="container">
 <div class="row">
 <div class="col-md-4"></div>

 <div class="col-md-4">
 
 <h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">Dear Admin, Please Login to Proceed !</h4>
 <br />
 <form method="post">
 <input style="margin-bottom:7px" class="form-control" type="text" name="username" placeholder="Enter Your Username"/>
  <input style="margin-bottom:7px" class="form-control" type="password" name="password" placeholder="Enter Your Password"/>
  <center><input class="btn btn-success" name="LoginBtn" value="Login" type="submit"/></center>
 </form>
 <?php 
 if(isset($_GET['msg']))
 {
	 $msg=$_GET['msg'];
?>
<h4 class="alert alert-danger"><?php echo $msg; ?></h4>
<?php 
 }
 ?>
 
 
 </div>
 
 
 <div class="col-md-4"></div>
 
</div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

 
 
 
<?php include "footer.php" ?>