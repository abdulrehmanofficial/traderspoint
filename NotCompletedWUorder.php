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
if($_SESSION['hireUnits']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
} 


if(empty($_GET['id']))
	{
		echo '<script>alert("Missing Information")</script>';
		header("Location: hireApprovals.php");
		die();
	}
	else
	{
		$id=$_GET['id'];
		 require"connect_db.php";
		$email=$_SESSION['hireUnits'];
		$query2="Update unitnotifications SET completed='No',task='done' WHERE id='$id'";
			
			if ($connect->query($query2) === TRUE) 
			{
				echo '<script>alert("Order Not Completed!")</script>';
				header("Location: hireApprovals.php");
			}
			else
			{
			echo '<script>alert("Error in Dismissing !")</script>';
		    header("Location: hireApprovals.php");
			die();
			}
    }
?>