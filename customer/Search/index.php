<?php
session_start();
 include "header.php" ?>

<div class="container-fluid">

<div id="top" class="row">
<h2 style="font-family: 'Carter One', cursive;" class="text-center">Search Results !</h2>
<br />
<?php
if(isset($_POST['searchBtn']))
{
	$search=$_POST['search'];
	require"../connect_db.php";
	$query="select * from companyAds WHERE category LIKE '%$search%' OR products LIKE '%$search%' OR
	SearchTags LIKE '%$search%'";
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
	else
	{
		echo "<center><h3 style='color:red;'>Nothing Found !</h3></center>";
	}
}
	else
	{
		echo "<center><h3 style='color:red;'>Nothing Found !</h3></center>";
	}
?>



</div>



</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b49c30e4af8e57442dca64a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->




<?php include "footer.php" ?>