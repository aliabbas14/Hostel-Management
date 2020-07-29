
<!--<?php
//session_start();


//if(!isset($_SESSION['otp']))
	{
//		header('location:signup.php');
	}
 
?>-->
<html>
	<head>
	
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">


<!--<style>

.btn-otp-submit
{
	margin-top:5%;
	margin-left:270%;
}


.content
{
	margin-left:36%;
	margin-top:2%;
}


.email_verification_text
{
	margin-top:18%;
	font-size:18px;
	margin-left:29%;
}

.btn-otp-submit
{
	margin-left:310%;
}

</style>-->
</head>
<body>
<?php


//$mail = $_SESSION['username'];

?>
<?php 
	include_once("header2.php");
	?> 

<div class="register-form-main">
	<div class="container">
		<div class="title-div">
			<h3 class="tittle">
				<span>V</span>erify
				<span>E</span>-mail
			</h3>
			<div class="tittle-style"></div>
		</div>
		<div class="login-form">
		<form method="GET" action="">
				
				<div class="alert alert-success" role="alert">

				<strong>Note:</strong> An OTP is sent to your registered E-Mail Address</p>
		  
				</div>
			
				
				<div class="col-md-4">
					<h3>Enter OTP</h3>	
				</div>

				<div class="col-md-7">
								
					<input type="password" maxlength="4" name="email_otp" class="form-control" placeholder="Enter OTP">
								
		    	</div>
		    
		
				<div class="row-lg-1 controls">    
					<input type="submit" name="verify" value="Verify" class=""/>
				</div>
			
		</form>
		</div>
	</div>
</div>
<?php 
	include_once("footer.php");
	?>
</body>
</html>
<?php
//require_once('dbconnection.php');
if(isset($_SESSION['pin']) && isset($_GET['email_otp']))
{
//	echo $_SESSION['pin'];
	//echo $_GET'email_otp'];
	if($_GET['email_otp']==$_SESSION['pin'])
	{
		$n=$_SESSION['username'];
		$p=$_SESSION['password'];
		
		$con=mysqli_connect('localhost','root','') or die("can't connect");
		$db=mysqli_select_db($con,'hostel_managment') or die("cannot connect database");

		$a="insert into student (name,gender,dob,phone,address,city,merit_rank,choice,email,password,category_id,alloted,confirmed) values('','','','','','','','','".$n."','".$p."',1,0,0)";
		//echo $a;
		$q=mysqli_query($con,$a);
		if($q==1)
		{
			$y="select * from student where email='".$n."'";
			$result=mysqli_query($con,$y);
			$row=mysqli_fetch_array($result);
			$x=$row[0];
			
			$dataTime = date("Y-m-d H:i:s");

			$j="INSERT INTO `status_report`(`stu_id`,`pending_time`, `alloted_time`, `confirmed_time`) VALUES (".$x.",'".$dataTime."','','')";
			//echo $j;

			$z=mysqli_query($con,$j);

			//echo "<script>alert('registration successful now please log in')</script>";
			$_SESSION['otpStatus']='1';
			unset($_SESSION["pin"]);
			
			header('location:login.php');
		}
		else
		{
		echo "<script>alert('registration failed!')</script>";
		}



	}
	else
	{
		echo "<script>alert('Invalid OTP')</script>";
	}
}
//include_once"footer.php" 
?>