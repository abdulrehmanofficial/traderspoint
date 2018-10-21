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
if($_SESSION['purchaser']==null){
header("Location:PurchaserLogin.php?msg=Please Login to Continue !");
	exit();
	die();
}
?>

<?php

if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header("Location: login.php?msg=Thank You for Using Traders Point!");
	
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/fonts.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/fonts2.css" rel="stylesheet">
  <link href="css/slippry.css" rel="stylesheet">
  
  </head>
  <body>
  
  <ul id="slider">
  <li>
    <a href="#slide1"><img style="width:100%" src="images/header-img.jpg" alt="<center><h1 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Traders Point</h1><h2 style='color:white;font-family: Acme, sans-serif;font-size:3.2vw'>First Order Providing and Services Provider to Manufacturers and Traders in Sialkot</h2></center>"></a>
  </li>
  <li>
    <a href="#slide2"><img src="images/pic2.jpeg"  alt="<center><h2 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Manufacturing Orders</h2><a class='btn btn-info btn-lg' style='color:white' href='register.php'>Get Yourself Registered !</a></center>"></a>
  </li>
  <li>
    <a href="#slide3"><img src="images/pic3.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:5vw'>Fabric Sales and Purchase</h3><a class='btn btn-info btn-lg' href='FabricSales.php' style='color:white'>See Fabric Section</a></center>"></a>
  </li>
  <li>
    <a href="#slide4"><img src="images/pic4.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Registration in Chamber!</h3><a class='btn btn-info btn-lg' style='color:white' href='registerInChamber.php'>Register in Chamber</a></center>"></a>
  </li>
  <li>
    <a href="#slide5"><img src="images/pic5.jpg" alt="<center><h3 style='color:white;font-family: Faster One, cursive;font-size:4vw'>Workers and Working Units!</h3><a class='btn btn-info btn-lg' style='color:white' href='WorkingUnits.php'>See Working Units</a></center>"></a>
  </li>
</ul>

<nav id="mNavbar" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Trader's Point</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="cashout.php">Home</a></li>
		<li><a href="PurchaseOrderHistory.php">Order History</a></li>
		
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<?php 
	 require"connect_db.php";
	$pEmail=$_SESSION['purchaser'];
	$query="SELECT * from fabricnotifications WHERE task='approved' AND purchaserEmail='$pEmail'";
	$data=mysqli_query($connect,$query);
	$nots=mysqli_num_rows($data);
	?>
	<li><a href="Orderapprovals.php"><span class="glyphicon glyphicon-globe"></span>&nbsp;<b style="color:white;font-size:22px"><?php echo $nots; ?></b> Notifications</a></li>
         <li>
		 <form method="post" class="navbar-form">
                            <div class="input-group" style="width: 100%">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" name="logout" type="submit"><span class="glyphicon glyphicon-log-out"></span> Log Out</button>
                                </div>
                            </div>
        </form>
		</li>
      </ul>

    </div>
  </div>
</nav>


<script src="js/slippry.min.js"></script>
	<script>
$(document).ready(function(){
	  $('#slider').slippry(
		defaults = 
		{
			loadingClass: 'sy-loading',
			transition: 'kenburns',
			kenZoom: 140,
			useCSS: true,
			speed: 6000,
			pause: 10000,
			initSingle: false,
			auto: true,
			preload: 'visible',
			pager: false,
			easing:'swing',
		} 
	  
	  )
	});
    </script>



<div class="container-fluid">
<div class="row">


<div class="col-md-2"></div>

<div class="col-md-8">

