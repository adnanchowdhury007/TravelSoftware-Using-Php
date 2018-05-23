<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>

</head> 
<body>
   <div class="page-container">

<div class="left-content">
	 
<!--heder end here-->

<div >	
				<!-- tables -->
				
				<div>
					<div>
					  <h2>Users</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th>Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>RegDate </th>
							<th>Update Date</th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from tblusers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->FullName);?></td>
							<td><?php echo htmlentities($result->MobileNumber);?></td>
							<td><?php echo htmlentities($result->EmailId);?></td>
							<td><?php echo htmlentities($result->RegDate);?></td>
							<td><?php echo htmlentities($result->UpdationDate);?></td>
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
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
  

</body>
</html>
<?php } ?>