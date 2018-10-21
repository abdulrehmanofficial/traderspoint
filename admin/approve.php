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
if($_SESSION['admin']==null){
require("index.php");
header("Location:index.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if($_GET['email']!= null && $_GET['id']!=null)
{
   $email=$_GET['email'];
   $id=$_GET['id'];
   $status="Verified";
	 require"connect_db.php";
	$query="UPDATE registerfororders SET status='$status' WHERE id='$id' AND email='$email'";
	if ($connect->query($query) === TRUE) 
			  {
			$msg = "Assalam O Alliakum,\nYour Account for Traders Point has been Approved";
			mail($email,"Account Approval",$msg);			  
               echo '<script>alert("Approved ! Confirmation Email has been Sent !")</script>';
	           echo '<script>window.location="adminDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="adminDashboard.php"</script>';
              }
}

?>