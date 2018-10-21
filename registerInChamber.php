<?php include "header.php";?>
<head>
	<style>
	.form-control
	{
		margin-bottom:10px;
	}
	
	</style>
</head>

<div class="container" style="padding-left:40px;padding-right:40px" id="top">
<div class="row">
<h3 style="font-family: 'Passion One', cursive;font-size:42px" class="text-center">Register in Chamber of Commerce Sialkot !</h3><br />
<p class="text-center" style="font-size:20px;font-family: 'Sirin Stencil', cursive;">
Enter Your Correct Information in Order to Continue Registeration in Chamber of Commerce Sialkot!
</p>

<div class="col-md-2"></div>

<div class="col-md-8">

<form method="post" action="printoutForChamber.php">

<input class="form-control" type="text" name="nameofFirm" placeholder="Please Enter Name of Firm You Want to Register"/>
<input class="form-control" type="text" name="address" placeholder="Please Enter Your Applicant Address"/>
<input class="form-control" type="text" name="nameApplicant" placeholder="Please Enter Applicant Name"/>
<input class="form-control" type="text" name="designation" placeholder="Please Enter Applicant Designation"/>
<input class="form-control" type="text" name="ntn" placeholder="Please Enter Applicant's NTN (National Tax Number)"/>
<input class="form-control" type="text" name="cnic" placeholder="Please Enter Applicant's CNIC"/>
<input class="form-control" type="text" name="dob" placeholder="Please Enter Applicant's Date of Birth"/>
<input class="form-control" type="text" name="bloodgroup" placeholder="Please Enter Applicant's Blood Group"/>
<input class="form-control" type="text" name="ofcAddress" placeholder="Please Enter Office Address"/>
<input class="form-control" type="text" name="telOfc" placeholder="Please Enter Office Telephone No"/>
<input class="form-control" type="text" name="telFactory" placeholder="Please Enter Factory Telephone No"/>
<input class="form-control" type="text" name="mobileNo" placeholder="Please Enter Applicant's Mobile No"/>
<input class="form-control" type="text" name="email" placeholder="Please Enter Applicant's Email"/>
<select class="form-control" name="membershipType">
<option value="Individual">Individual</option>
<option value="Partnership">Partnership</option>
</select>
<input class="form-control" type="text" name="businessCategory" placeholder="Please Enter Your Business Category"/>
<input class="form-control" type="text" name="goodsManufacture" placeholder="Please Enter Goods you Manufacture"/>
<input class="form-control" type="text" name="bankName" placeholder="Please Enter Your Bank Name "/>
<input class="form-control" type="text" name="yearEstablishment" placeholder="Please Enter Your Establishment Year"/>
<input class="form-control" type="text" name="representativeName" placeholder="Please Enter Representative Name"/>
<input class="form-control" type="text" name="desRepresentative" placeholder="Please Enter Designation of Representative"/>
<input class="form-control" type="text" name="qualificationsRep" placeholder="Please Enter Representative Qualifications"/>
<input class="form-control" type="text" name="resAddress" placeholder="Please Enter Residential Address"/>
<center><input class="btn btn-success" type="submit" name="SaveData" value="Register"/></center>
</form>

</div>





<div class="col-md-2"></div>


</div>
</div>

<br />

<?php include "footer.php" ?>