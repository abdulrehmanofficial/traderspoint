<?php

if(isset($_POST['SaveData']))
{
	$nameofFirm=$_POST['nameofFirm'];
	$address=$_POST['address'];
	$nameApplicant=$_POST['nameApplicant'];
	$designation=$_POST['designation'];
	$ntn=$_POST['ntn'];
	$cnic=$_POST['cnic'];
	$dob=$_POST['dob'];
	$bloodgroup=$_POST['bloodgroup'];
	$ofcAddress=$_POST['ofcAddress'];
	$telOfc=$_POST['telOfc'];
	$telFactory=$_POST['telFactory'];
	$mobileNo=$_POST['mobileNo'];
	$email=$_POST['email'];
	$membershipType=$_POST['membershipType'];
	$businessCategory=$_POST['businessCategory'];
	$goodsManufacture=$_POST['goodsManufacture'];
	$bankName=$_POST['bankName'];
	$yearEstablishment=$_POST['yearEstablishment'];
	$representativeName=$_POST['representativeName'];
	$desRepresentative=$_POST['desRepresentative'];
	$qualificationsRep=$_POST['qualificationsRep'];
	$resAddress=$_POST['resAddress'];
	
	 require"connect_db.php";
	$query="INSERT INTO `registrationChamber`(`nameofFirm`, `address`, `nameApplicant`, `designation`, `ntn`, `cnic`,
	`dob`, `bloodgroup`, `ofcAddress`,`telOfc`, `telFactory`, `mobileNo`, `email`, `membershipType`, `businessCategory`,
	`goodsManufacture`, `bankName`, `yearEstablishment`, `representativeName`, `desRepresentative`, `qualificationsRep`,
	`resAddress`) VALUES ('$nameofFirm','$address','$nameApplicant','$designation','$ntn','$cnic',
	'$dob','$bloodgroup','$ofcAddress','$telOfc','$telFactory','$mobileNo','$email','$membershipType','$businessCategory',
	'$goodsManufacture','$bankName','$yearEstablishment','$representativeName','$desRepresentative','$qualificationsRep',
	'$resAddress')";
	
	if($connect->query($query)===TRUE)
	{
		?>
<html>
<head>
<title>Registration Form for Chamber of Commerce Sialkot</title>
</head>
	<body oncontextmenu="return false" style="max-width:800px">
	<center><img src="images/scci.jpg" style="width:150px;height:120px"/>
	<h3>THE SIALKOT CHAMBER OF COMMERCE AND INDUSTRY</h3>
	<p style="margin-top:-15px;font-size:12px">
	SHAHRAH-E-AIWAN-E-SANAT-O-TIJARAT,SIALKOT,51310,PAKISTAN.<br />
	Email: sialkot@scci.com.pk - Website: www.scci.com.pk
	</p>
	<h3>IDENTITY CARD FORM</h3>
	</center>

	<div style="float:left;margin-left:100px">
	<b>Name of Firm: </b><br /><br />
	<b>Address: </b> <br /><br />
	<b>Membership No: </b><br /> <br />
	<b>Name of Applicant: </b><br /> <br />
	<b>Designation of Applicant: </b><br /> <br />
	<b>NTN (National Tax Number): </b><br /> <br />
	<b>NIC (National ID Card Number): </b><br /> <br />
	<b>Date of Birth: </b><br /> <br />
	<b>Blood Group: </b><br /> <br />
	<b>Signature: </b><br /> <br />
	
	</div>
	

	<div style="float:right;margin-right:100px">
	<u><?php echo $nameofFirm; ?></u><br /><br />
	<u><?php echo $address; ?></u><br /><br />
	<u><?php for($i=0;$i<40;$i++){ echo "&nbsp;"; }?></u><br /><br />
	<u><?php echo $nameApplicant; ?></u><br /><br />
	<u><?php echo $designation; ?></u><br /><br />
	<u><?php echo $ntn; ?></u><br /><br />
	<u><?php echo $cnic; ?></u><br /><br />
	<u><?php echo $dob; ?></u><br /><br />
	<u><?php echo $bloodgroup; ?></u><br /><br />
	<u><?php for($i=0;$i<40;$i++){ echo "&nbsp;"; }?></u><br /><br />
	</div>
	<br /><br />
	<div style="float:left;margin-left:100px; border:2px groove;padding-top:40px">
	Paste Your Picture HERE
	<br /><br /><br /><br /><br /><br />
	</div>
	
	<div style="float:right">
	<b>Declaration:</b>
	<p>I/WE do here solemnly declare attest that the photograph <br />and Signature affixed on this form are true !</p>
	</div>
	
	<div style="float:left;padding-left:100px;padding-right:100px">
	<br />
	<b>Note:</b>
	<p> <b>a)</b> Please Provide <b>two passport size photographs</b>,one for identity card and one for application form(with stamp).<br/>
		<b>b)</b> Please affix stamp of the company or firm on the one photo on the  duplicate copy of the form,in such a manner as to cover 
		part of photograph.
	</p>
	</div>
	
	<div style="float:left;margin-left:100px;border:3px groove;padding-right:10px">
	<b>For Office Use only:</b><br />
	1. Date of Issue:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	_________________________<br /><br />
	2. Valid Upto:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________<br /><br />
	3. SCCI Code #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________<br /><br />
	</div>
	
	
	<div style="float:left;margin-left:12%;">
	<center><img src="images/scci.jpg" style="width:150px;height:120px"/>
	<h3>THE SIALKOT CHAMBER OF COMMERCE AND INDUSTRY</h3>
	<p style="margin-top:-15px;font-size:12px">
	SHAHRAH-E-AIWAN-E-SANAT-O-TIJARAT,SIALKOT,51310,PAKISTAN.<br />
	Email: sialkot@scci.com.pk - Website: www.scci.com.pk
	</p>
	</center>
	<center><h3>PARTICULAR OF THE APPLICANT</h3></center>
	</div>
	
	
	<div style="float:left;margin-left:100px">
	<b>Name of Firm / Company: </b><br /><br />
	<b>Office Address: </b> <br /><br />
	<b>Office Ph No: </b><br /> <br />
	<b>Factory Ph No: </b><br /> <br />
	<b>Mobile No: </b><br /> <br />
	<b>Email: </b><br /> <br />
	<b>Class of Membership Required: </b><br /> <br />
	<b>Main Line of Business: </b><br /> <br />
	<b>Goods Manufactures: </b><br /> <br />
	<b>NTN No: </b><br /> <br />
	<b>Name of Bank: </b><br /> <br />
	<b>Year of Establishment: </b><br /> <br />
	<b>Name of Representative: </b><br /> <br />
	<b>Designation: </b><br /> <br />
	<b>Qualifications: </b><br /> <br />
	<b>Residential Address: </b><br /> <br />
	
	</div>
	
	<div style="float:right;margin-right:100px">
	<u><?php echo $nameofFirm; ?></u><br /><br />
	<u><?php echo $ofcAddress; ?></u><br /><br />
	<u><?php echo $telOfc; ?></u><br /><br />
	<u><?php echo $telFactory; ?></u><br /><br />
	<u><?php echo $mobileNo; ?></u><br /><br />
	<u><?php echo $email; ?></u><br /><br />
	<u><?php echo $membershipType; ?></u><br /><br />
	<u><?php echo $businessCategory; ?></u><br /><br />
	<u><?php echo $goodsManufacture; ?></u><br /><br />
	<u><?php echo $ntn; ?></u><br /><br />
	<u><?php echo $bankName; ?></u><br /><br />
	<u><?php echo $yearEstablishment; ?></u><br /><br />
	<u><?php echo $representativeName; ?></u><br /><br />
	<u><?php echo $desRepresentative; ?></u><br /><br />
	<u><?php echo $qualificationsRep; ?></u><br /><br />
	<u><?php echo $resAddress; ?></u><br /><br />
	</div>
	
	<center>
	<table style="width:550px" border="1">
	<tr>
	<td colspan="4"><center>Particular for the Properietor/Partners: </center></td>
	</tr>
	<td width="5%">Sr#</td>
	<td width="35%">Name</td>
	<td width="25%">Status</td>
	<td width="35%">Cnic</td>
	</tr>
	
	<tr>
	<td>1.</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td>2.</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td>3.</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	
	
	<tr>
	<td>4.</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	
	</table>
	</center>
	<br />
	<img style="width:100%;height:170%;" src="images/3rdPage.jpg">
	<img style="width:100%;height:170%;" src="images/4thPage.jpg">
	<?php 
	echo '<script>window.print();</script>';
	?>
	</body>
</html>	
		
		
		<?php
	}
	else
	{
		echo '<script>alert("Error in Registration !")</script>';
	    echo '<script>window.location="resgisterInChamber.php"</script>';
	}
	
}








?>