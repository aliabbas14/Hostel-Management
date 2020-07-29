<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title> Gallery ::Hostel</title>
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
	<?php include_once("header2.php");?><!-- short-->
	<!--<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short_ls">
				<li>
					<a href="index.html">Home</a>
					<span>| |</span>
				</li>
				<li>Gallery</li>
			</ul>
		</div>
	</div>-->
	<!-- //short-->
	<?php
if(isset($_POST['Submit']))
{
	$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
		$db=mysqli_select_db($conn,"hostel");
	

}
?>

	<!-- Gallery -->
	<div class="gallery">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>O</span>ur <span>G</span>allery
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="agileinfo-gallery-row">
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_list - Samras Ahmedabad.php" class="imghvr-hinge-right figure">
						<img src="images/rajkot12.jpg">
						<!--p 
						$sql = "SELECT * FROM images where img_name='samras_amd_1' "; 
						if ($sql==1)
						{
						$result = mysqli_query($conn, $sql);     
						$row = mysqli_fetch_array($result);
						echo $row[3];
						}
						else
						{
							echo "images not found";
						}
						?>" alt="" title="Ahmedabad samras hostel" />-->
						<div class="agile-figcaption">
							<h4>Samras Ahemedabad</h4>
						</div>
					</a>
				</div>
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_list - Samras Rajkot.php" class="imghvr-hinge-right figure">
						<img src="images/rajkot12.jpg" alt="" title="Rajkot samras hostel" style="" />
						<div class="agile-figcaption">
							<h4>Samras Rajkot</h4>
						</div>
					</a>
				</div>
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_list - Samras Surat.php" class="imghvr-hinge-right figure">
						<img src="images/surat1.jpg" alt="" title="Our Computer Lab"  style="height: 262px" />
						<div class="agile-figcaption">
							<h4>Samras Surat</h4>
						</div>
					</a>
				</div>
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_list - Samras Vadodara.php" class="imghvr-hinge-right figure">
						<img src="images/vadodra.jpg" alt="" title="Meditation"  />
						<div class="agile-figcaption">
							<h4>Samras Vadodara</h4>
						</div>
					</a>
				</div>
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_list - Samras Bhavanagar.php" class="imghvr-hinge-right figure">
						<img src="images/bhavnagar11.jpg" alt="" title="Science" style="    margin-top: -248px;
    height: 270px;" />
						<div class="agile-figcaption">
							<h4>Samras Bhavanagar</h4>
						</div>
					</a>
				</div>
				<div class="col-xs-4 w3gallery-grids">
					<a href="hostel_ahm.php" class="imghvr-hinge-right figure">
						<img src="images/aanand.jpg" alt="" title="Group Discussion" style="    margin-top: -245px;
    height: 270px;
}" />
						<div class="agile-figcaption">
							<h4>Samras Aanand</h4>
						</div>
					</a>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //Gallery -->

	<!-- footer -->
	<?php include_once("footer.php");?>
	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- simple-lightbox -->
	<script type="text/javascript" src="js/simple-lightbox.js"></script>	
	<script>
		$(function () {
			var gallery = $('.agileinfo-gallery-row a').simpleLightbox({
				navText: ['&lsaquo;', '&rsaquo;']
			});
		});
	</script>
	<link href='css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
	<!-- Light-box css -->
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