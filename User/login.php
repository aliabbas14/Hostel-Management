
<?php
error_reporting(0);
session_start();
if(isset($_POST["submit"]))
{

	$username=$_POST['user_name'];
	$password=$_POST['Password'];
		$con=mysqli_connect('localhost','root','') or die("can't connect");
$db=mysqli_select_db($con,'hostel_managment') or die("cannot connect database");

		
		$x="select * from student where email ='".$username."'";
		echo $x."<br>";
		$result =mysqli_query($con,$x);
		$row=mysqli_fetch_array($result);
		//echo $row['user_name'];
		echo $row['password'];
		if($username==$row['email'] && $password==$row['password'])
		{
			$_SESSION['student_id']=$row[0];
			$_SESSION['login']=$username;
			header('location:hostel.php');
			
		}
		else
		{
			echo "Username or password is wrong";
		}
	}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title> Login</title>
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
		<?php include_once("header2.php");?>
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>L</span>ogin
					<span>F</span>orm
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="login-form">
				<form action="login.php" method="post">
					<div class="">
						<p>User Name </p>
						<input type="email" class="name" name="user_name" required="" />
					</div>
					<div class="">
						<p>Password</p>
						<input type="password" class="password" name="Password" required="" />
					</div>
					<label class="anim">
						<input type="checkbox" class="checkbox">
						<span> Remember me ?</span>
					</label>
					<div class="login-agileits-bottom wthree">
						<h6>
							<a href="#">Forgot password?</a>
						</h6>
					</div>
					<input type="submit" name="submit" value="Login">
					<div class="register-forming">
						<p>To Register New Account --
							<a href="signup.php">Click Here</a>
						</p>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!--footer-->
	<?php include_once("footer.php");?>
	<!--/footer -->

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