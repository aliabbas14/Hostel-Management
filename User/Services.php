<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>My account</title>
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
	<?php 
	include_once("header2.php");
	?> 
	<!-- short -->
	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short_ls">
				<li>
					<a href="index.html">Home</a>
					
				</li>
				
			</ul>
		</div>
	</div>
	<div class="services"style="margin-top:0;">
		<div class="services">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>M</span>y
					<span>A</span>ccount
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="services-moksrow">
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-bullhorn icon" aria-hidden="true"></span>
						<a href="change_password1.php"><h4>View Profile</h4></a>
						<p>You can view the profile here.</p>
					</div>
				</div>
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-certificate icon" aria-hidden="true"></span>
						<a href="change_password.php"><h4>Change Password</h4></a>
						<p>You can change your password here.</p>
					</div>
				</div>
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-book icon" aria-hidden="true"></span>
						<a href="status.php"><h4>Show Status</h4></a>
						<p>You can view your status.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="services-moksrow">
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-users icon" aria-hidden="true"></span>
						<a href="card.php"><h4>Payment</h4></a>
						<p>You can pay here</p>
					</div>
				</div>
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-bus icon" aria-hidden="true"></span>
						<a href="query.php"><h4>Query</h4></a>
						<p>Enter your queries</p>
					</div>
				</div>
				<div class="col-xs-4 services-grids-w3l">
					<div class="servi-shadow">
						<span class="fa fa-laptop icon" aria-hidden="true"></span>
						<a href="leave.php"><h4>Leave</h4></a>
						<p>Leave status.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			<!--</div>-->
		</div>
	</div>
	</div>
	<!-- //short-->
	<!-- about -->
	<!-- //modal -->
	<!-- //news -->
	<?php 
	include_once("footer.php");
	?>
	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- stats numscroller-js-file -->
	<script src="js/numscroller-1.0.js"></script>
	<!-- //stats numscroller-js-file -->
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smooth scrolling -->
	<!-- //js-files -->

</body>

</html>