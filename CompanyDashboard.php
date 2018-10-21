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
header("Location:login.php?msg=Invalid User Name or Password");
	exit();
	die();
}

header("Location:CompanyDashboard");
	exit();
	die();



if(isset($_POST['PostMyAd']))
{
  if(empty($_POST['category'])||empty($_POST['products'])||empty($_POST['AdTitle'])||empty($_POST['AdDesc'])||empty($_POST['priceRange'])||
  empty($_POST['minOrder'])||empty($_POST['SearchTags'])||$_FILES['AdPic']['name']=='')
  {
	  echo '<script>alert("Please Fill out all the Required Information to Register ! Please Re enter and Try again")</script>';
  }
  else
  {
		  	$file_name1=$_FILES['AdPic']['name'];
			$file_tmp1=$_FILES['AdPic']['tmp_name'];
	
	    $folder1="images/$file_name1";
	    move_uploaded_file($file_tmp1,$folder1);
		  
		  $email=$_SESSION['username'];
		  $category=$_POST['category'];
		  $products=$_POST['products'];
		  $AdTitle=$_POST['AdTitle'];
		  $AdDesc=$_POST['AdDesc'];
		  $priceRange=$_POST['priceRange'];
		  $minOrder=$_POST['minOrder'];
		  $SearchTags=$_POST['SearchTags'];
		  
		   require"connect_db.php";
		  $query="INSERT INTO companyAds(email,category,products,AdTitle,AdDesc,priceRange,minOrder,SearchTags,AdPic) 
		  VALUES('$email','$category','$products','$AdTitle','$AdDesc','$priceRange','$minOrder','$SearchTags','$folder1')";
		   if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Ad has been Successfully been Posted !")</script>';
	           echo '<script>window.location="CompanyDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="CompanyDashboard.php"</script>';
              }

}
}




if(isset($_POST['PostmyPortfolio']))
{
  if($_FILES['portfolio1']['name']==''||$_FILES['portfolio2']['name']==''||$_FILES['portfolio3']['name']==''||$_FILES['portfolio4']['name']==''
  ||$_FILES['portfolio5']['name']==''||$_FILES['portfolio6']['name']=='')
  {
	  echo '<script>alert("Please Select All 6 Pictures for portfolio and Then Try Again !")</script>';
	  echo '<script>window.location="CompanyDashboard.php"</script>';
	  
  }
  else
  {
		  	$file_name1=$_FILES['portfolio1']['name'];
			$file_tmp1=$_FILES['portfolio1']['tmp_name'];
	
	    $folder1="images/$file_name1";
	    move_uploaded_file($file_tmp1,$folder1);
		
		$file_name2=$_FILES['portfolio2']['name'];
			$file_tmp2=$_FILES['portfolio2']['tmp_name'];
	
	    $folder2="images/$file_name2";
	    move_uploaded_file($file_tmp2,$folder2);
		
		
		$file_name3=$_FILES['portfolio3']['name'];
			$file_tmp3=$_FILES['portfolio3']['tmp_name'];
	
	    $folder3="images/$file_name3";
	    move_uploaded_file($file_tmp3,$folder3);
		
		
		$file_name4=$_FILES['portfolio4']['name'];
			$file_tmp4=$_FILES['portfolio4']['tmp_name'];
	
	    $folder4="images/$file_name4";
	    move_uploaded_file($file_tmp4,$folder4);
		
		
		$file_name5=$_FILES['portfolio5']['name'];
			$file_tmp5=$_FILES['portfolio5']['tmp_name'];
	
	    $folder5="images/$file_name5";
	    move_uploaded_file($file_tmp5,$folder5);
		
		
		$file_name6=$_FILES['portfolio6']['name'];
			$file_tmp6=$_FILES['portfolio6']['tmp_name'];
	
	    $folder6="images/$file_name6";
	    move_uploaded_file($file_tmp6,$folder6);
		
		  $email=$_SESSION['username'];
		  
		  
		   require"connect_db.php";
		  $query="INSERT INTO portfolio(pic1,pic2,pic3,pic4,pic5,pic6,email) 
		  VALUES('$folder1','$folder2','$folder3','$folder4','$folder5','$folder6','$email')";
		   if ($connect->query($query) === TRUE) 
			  {
               echo '<script>alert("Your Portfolio has been Updated Successfully!")</script>';
	           echo '<script>window.location="CompanyDashboard.php"</script>';
              }
			  else 
			  {
	          echo '<script>alert("Error !")</script>';
	          echo '<script>window.location="CompanyDashboard.php"</script>';
              }
}
}

?>

