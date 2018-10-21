<?php
	session_start();
	session_unset();
    session_destroy();
	header("Location:../login.php?msg=Thanks For Using Traders Point ! Bye Bye !");
	exit();
	die();
?>