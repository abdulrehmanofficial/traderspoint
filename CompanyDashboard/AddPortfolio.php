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
if($_SESSION['username']==null||$_SESSION['status']=="Not Verified"){
header("Location:../login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if(isset($_POST['PostmyPortfolio']))
{
  if($_FILES['portfolio1']['name']==''||$_FILES['portfolio2']['name']==''||$_FILES['portfolio3']['name']==''||$_FILES['portfolio4']['name']==''
  ||$_FILES['portfolio5']['name']==''||$_FILES['portfolio6']['name']=='')
  {
	  echo '<script>alert("Please Select All 6 Pictures for portfolio and Then Try Again !")</script>';
	  echo '<script>window.location="AddPortfolio.php"</script>';
  }
  else
  {
		  	$file_name1=$_FILES['portfolio1']['name'];
			$file_tmp1=$_FILES['portfolio1']['tmp_name'];
	
	    $folder1="images/$file_name1";
	    $foldertemp1="../images/$file_name1";
	    move_uploaded_file($file_tmp1,$foldertemp1);
		
		$file_name2=$_FILES['portfolio2']['name'];
			$file_tmp2=$_FILES['portfolio2']['tmp_name'];
	
	    $folder2="images/$file_name2";
	    $foldertemp2="../images/$file_name2";
	    move_uploaded_file($file_tmp2,$foldertemp2);
		
		
		$file_name3=$_FILES['portfolio3']['name'];
			$file_tmp3=$_FILES['portfolio3']['tmp_name'];
	
	    $folder3="images/$file_name3";
	    $foldertemp3="../images/$file_name3";
	    move_uploaded_file($file_tmp3,$foldertemp3);
		
		
		$file_name4=$_FILES['portfolio4']['name'];
			$file_tmp4=$_FILES['portfolio4']['tmp_name'];
	
	    $folder4="images/$file_name4";
	    $foldertemp4="../images/$file_name4";
	    move_uploaded_file($file_tmp4,$foldertemp4);
		
		
		$file_name5=$_FILES['portfolio5']['name'];
			$file_tmp5=$_FILES['portfolio5']['tmp_name'];
	
	    $folder5="images/$file_name5";
	    $foldertemp5="../images/$file_name5";
	    move_uploaded_file($file_tmp5,$foldertemp5);
		
		
		$file_name6=$_FILES['portfolio6']['name'];
			$file_tmp6=$_FILES['portfolio6']['tmp_name'];
	
	    $folder6="images/$file_name6";
	    $foldertemp6="../images/$file_name6";
	    move_uploaded_file($file_tmp6,$foldertemp6);
		
		  $email=$_SESSION['username'];
		  
		  
		   require"connect_db.php";
		  $query="INSERT INTO portfolio(pic1,pic2,pic3,pic4,pic5,pic6,email) 
		  VALUES('$folder1','$folder2','$folder3','$folder4','$folder5','$folder6','$email')";
		   if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Portfolio has been Updated Successfully!")</script>';
			   echo '<script>window.location="index.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="index.php"</script>';
              }
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Company Section</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="CompanyInfo.php">Company Information</a>
            </li>
            <li>
              <a href="CompanyAdvertisement.php">Company Ad</a>
            </li>
			<li>
              <a href="CreateCompanyAd.php">Create Company Ad</a>
            </li>
			<li>
              <a href="AddPortfolio.php">Add Portfolio</a>
            </li>
          </ul>
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
			
			<!-- Loop after php -->
			
            <a class="dropdown-item" href="#">
              <strong>Trader's Point</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hello From Trader's Point!</div>
            </a>
            <div class="dropdown-divider"></div>
            
			<!-- Loop End Here -->
			
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>  
        </li>
		
		
		
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
			
			<!-- Loop Start here if Notifications are needed -->
			
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Trader's Point</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is a test Message</div>
            </a>
            <div class="dropdown-divider"></div>
            
           <!-- Loop end here -->
		   
            <a class="dropdown-item small" href="#">View all alerts</a>
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
        <li class="breadcrumb-item active">Add Portfolio</li>
      </ol>

      <div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<form method="post" enctype="multipart/form-data">
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio1"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio2"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio3"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio4"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio5"/>
<input style="margin-bottom:7px" type="file" class="form-control" name="portfolio6"/>
<center><input class="btn btn-success" type="submit" name="PostmyPortfolio" value="Post Pics in My Portfolio" /></center>
</div>
<div class="col-md-2"></div>
	  
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
