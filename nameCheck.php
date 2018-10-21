<?php
include "header.php";
?>
<head>
	<style>
	.form-control
	{
		margin-bottom:10px;
	}
	
	</style>
</head>

<div class="container" style="padding-left:40px;padding-right:40px" id="top">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Check Name Availability in Chamber of Commerce Sialkot !</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Enter Your Desired Company Name for you want to Check Availability in Chamber of Commerce Sialkot!
</p>

<div class="col-md-2"></div>

<div class="col-md-8">

<form method="post">

<input class="form-control" type="text" name="checkName" placeholder="Please Enter Name of Firm You Want to Check"/>
<center><input class="btn btn-success" type="submit" name="checkData" value="Check Availability"/></center>
</form>
<br /><br />
<?php

if(isset($_POST['checkData']))
{
	$checkName=$_POST['checkName'];
	require 'connect_db.php';
	$query="select * from firmNames WHERE name='$checkName'";
	$data=mysqli_query($connect,$query);
	$count=mysqli_num_rows($data);
	if($count>0)
	{
		echo "<h3 class='alert alert-danger'>Sorry ! The Company Name has already been Registered !</h3>";
	}
	else
	{
		echo "<h3 class='alert alert-success'>Congratulations ! The Company Name is Available !</h3>";
	}
}

?>

</div>





<div class="col-md-2"></div>


</div>
</div>

<br />

<?php include "footer.php" ?>