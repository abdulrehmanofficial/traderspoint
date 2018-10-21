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
if($_SESSION['CustomerLogin']==null){
header("Location:../login.php?msg=Invalid User Name or Password");
	exit();
	die();
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
  <title>Customer Dashboard - Trader's Point</title>
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
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Settings</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
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
			 $user=$_SESSION['CustomerLogin'];
	$query="select * from chat WHERE toperson='$user' AND readStatus='-1' ORDER BY id";
    $data=mysqli_query($connect,$query);
$messagesCount=mysqli_num_rows($data);
	if($messagesCount>0)
	{
	while($row=mysqli_fetch_array($data))
	{
			?>
			<!-- Loop after php -->
            <a class="dropdown-item" href="CustomerMessages.php?address=<?php echo $row['fromperson']; ?>">
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Recent Chats</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <?php 
			 require"../connect_db.php";
			 $user=$_SESSION['CustomerLogin'];
	$query="select DISTINCT fromperson from chat WHERE toperson='$user' AND readStatus='-1' ORDER BY id DESC";
    $data=mysqli_query($connect,$query);
	while($row=mysqli_fetch_array($data))
	{
		$companyEmail=$row['fromperson'];
		$query2="SELECT company from registerfororders WHERE email='$companyEmail'";
		$data3=mysqli_query($connect,$query2);
		$row3=mysqli_fetch_array($data3);
		
		$query4="select * from chat WHERE fromperson='$companyEmail' AND readStatus='-1' ORDER BY id DESC";
		$data4=mysqli_query($connect,$query4);
		$unreadMessages=mysqli_num_rows($data4);
			?>
			<!-- Loop after php -->
            <a class="alert alert-success" style="color:#32994a" href="CustomerMessages.php?address=<?php echo $row['fromperson']; ?>#recent">
              <strong><?php echo $row3['company']; ?> &nbsp;</strong>
              <div class="dropdown-message small"><?php echo $unreadMessages; ?> Unread Message(s)</div>
            </a>
            <div class="dropdown-divider"></div>
			<!-- Loop End Here -->
<?php 
	}
?>
        <?php 
			 require"../connect_db.php";
			 $user=$_SESSION['CustomerLogin'];
	$query="select DISTINCT fromperson from chat WHERE toperson='$user' ORDER BY id DESC";
    $data=mysqli_query($connect,$query);
	while($row=mysqli_fetch_array($data))
	{
		$companyEmail=$row['fromperson'];
		$query2="SELECT company from registerfororders WHERE email='$companyEmail'";
		$data3=mysqli_query($connect,$query2);
		$row3=mysqli_fetch_array($data3);
			?>
			<!-- Loop after php -->
            <a href="CustomerMessages.php?address=<?php echo $row['fromperson']; ?>#recent">
              <strong><?php echo $row3['company']; ?> &nbsp;</strong>
              <div class="dropdown-message small">Click to Open Chat</div>
            </a>
            <div class="dropdown-divider"></div>
			<!-- Loop End Here -->
<?php 
	}
?>
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
