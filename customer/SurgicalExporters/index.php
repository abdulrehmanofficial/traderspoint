<?php include "header.php" ?>

<div class="container">

<div id="top" class="row">
<h2 style="font-family: 'Carter One', cursive;" class="text-center">Surgical Exporters!</h2>
<p class="text-center" style="font-family: 'Salsa', cursive;font-size:20px">
Surgical Exporter
</p><br />
<?php
	 require"../connect_db.php";
	$query="select * from companyAds WHERE category='Surgical'";
    $data=mysqli_query($connect,$query);
	if(mysqli_num_rows($data) > 0)
	{
	while($row=mysqli_fetch_array($data))
	{
	  $id=$row['id'];
	  $category=$row['category'];
	  $AdTitle=$row['AdTitle'];
	  $AdPic=$row['AdPic'];
	  $postedOn=$row['postedOn'];
	?>
	<div class="col-md-4">
<a href="../Details/?id=<?php echo $id; ?>"><div class="panel panel-primary">
      <div class="panel-heading"><?php echo strtoupper($AdTitle); ?></div>
      <div class="panel-body"><img src="../<?php echo $AdPic; ?>" class="img img-thumbnail" /></div>
	  <div class="panel-footer">
	  <b>Category: </b> <?php echo $category; ?><br />
	  <b>Posted On:</b> <?php echo $postedOn; ?> <br />
	  </div>
    </div>
	</a>
	</div>
	<?php
	
	}
	}
?>



</div>



</div>



<?php include "footer.php" ?>