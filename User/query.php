
<?php

	include_once 'header2.php';

	if(isset($_POST['sub']))
	{
		$a=$_POST['mess'];
		$dataTime = date("Y-m-d H:i:s");
		$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		
						$db=mysqli_select_db($conn,"hostel_managment")or die(mysqli_error($conn));

						$y=$_SESSION['student_id'];
						$z="INSERT INTO `query_report`(`stu_id`, `query_detail`, `query_date`) VALUES ('".$y."','".$a."','".$dataTime."')";
						$result=mysqli_query($conn,$z);
						if($result)
							echo "<script>alert('Your query has been accepted')</script>";
						else
							echo "<script>alert('Please contact your administrator!!')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<div class="register-form">
		<div>
			<label style="color: #000;
    margin-bottom: 10px;
    letter-spacing: 1px;">Query</label>

		</div>

		<div>
			<textarea name="mess" placeholder="Enter your queries" style="    outline: none;
    font-size: 15px;
    color: #000;
    padding: 12px;
    margin-bottom: 20px;
    width: 100%;
    border: 1px solid #000;
    -webkit-appearance: none;
    display: block;
    background: transparent;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -o-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px;
}"></textarea>
		</div>

		<div>
			<input type="submit" name="sub" style="font-size: 16px;
    color: #fff;
    background: #ef5861;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 13px 0;
    -webkit-appearance: none;
    width: 100%;
    letter-spacing: 1px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;">
		</div>
	</form>
</div>
</body>
</html>

<?php

	include_once 'footer.php';
?>