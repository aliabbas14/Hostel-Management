<?php
	include_once 'config.php';
	$result=mysqli_query($con,"select name from hostel");
?>
<html>
	<head>
	</head>

	<body>
		<form method="post">
			<div>
				<select>
					<?php 
						while ($a=mysqli_fetch_array($result)) {
							
							echo "<option>".$a['name']."</option>";		
						}
					?>
					
				</select>
			</div>




			<div>
				<input type="password" name="pass" placeholder="Password">
			</div>

			<div>
				<input type="password" name="confirmpass" placeholder="Confirm Password">
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

	}
?>