<?php

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	require 'connect_db.php';
	
	$query="DELETE FROM unitsads WHERE id='$id'";
	if($connect->query($query))
	{
		echo "<script>alert('Deleted Successfully !! ')</script>";
		echo '<script>window.location="wAds.php"</script>';
	}
	else
	{
		echo "<script>alert('Error in Deleting !! ')</script>";
		echo '<script>window.location="wAds.php"</script>';
	}
}
else
{
	echo "<script>alert('Wrong Choice !! ')</script>";
	echo '<script>window.location="wAds.php"</script>';
}

?>