<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
	{
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
}




	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



</head> 
<body>
 
          
<div>	
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div >
					<div>
					  <h1>Manage Bookings</h1>
					    <table >
						<thead>
						  <tr>
						  <th>Booikn id</th>
							<th>Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>RegDate </th>
							<th>From /To </th>
							<th>Comment </th>
							<th>Status </th>
							<th>Action </th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblusers join  tblbooking on  tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td>#BK-<?php echo htmlentities($result->bookid);?></td>
							<td><?php echo htmlentities($result->fname);?></td>
							<td><?php echo htmlentities($result->mnumber);?></td>
							<td><?php echo htmlentities($result->email);?></td>
							<td><a href="update-package.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></td>
							<td><?php echo htmlentities($result->fdate);?> To <?php echo htmlentities($result->tdate);?></td>
								<td><?php echo htmlentities($result->comment);?></td>
								<td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='a')
{
echo "Canceled by you at " .$result->upddate;
} 
if($result->status==2 and $result->cancelby=='u')
{
echo "Canceled by User at " .$result->upddate;

}
?></td>

<?php if($result->status==2)
{
	?><td>Cancelled</td>
<?php } else {?>
<td><a href="manage-bookings.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> / <a href="manage-bookings.php?bckid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Confirm</a></td>
<?php }?>

						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>

		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
	
<div class="inner-block">

</div>


</div>
</div>
  <
						<?php include('includes/sidebarmenu.php');?>
					

</body>
</html>
<?php } ?>