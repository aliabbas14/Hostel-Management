<html>
	<body>
		<form method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" value="submit" name="sub"></form>
	</body>
</html>
<?php
	if(isset($_POST['sub']))
	{
		if($_FILES["image"]["name"])
		{
			echo "<script type='text/javascript'>alert('hiww1')</script>";
		}
		else
		{
			"<script type='text/javascript'>alert('hiww2')</script>";
		}
	}

?>