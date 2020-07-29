
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title> Login</title>
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
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
					
				</form>
			</div>

		</div>
	</div>

</body>

</html>