<?php

error_reporting(0);
session_start();
$a[]="";
//if(isset($_POST['submit']))

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

	if(isset($_SESSION['login']))
	{
			$b=$_SESSION['login'];
			//echo "<script type='text/javascript'>alert('$b')</script>";
			$result=mysqli_query($conn,"select * from student where email='".$b."'");
			$a=mysqli_fetch_array($result,MYSQLI_BOTH);
	}
	//}
?>
<!DOCTYPE html>
<html>
<head>	<title>Best Study an Education Category Bootstrap Responsive Website Template | Join Us :: w3layouts</title>
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
	<?php include_once("header2.php");?>
	<!-- Gallery -->
	<div class="gallery">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>V</span>iew <span>P</span>rofile
				</h3>
			
				<div class="tittle-style">
				</div>
			</div>
				<center>
				<div class="styled-input">
				<form method="post" class="register-form">
					<table class="table table-striped" >
					<tr ><td><b>Name:</b></td><td align="center"><?php echo $a[1]; ?></td></tr>
					<tr ><td><b>Date of Birth:</b></td><td align="center"><?php echo $a[3]; ?></td></tr>
					<tr ><td><b>Phone no:</b></td><td align="center"><?php echo $a[4]; ?></td></tr>
					<tr ><td><b>Address:</b></td><td align="center"><?php echo $a[5]; ?></td></tr>
					<tr ><td><b>city:</b></td><td align="center"><?php echo $a[6]; ?></td></tr>
					<tr ><td><b>Merit Rank:</b></td><td align="center"><?php echo $a[7]; ?></td></tr>
					<tr ><td><b>Hostel:</b></td><td align="center"><?php echo $a[8]; ?></td></tr>
					<tr ><td><b>Email:</b></td><td align="center"><?php echo $a[9]; ?></td></tr>
					<tr ><td><b>Stream:</b></td><td align="center"><?php echo $a[14]; ?></td></tr>
					<tr ><td><b>Distance from hostel:</b></td><td align="center"><?php echo $a['distance']; ?></td></tr>
					<tr ><td><b>State:</b></td><td align="center"><?php echo $a['state']; ?></td></tr>
					<tr ><td><b>Marksheet:</b></td><td align="center">
						<?php
							$b=base64_encode($a[15]);
							//echo $b;
						echo "<img height=200 width=200 src='data:text/html;base64,".$b." '/>";
						?>
					</td></tr> 
					<tr align="center"><td><input type="submit" class="btn btn-default" name="submit" value="Done"> 
					
					</table>
				</form>
				</div>
		</center>		
		</div>
			</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!-- //Gallery -->

	<?php
		include_once('footer.php');
	?>