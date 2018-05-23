<?php if($_SESSION['login'])
{?>
<div class="top-header">
	<div class="container">
	

<link href="mystyle.css" rel='stylesheet' type='text/css' />


	<ul  data-wow-delay=".5s">
		
				<li><a href="logout.php" >Logout</a></li>
			<li><a href="profile.php">My Profile</a></li>
				<li><a href="change-password.php">Update Password</a></li>
			<li ><a href="tour-history.php">My Tour</a></li>
				<li ><a href="index.php">Home</a></li>
		
			
		
		</ul>
		<ul data-wow-delay=".5s"> 
						
		
        </ul>



		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header">
	<div class="container">
		


<link href="mystyle.css" rel='stylesheet' type='text/css' />


<ul >
  <li ><a href="#" data-toggle="modal" data-target="#myModal" >Registar</a></li> 
			<li class="log"><a href="#" data-toggle="modal" data-target="#myModal4" >Log In</a></li>
				<li class="hm"><a href="admin/index.php">Admin Panel</a></li>
</ul>

		<div class="clearfix"></div>
	</div>
</div>
<?php }?>

<div class="header">
	<div class="container">
		
	
		<div class="lock fadeInDown animated" data-wow-delay=".5s"> 
			
           
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default">
				 	<div class="navbar-header">
				
				</div>
				
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							
								<li><a href="package-list.php">Packages</a></li>
							
							
								
								<?php if($_SESSION['login'])
{?>
								<?php } else { ?>
								<li><a href="enquiry.php"> Contact</a>  </li>
								<li><a href="page.php?type=aboutus">About</a></li>
								<?php } ?>
								<div class="clearfix"></div>

						</ul>
					</nav>
				</div>

			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>