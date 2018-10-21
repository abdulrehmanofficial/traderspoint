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

if(isset($_POST['sendMessage']))
{
	
	$msg=$_POST['msg'];
	$toperson=$_GET['address'];
	$fromperson=$_SESSION['username'];
	
	require 'connect_db.php';
	$query="INSERT INTO chat(toperson,fromperson,message) VALUES('$toperson','$fromperson','$msg')";
	if($connect->query($query))
	{
		
	}
	else
	{
		echo "<script>alert('Error while Sending Message !! ');</script>";
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Company Dashboard - Trader's Point</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Trader's Point</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="settings.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Settings</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Log Out</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
			
			<?php 
			 require"../connect_db.php";
			 $user=$_SESSION['username'];
	$query="select * from chat WHERE toperson='$user' AND readStatus='-1' ORDER BY id LIMIT 5";
    $data=mysqli_query($connect,$query);
$msgQuery="select * from chat WHERE toperson='$user' AND readStatus='-1' ORDER BY id";
	$msgResult=mysqli_query($connect,$msgQuery);
$messagesCount=mysqli_num_rows($msgResult);
	if($messagesCount>0)
	{
	while($row=mysqli_fetch_array($data))
	{
			?>
			<!-- Loop after php -->
            <a class="dropdown-item" href="CustomerMessages.php?address=<?php echo $row['fromperson']; ?>#recent">
              <strong><?php echo $row['fromperson']; ?></strong>
              <span class="small float-right text-muted"><?php echo $row['timedate']; ?></span>
              <div class="dropdown-message small"><?php echo $row['message']; ?></div>
            </a>
            <div class="dropdown-divider"></div>
			<!-- Loop End Here -->
<?php 
	}
	}
	else
	{
		?>
	
<!-- Loop after php -->
            <a class="dropdown-item">
              <strong>**  No New Messages **</strong>
            </a>
            <div class="dropdown-divider"></div>
			<!-- Loop End Here -->
	
		<?php
	}	
?>
            <a class="dropdown-item small" href="AllMessages.php">View all messages</a>
          </div>  
        </li>
		
		<li class="nav-item">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
    
<?php
if(isset($_GET['address']))
{
	$other=$_GET['address'];
	
	$query2="SELECT company from customerRegister WHERE email='$other'";
		$data3=mysqli_query($connect,$query2);
		$row3=mysqli_fetch_array($data3);
	?>
	<h4 class="text-center alert alert-primary">Chat Between You and <?php echo $row3['company']; ?></h4>
	<div class="col-md-12">
	<?php
	
	require 'connect_db.php';
	
	
	$username=$_SESSION['username'];
	
	$query="SELECT  * 
FROM chat a
WHERE   
(a.toperson ='$username' AND a.fromperson='$other') OR
(a.toperson ='$other' AND a.fromperson='$username') 
ORDER BY timedate";

$chatData=mysqli_query($connect,$query);
while($row2=mysqli_fetch_array($chatData))
{
	$id2=$row2['id'];
	$query3="Update chat SET readstatus='1' WHERE id='$id2' AND toperson='$username'";
	mysqli_query($connect,$query3);
	
	$companyEmail=$row2['fromperson'];
		$query2="SELECT company from customerRegister WHERE email='$companyEmail'";
		$data3=mysqli_query($connect,$query2);
		$row3=mysqli_fetch_array($data3);
	if($companyEmail==$username)
	{
?>	
<div class="alert alert-success">
	<p style="padding-left:30px">
	<b style="color:#0077C8">You : </b> <?php echo $row2['message']; ?>
	</p>
	<p style="padding-left:50px"><b>Message Sent / Received at :</b> <?php echo $row2['timedate']; ?> ,</p>
</div>
<?php	
}
else
	{
?>	
<div class="alert alert-danger">
	<p style="padding-left:30px">
	<b style="color:#0077C8"><?php echo $row3['company']; ?>: </b> <?php echo $row2['message']; ?>
	</p>
	<p style="padding-left:50px"><b>Message Sent / Received at :</b> <?php echo $row2['timedate']; ?> ,</p>
</div>
<?php	
}	

}
?>
	  <br /><br /><br />
	  
	  <form method="post" id="recent">
	  <textarea class="form-control" rows="5" name="msg" placeholder="Enter New Message.."></textarea>
	  <center><input style="margin-top:7px" type="submit" name="sendMessage" class="btn btn-success" value="Send Message" /></center>
	  </form>
	  <br /><br /><br /><br />
	  </div>
	  <?php
}
	  ?>
	  
      </div>
	  </div>
	  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Trader's Point</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are You Sure to Logout ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            <a class="btn btn-primary" href="logout.php">Yes</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
