<?php
	include_once 'config.php';
	$result=mysqli_query($con,"select hostel_id,name from hostel");
?>
<html>
	<head>
	</head>

	<body>
		<form method="post">
			<div>
				<select name="hostel">
					<?php 
						while ($a=mysqli_fetch_array($result)) {
							
							echo "<option value='".$a['hostel_id']."'>".$a['name']."</option>";		
						}
					?>
					
				</select>
			</div>




			<div>
				<input type="password" name="pass" placeholder="Password" required=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain one lowercase, one uppercase, one number & must be 8 characters long">
			</div>

			<div>
				<input type="password" name="confirmpass" placeholder="Confirm Password" required=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain one lowercase, one uppercase, one number & must be 8 characters long">
			</div>

			<div>
				<button name="change">Change</button>
			</div>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['change']))
	{
		$pass=$_POST['pass'];
		$cpass=$_POST['confirmpass'];

		if($pass==$cpass && strlen($pass)==8)
		{
			$hostel_id=$_POST['hostel'];
			$u="update hostel set password='".$pass."' where hostel_id=".$hostel_id;
			$result2=mysqli_query($con,$u);
			if($result2)
				echo"<script>alert('Password changed successfully')</script>";
			else
				echo"<script>alert('Something went wrong')</script>";
		}
		else
		{
			echo"<script>alert('Password doesnt match or is less than 8 characters')</script>";
			
		}	
	}
?>