<?php session_start();?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>hostel</title>
	<!-- meta-tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //meta-tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header-top" >
		<div class="container">
			<div class="bottom_header_left">
				<p>
					<span class="fa fa-map-marker" aria-hidden="true"></span>Hostel, GUJARAT
				</p>
			</div>
			<div class="bottom_header_right">
				<div class="bottom-social-icons">
					<a class="facebook" href="https://www.facebook.com/merit-Based-Hostel-Admission">
						<span class="fa fa-facebook"></span>
					</a>
					<a class="twitter" href="https://www.twitter.com/?request_context=signupss">
						<span class="fa fa-twitter"></span>
					</a>
					<a class="pinterest" href="https://in.pinterest.com/government0952/pins/">
						<span class="fa fa-pinterest-p"></span>
					</a>
					<a class="linkedin" href="https://www.linkedin.com/feed/?trk=onboarding-landing">
						<span class="fa fa-linkedin"></span>
					</a>
				</div>

				<?php
				if(isset($_SESSION['login']))
				{
					include("config.php");
					?>
				<div class="header-top-righ">
					<a href="logout.php">
						<span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a>
				</div>

				<div class="header-top-righ">
					<a href="services.php">
						<span class="fa fa-sign-out" aria-hidden="true"></span>My Account</a>
				</div>
				<?php  } ?>
				<?php
				if(!isset($_SESSION['login'])) 
					{ 
						include("config.php");
						?>
				<div class="header-top-righ">
					<a href="login.php">
						<span class="fa fa-sign-out" aria-hidden="true"></span>Login</a>
				</div>
				<?php } ?>

<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="content white">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="hostel.php">
							<h1>
								<span class="fa fa-leanpub" aria-hidden="true"></span>Hostel
								<label>Merit Based Admission</label>
							</h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="hostel.php" class="effect-3">Home</a>
								</li>
																<!--<li>
									<a href="courses.html" class="effect-3">Courses</a>
								</li>-->
								<!--<li>
									<a href="join.html" class="effect-3">Admission</a>
								</li>-->
								<!--<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Others
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="#">Gallery</a>
										</li>
										<li>
											<a href="#">Contact us</a>
										</li>
									</ul>
								</li>-->
								<?php
								if(isset($_SESSION['login']))
									{ include("config.php");?>
								<li>
										<a href="join.php" class="effect-3">Admission</a>
										</li>
									<?php } ?>

								<li>
										<a href="hostel_list.php" class="effect-3">Gallery</a>
									</li>
								<li>
									<a href="about.php" class="effect-3">About Us</a>
								</li>
								
									<li>
									<a href="contact.php" class="effect-3">Contact Us</a>
								</li>
								<!--<li>
										<a href="logindemo.php" class="effect-3">&nbsp;&nbsp;&nbsp;Login/Registration</a>
								</li>-->

								
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>


</body>
</html>