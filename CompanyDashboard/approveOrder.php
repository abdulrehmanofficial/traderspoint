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
header("Location:../login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if(isset($_GET['id'],$_GET['address']))
{
	require 'connect_db.php';
	$id=$_GET['id'];
	$address=$_GET['address'];
	
	$query="UPDATE orderdata SET orderStatus='Approved' WHERE id='$id' AND orderedBy='$address'";
	if($connect->query($query))
	{
	  echo '<script>alert("Approved !")</script>';
	  echo '<script>window.location="ordersNotifications.php"</script>';
	}
	else
	{
		echo '<script>alert("Error while Approving !")</script>';
	  echo '<script>window.location="ordersNotifications.php"</script>';
	}
}
?>