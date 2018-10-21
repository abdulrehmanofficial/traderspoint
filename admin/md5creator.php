<?php

if(isset($_POST['create']))
{
	echo md5($_POST['converted']);
}

?>

<form method="post">
		  <input class="form-control" type="text" name="converted" placeholder="Enter here"/><br />
		  <input class="btn btn-primary" name="create" type="submit" value="Proceed" /><br />
		  <br />
		  </form>