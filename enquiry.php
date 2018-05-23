<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
}
else
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Group4 Travel Prject</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	
</head>
<body background="qqq.svg">

<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1>Contact Us to Post Your Travel Package</h1>
	</div>
</div>

<div class="privacy">
	<div class="container">
		
		<form name="enquiry" method="post">
		 <?php if($error){?><div ><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div ><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">

			<b>Your Agency Name</b>  <input type="text" name="fname" class="form-control" id="fname"  required="">
	</p>

	<p style="width: 350px;">
<b>Package Name</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="11"  required="">
	</p>
<p style="width: 350px;">
<b>Agency Email</b>  <input type="email" name="email" class="form-control" id="email" required="">
	</p>

	

	<p style="width: 350px;">
<b>Package Location</b>  <input type="text" name="subject" class="form-control" id="subject"   required="">
	</p>
	<p style="width: 350px;">
<b>Description</b>  <textarea name="description" class="form-control" rows="6" cols="50" id="description"   required=""></textarea>
	</p>

			<p style="width: 350px;">
<button type="submit" name="submit1" >Submit</button>
			</p>
			</form>


	</div>
</div>

<?php include('includes/signup.php');?>

<?php include('includes/signin.php');?>


</body>
</html>
