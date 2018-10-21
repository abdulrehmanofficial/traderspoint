<?php include "header.php" ?>

<div style="padding-left:40px;padding-right:40px" id="top">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">About Us</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
The business fields is progressing by leaps and bounds now a days. Due to progressing, the difficulties are increasing like competition of manufacturers in the market. Also the customers now a days don’t trust the manufacturer due to frauds/ scams done by some of manufacturers/ exporters. Also, the manufacturers face many difficulties related to Chamber, working units and fabric related problems. New person/ exporters need to register in the Chamber in order to export their goods.
Trader’s point is a platform where exporters and manufacturers who are registered in the Chamber. They can Signup/ register on it. When the exporter register on our website, the information will be verified with the Chamber and then approval of the Signup will be sent to the exporter. The profile of manufacturer will be maintained according to the data of Chamber. Also the manufacturer will update the work/field/expertise in which he/she is working. A portfolio of pictures and also the verification document of registration with Chamber will be displayed in the profile for customer to trust that he/she is registered in Chamber and no fraud will occur.
Firm/Company Registration can be done form our website directly. The registrar of firm will check for the name availability first, then after approval of name he/she can submit their information and documents and after verification the person will be registered in Chamber and can collect their certificate from Chamber.
Fabric searching and purchasing is a very painful purchase. The person has to go to Lahore/ Faislabad for purchasing it and carrying it and waste a lot of money effort and time on it. Our project will have modules for the Fabrics on which the details and color shades along with pictures of fabrics will be given and the fabric will be delivered on customer’s door step on order along with very reasonable delivery chargers.
Working units and workers can be a big problems. New manufacturers don’t have working units and workers itself. Our website will have a module of working units and workers in which spare working units will post along with details that which machinery they have and how many workers they have etc. They can directly contact each other.
</p>
</div>
<br />
<div style="padding-left:40px;padding-right:40px" id="contact">

<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Contact Us</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
If You face any query do Contact with us ! Want to work with us or just want to say Hello ? Please Don't Hesitate to Contact !
</p>
<br />
<div class="row">
<div class="col-md-2"></div>

<div class="col-md-3">

<h4 style="font-size:20px;font-family: 'Sirin Stencil', cursive;"><span style="color:#286090" class="glyphicon glyphicon-phone">Phone:</span> +92 306 9600828 </h4>
<h4 style="font-size:20px;font-family: 'Sirin Stencil', cursive;"><span style="color:#286090" class="glyphicon glyphicon-globe">Website:</span> www.traderspoint.com</h4>
<h4 style="font-size:20px;font-family: 'Sirin Stencil', cursive;"><span style="color:#286090" class="glyphicon glyphicon-map-marker">Address:</span> University of Gujrat Sialkot Campus,Pakistan 51310.</h4>

</div>
<?php

if(isset($_POST['sendmsg']))
{
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	  {
   echo '<script>alert("Email Address is not a valid address !!")</script>';
	  }
	  else
	  {
	      $name=$_POST['name'];
	      $email=$_POST['email'];
	      $subject=$_POST['subject'];
	      $message=$_POST['message'];
	      
	      if(empty($name)||empty($email)||empty($subject)||empty($message))
	      {
	           echo '<script>alert("Please Fill All Information !!")</script>';
	      }
	      else
	      {
	          mail("jugnoobutt24@gmail.com",$subject,"Email: ".$email." <br> Message: ".$message);
	          echo '<script>alert("Your Message has been sent to admin !!")</script>';
	      }
	      
	  }
}

?>

<div class="col-md-4">
<form method="post">
<input style="margin-bottom:7px" type="text" class="form-control" name="name" Placeholder="Enter Your Name"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="email" Placeholder="Enter Your Email"/>
<input style="margin-bottom:7px" type="text" class="form-control" name="subject" Placeholder="Enter Subject"/>
<textarea style="margin-bottom:7px" type="text" name="message" placeholder="Enter Your Message" rows="3" cols="3" class="form-control"></textarea>
<center><input type="submit" class="btn btn-primary" name="sendmsg" value="Send Message"/></center>
</form>
</div>

<div class="col-md-3"></div>

</div>
</div>

<br />


<?php include "footer.php" ?>