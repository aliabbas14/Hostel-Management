<?php

error_reporting(0);
session_start();
$a[]="";
//if(isset($_POST['submit']))

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

	if(isset($_SESSION['login']))
	{
			//echo "<script>alert('hello')</script>";

			$b=$_SESSION['login'];
			//echo "<script>alert('$b')</script>";
			$a="select * from student where email='".$b."'";
			//echo $a;
		$result=mysqli_query($conn,$a);
		//$result1=mysqli_query($conn,"select stu_id from student where name='".$b."'");
		$row=mysqli_fetch_array($result);
		
		$b="select * from allot where stu_id='".$row[0]."'";
		//echo $b;

		$resul1=mysqli_query($conn,$b);
		$row1=mysqli_fetch_array($resul1);


		$resul2=mysqli_query($conn,"select * from hostel where hostel_id='".$row1[1]."'");
		$row2=mysqli_fetch_array($resul2);

			//$a=mysqli_fetch_array($result,MYSQLI_BOTH);

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
					<span>Y</span>our <span>R</span>ecipt
				</h3>
			
				<div class="tittle-style">
				</div>
			</div>
				
				</h3>
			
				<div class="tittle-style">
				</div>
			</div>
				<center>
				<div class="styled-input">
				<form method="post" class="register-form">
					<table class="table table-striped" >
					<tr ><td><b>Name:</b></td><td align="center"><?php echo $row[1];?></td></tr>
					<tr ><td><b>Date of Birth:</b></td><td align="center"><?php echo $row[3];?></td></tr>
					<tr ><td><b>Your Category:</b></td><td align="center"><?php echo $row[11];?></td></tr>
					<tr ><td><b>Hostel:</b></td><td align="center"><?php echo $row2['name'];;?></td></tr>
					<tr ><td><b>Amount:</b></td><td align="center"><?php echo $row2[8];?></td></tr>
					</tr>
					<tr align="center"><td><input type="submit" class="btn btn-default" name="submit" value="print"> </td><td><input type="submit" class="btn btn-default" name="submit" value="cancel" formaction="services.php"></td></tr>
					</table>
				</form><br><br><br><br>
				<div class="alert alert-warning"><strong>Congratulations !! </strong>you have got admission in hostel.
				<br>Do configure with this reciept withi 15 days otherwise it would be cancelled</div>
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
	