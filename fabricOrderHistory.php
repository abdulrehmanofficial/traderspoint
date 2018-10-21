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
if($_SESSION['fabricUser']==null){
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

if(isset($_POST['logout']))
{
    session_unset();
    session_destroy();
    die();
}


include "fabricHeader.php"

 ?>

<div class="container">
<div class="row">

<h3 style="font-family: 'Passion One', cursive;" class="text-center alert alert-info">My Order History</h3>
<br />

<table id="myTable" class="table table-condensed">
<thead>
<tr>
<th>Item</th>
<th>Quantity</th>
<th>Price</th>
<th>Address</th>
<th>Phone #</th>
<th>Order Date</th>
<th>Order Status</th>
</tr>
</thead>
<?php 
	$id=$_SESSION['LoginId'];
	$email=$_SESSION['fabricUser'];
	 require"connect_db.php";
	$query="select * from fabricnotifications WHERE email='$email' ORDER BY ID";
    $data=mysqli_query($connect,$query);
	while($row=mysqli_fetch_array($data))
	{
	  ?>
<tr>
<td><?php echo $row['item']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['price']; ?> Rs</td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php 
if($row['task']=="approved")
{
	echo "<b>Approved</b>";
}
else if($row['task']=="done")
{
	echo "<b style='color:green'>Completed</b>";
}
else
{
	echo "<b style='color:red'>Dismissed</b>";
}
 ?></td>
</tr>
	  <?php
	}
?>
<tfoot>
<tr>
<th>Item</th>
<th>Quantity</th>
<th>Price</th>
<th>Address</th>
<th>Phone #</th>
<th>Order Date</th>
<th>Order Status</th>
</tr>
</tfoot>
</table>


</div>
</div>

<script>

$(document).ready(function(){
    $('#myTable').DataTable();
});



</script>



<?php include "footer.php"; ?>