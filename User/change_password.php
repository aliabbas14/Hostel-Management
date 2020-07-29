<?php
$b="";
$x="";
error_reporting(0);
session_start();

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

	if(!isset($_SESSION['login']))
	{
		//$b=$_SESSION['login'];
		header('location:login.php');
			
	}
	

	if(isset($_POST['submit']))
	{
		$username=$_SESSION['login'];
		$a1="select * from student where email='".$username."' ";
		//echo $a1;
			$result=mysqli_query($conn,$a1);
			$a=mysqli_fetch_array($result,MYSQLI_BOTH);
		$password=$_POST['pass'];
		$passw=$_POST['Password'];
				//echo "<script>alert('$passw')</script>";
				
		//echo "<script>alert('$a[10]')</script>";
		if($password==$a[10])
		{
			if($_POST['Password']==$_POST['C_Password'])
			{
				$id=$a[0];
				//echo "<script>alert('password matched!')</script>";
				
				$result=mysqli_query($conn,"update student set password='".$passw."' where stu_id='".$id."'");
				//$x="update student set password='".$passw."' where stu_id='".$id."'";
				if($result)
				{
					//echo "update student set password='".$passw."' where stu_id='".$id."'";
					echo "<script>alert('password changed!')</script>";
				}
				else
				{
					echo "<script>alert('something went wrong!')</script>";
				}
				
			}
			else
			{
				echo "<script>alert('password and change password not matched')</script>";
			}
		}
		else
		{
			echo "<script>alert('your old password not matched')</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Change password</title>
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
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>C</span>hange<?php echo $x; ?>
					<span>P</span>assword
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="login-form">
				<form  method="post">
					<div class="">
						<p>Enter Your Current Password  </p>
						<input type="text" class="name" name="pass" required="" />
					</div>
					<div class="">
						<p>New Password</p>
						<input type="password" class="password" name="Password" required="" />
					</div>
					<div class="">
						<p>Confirm Password</p>
						<input type="password" class="password" name="C_Password" required="" />
					</div>
					
					
					<input type="submit"  name="submit" value="Change">
					<div class="register-forming">
						
						</p>
					</div>
				</form>
			</div>

		</div>
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