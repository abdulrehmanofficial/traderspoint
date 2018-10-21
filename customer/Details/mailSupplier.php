<?php

if(isset($_POST['SendMessage']))
{
	$email=$_POST['emailAddress'];
	$supplierEmail=$_POST['supplierEmail'];
	$subject=$_POST['Subject'];
	$message=$_POST['message'];
	
	
	 require"../connect_db.php";
	$query="INSERT into customerMessages(email,message,subject,customerEmail,readStatus) 
	VALUES('$supplierEmail','$message','$subject','$email','No')";
    
	if($connect->query($query) === TRUE)
	{
	mail($supplierEmail,"Traders Point - New Message Received","Message Received From Customer: <br />
	Subject of Email:".$subject."<br /> Message: <br />".$message);
	echo '<script>alert("Your Message has been Delivered !")</script>';
	 echo '<script>window.location="../"</script>';
	die();
	}
	else
	{
	 echo '<script>alert("Error While Sending Message !")</script>';
	 echo '<script>window.location="../"</script>';
	}
	
	
}



?>