<?php
session_start();
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

<div>
<h1><center>Welcome to ADMIN Panel<center></h1>
</div>
				<?php include('includes/sidebarmenu.php');?>
							
							

</body>
</html>
<?php } ?>