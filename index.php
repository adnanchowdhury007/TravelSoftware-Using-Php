<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sunset Travel</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />



<link href="css/font-awesome.css" rel="stylesheet">

<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="js/wow.min.js"></script>

</head>
<body background="qqq.svg">

<?php include('includes/header.php');?>
<div >
	<div class="container" id="slider">
		<link href="slider.css" rel='stylesheet' type='text/css' />


		<h1 align="center" style="color: purple"; > Sunset Travel</h1>
		<font  size="4" face="sans-serif" color="purple"> <marquee >Eid Offer!! New Honeymoon Package for Sajek !! Discount !!  Contact With Us to Post Your Agency Packages </marquee> </font>


	<figure>
		<img src="ttt.jpg" width="1240px" height="300px">
		<img src="sss.jpg" width="1240px" height="300px">
		<img src="rrr.jpg" width="1240px" height="300px">
		
		<img src="sss.jpg" width="1240px" height="300px">
				<img src="ttt.jpg" width="1240px" height="300px">
	
		
		
	</figure>

<font size="6" color="purple"><p align="center"><b>Want to save money?</b><br></p>
It compares price from 200+ Agencies to help you to find the lowest price Tours.</p></font>
	</div>


</div>
<div>
	

</div>

<div class="container">
	<div class="holiday">





	<h3>All Packages</h3>


<?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
				</div> <br><br>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4 style="color:#28B463 ;">Agency Name: <?php echo htmlentities($result->PackageName);?></h4>
					<h6>Package Type : <?php echo htmlentities($result->PackageType);?></h6>
					<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>TAKA <?php echo htmlentities($result->PackagePrice);?></h5>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
				</div>
				<div class="clearfix"></div>
			</div>

<?php }} ?>


<div><a href="package-list.php" class="view">More Packages</a></div>
</div>
			<div class="clearfix"></div>
	</div>

<?php include('includes/signup.php');?>
<?php include('includes/signin.php');?>

</body>
</html>
