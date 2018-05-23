<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status=1;

$sql = "UPDATE tblenquiry SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Enquiry  successfully read";
}





	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>


</head> 
<body>

<div class="agile-grids">	
				
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Enquiries</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Ticket id</th>
							<th>Name</th>
							<th>Mobile No./ Email</th>
							
							<th>Subject </th>
							<th>Description </th>
							<th>Posting date </th>
							<th>Action </th>
							
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from tblenquiry";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td width="120">#EQ-<?php echo htmlentities($result->id);?></td>
							<td width="50"><?php echo htmlentities($result->FullName);?></td>
								<td width="50"><?php echo htmlentities($result->MobileNumber);?> /<br />
								<?php echo $result->EmailId;?></td>
							
						
							<td width="200"><?php echo htmlentities($result->Subject);?></a></td>
							<td width="400"><?php echo htmlentities($result->Description);?></td>
							
								<td width="50"><?php echo htmlentities($result->PostingDate);?></td>
								<?php if($result->Status==1)
{
	?><td>Read</td>
<?php } else {?>

<td><a href="manage-enquires.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to read')" >Pending</a>
</td>
<?php } ?>
</tr>
						 <?php } }?>
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

						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>

</body>
</html>
<?php } ?>