<?php
$id=$_SESSION['id'];
$user=$_SESSION['purchaser'];

 if(!empty($_SESSION["shopping_cart"]))
  {
?>	  
<h3 id="top" style="font-family: 'Passion One', cursive;" class="text-center alert alert-success">Your Items in the Cart</h3>
<br />

<div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th width="40%">Item Name</th>
                          <th width="15%">Quantity</th>
						  <th width="15%">Price</th>
						  <th width="30%">Total</th>
					    </tr>
                    </thead>
                    <tbody>
                        <?php
  $total=0;
  $msg="";
  if(!empty($_SESSION["shopping_cart"]))
  {		
	  $total=0;
	  foreach($_SESSION["shopping_cart"] as $keys => $values)
	  {
		  $itemId=$values["item_id"];
		  $item7=$values["item_name"];
		  $qty7=$values["item_quantity"];
		  $price7=number_format($values["item_quantity"]*$values["item_price"],2);
		  $total7=number_format($total,2);
		  
		    // the message
   $msg .= "Name: $item7 \nQuantity: $qty7 \nPrice: $price7";
		  
		  // send email
 // mail($AdEmail,"Trader's Point Fabric Purchase Order",$emailMsg);
		  
	?>
	<tr>
	<td><?php echo $values["item_name"]; ?></td>
	<td><?php echo $values["item_quantity"]; ?></td>
	<td><?php echo $values["item_price"];?> Rs</td>
	<td><?php echo number_format($values["item_quantity"]*$values["item_price"],2); ?> Rs</td>
	</tr>
  <?php 
		$total = $total + ($values["item_quantity"]*$values["item_price"]);
	  }
	  
	  $GrandTotal=$total;
	  $items=$msg;
	  
  }
  ?>
  <tr>
  <td colspan="3" align="right">Grand Total</td>
  <td align="right">Rs <?php echo number_format($total,2);?></td>
  </tr>
                    </tbody>
                </table>
            </div>
			<br />
<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-success">Enter Your Details to Complete the Order</h3>
		
<form method="post" enctype="multipart/form-data">
<input style="margin-bottom:7px" type="text" class="form-control" name="address" placeholder="Enter Delivery Address"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="Phone" placeholder="Enter Your Phone Number"/>
<center><input class="btn btn-success" type="submit" name="orderFabric" value="Order" /></center>
<br>
</form>

<?php
  }
  else
  {  
?>
		<h3 class="alert alert-danger text-center">Nothing in your Cart ! Empty Cart !</h3>
<?php
  }
?>
</div>

<div class="col-md-2"></div>
		
</div>
</div>
		
			
<?php

if(isset($_POST['orderFabric']))
{
	$address=$_POST['address'];
	$phone=$_POST['Phone'];

	$msg="";
	
	  $total=0;
	  foreach($_SESSION["shopping_cart"] as $keys => $values)
	  {
		  $ItemId=$values["item_id"];
		  
		   require"connect_db.php";
		  $query="select email from fabricads WHERE id='$ItemId'";
		  $data=mysqli_query($connect,$query);
		  while($row=mysqli_fetch_array($data))
		  {
		  $AdEmail=$row["email"];
		  }
		  
		  $item7=$values["item_name"];
		  $qty7=$values["item_quantity"];
		  $price7=number_format($values["item_quantity"]*$values["item_price"],2);
		  $total7=number_format($total,2);
		  $pEmail=$_SESSION['purchaser'];
		  
		  
		   $query2="INSERT INTO fabricnotifications(item,quantity,price,address,phone,email,purchaserEmail) 
		   VALUES('$item7','$qty7','$price7','$address','$phone','$AdEmail','$pEmail')";
		  if ($connect->query($query2) === TRUE) 
			  {
                    
              }
		  
		  $emailMsg="Name: $item7 \n\t\rQuantity: $qty7 \n\t\rPrice: $price7 \n\t\rAddress: $address \n\t\rPhone: $phone";
		    // the message
   $msg .= "Name: $item7 \nQuantity: $qty7 \nPrice: $price7";
		  
		  // send email
mail($AdEmail,"Trader's Point Fabric Purchase Order",$emailMsg);
		
	  }
	
	 require"connect_db.php";
$query="INSERT INTO purchaseRecords(items,total,address,email,phone) VALUES('$items','$GrandTotal','$address','$user','$phone')";
if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Order is in Progress.. You will be Texted/mailed Soon about the arrival of your parcel !")</script>';
			// send email
			mail("jugnoobutt24@gmail.com","Fabric Order"," Items with Quantity and Prices \n\r ".$msg." \n\r Grand Total: ".$GrandTotal);
			   echo '<script>window.location="FabricSales.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	           echo '<script>window.location="FabricSales.php"</script>';
              }
}

?>






<?php include "footer.php" ?>