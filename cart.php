<?php
session_start();

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
		$item_array_id=array_column($_SESSION["shopping_cart"],"item_id");
		if(!in_array($_GET["id"],$item_array_id))
	  {
			$count= count($_SESSION["shopping_cart"]);
			$item_array=array(
			'item_id'        => $_GET["id"],
			'item_name'      => $_POST["hidden_name"],
			'item_price'     => $_POST["hidden_price"],
			'item_quantity'  => $_POST["quantity"]	
		);
		$_SESSION["shopping_cart"][$count]=$item_array;
	  }
	  else
	  {
		   echo '<script>alert("Item Already Added")</script>';
		   echo '<script>window.location="cart.php"</script>';
	  }
	}
	else
	{
		$item_array=array(
			'item_id'        => $_GET["id"],
			'item_name'      => $_POST["hidden_name"],
			'item_price'     => $_POST["hidden_price"],
			'item_quantity'  => $_POST["quantity"]	
		);
		$_SESSION["shopping_cart"][0]=$item_array;
	}
}

         if(isset($_GET["action"]))
          {
		    if($_GET["action"] == "delete")
			{
				foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					if($values["item_id"] == $_GET["id"])
					{
						unset($_SESSION["shopping_cart"][$keys]);
						echo '<script>alert("Item Removed")</script>';
						echo '<script>window.location="cart.php"</script>';
					}
					
				}
				
			}
			
          }


?>



<?php include "header.php" ?>
<head>
</head>
  <br />
  <h2 id="top" class="text-center">Shopping Cart</h2>
  <br />
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
  <div class="col-md-8">
  <table class="table table-condensed table-bordered">
  <tr class="alert alert-success">
  <th width="40%">Item Name</th>
  <th width="20%">Quantity</th>
  <th width="10%">Price</th>
  <th width="15%">Total</th>
  <th width="5%">Action</th>
  </tr>
  
  <?php
  $total=0;
  if(!empty($_SESSION["shopping_cart"]))
  {
	  $total=0;
	  foreach($_SESSION["shopping_cart"] as $keys => $values)
	  {
	?>
	<tr>
	<td><?php echo $values["item_name"]; ?></td>
	<td><?php echo $values["item_quantity"]; ?></td>
	<td><?php echo $values["item_price"]; ?></td>
	<td><?php echo number_format($values["item_quantity"]*$values["item_price"],2); ?></td>
	<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]?>" class="btn btn-danger">Remove</a></td>
	</tr>
  <?php 
		$total = $total + ($values["item_quantity"]*$values["item_price"]);
	  }
  }
  ?>
  <tr class="alert alert-success">
  <td colspan="3" align="right"><b>Grand Total</b></td>
  <td align="right"><b>Rs <?php echo number_format($total,2);?></b></td>
  <td></td>
  
  </tr>  
  </table>
  <br />
   <?php
	  $previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) 
{
    $previous = $_SERVER['HTTP_REFERER'];
}
	  ?>
	 <center> 
	  <a class="btn btn-primary" href="<?= $previous ?>">Continue Shopping</a>
  <a class="btn btn-primary" href="cashOut.php">Cashout</a>
  </center>
  <br /><br /><br /><br /><br />
  </div>
  <div class="col-md-2"></div>
  </div>
  </div>
<?php include "footer.php"?>













