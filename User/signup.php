<?php

	if(isset($_POST['submit']))
	{

$con=mysqli_connect('localhost','root','') or die("can't connect");
$db=mysqli_select_db($con,'hostel_managment') or die("cannot connect database");
		$n=$_POST['user_name'];
		$p=$_POST['Password'];
		$c_p=$_POST['C_Password'];

	if($p==$c_p)
	{
		/*INSERT INTO `student`(`stu_id`, `name`, `gender`, `dob`, `phone`, `address`, `city`, `merit_rank`, `choice`, `email`, `password`, `category_id`, `alloted`, `confirmed`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])*/


		$a="insert into student (name,gender,dob,phone,address,city,merit_rank,choice,email,password,category_id,alloted,confirmed) values('','','','','','','','','".$n."','".$p."',1,0,0)";
		//echo $a;
		$q=mysqli_query($con,$a);
		if($q==1)
		{
			$y="select * from student where email='".$n."'";
			$result=mysqli_query($con,$y);
			$row=mysqli_fetch_array($result);
			$x=$row[0];
			//$_SESSION['student_id']=$x;
			//echo "<script>alert('$x')</script>";
			//header('location:login.php');

			$dataTime = date("Y-m-d H:i:s");

			$j="INSERT INTO `status_report`(`stu_id`,`pending_time`, `alloted_time`, `confirmed_time`) VALUES (".$x.",'".$dataTime."','','')";
			//echo $j;

			$z=mysqli_query($con,$j);

			echo "<script>alert('registration successful now please log in')</script>";
		}
		else
		{
		echo "<script>alert('registration failed!')</script>";
		}
	}
	else
	{
		echo "password not matched";
	}
}

?><!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Sign up</title>
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
	<?php 
	include_once("header2.php");
	?> 
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>S</span>ign
					<span>U</span>p
					<span>F</span>orm
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="login-form">
				<form  method="post">
					<div class="">
						<p>Enter Your Email-id  </p>
						<input type="email" class="name" name="user_name" required="" />
					</div>
					<div class="">
						<p>Password</p>
						<input type="password" class="password" name="Password" required="" />
					</div>
					<div class="">
						<p>Confirm Password</p>
						<input type="password" class="password" name="C_Password" required="" />
					</div>
					
					<label class="anim">
						<input type="checkbox" class="checkbox">
						<span> Remember me ?</span>
					</label>
					
					<input type="submit"  name="submit" value="Signup">
					<div class="register-forming">
						<p>To Login if  Account already exist--
							<a href="login.php">Click Here</a>
						</p>
					</div>
				</form>
			</div>

		</div>
	</div>

	<!-- footer -->
	<?php include_once("footer.php");?>	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
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