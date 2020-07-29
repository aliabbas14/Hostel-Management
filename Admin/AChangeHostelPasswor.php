<?php
	include_once 'config.php';
	$result=mysqli_query($con,"select hostel_id,name from hostel");
?>
<html>
	<head>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/fileinput.min.css">
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	</head>

	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
						<h2 class="page-title">Change Hostel Passwowrd</h2>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">
										<div class="panel-heading">Update Password</div>
											<div class="panel-body">

												<form method="post" class="form-horizontal">
												
													<div class="form-group">
													<label class="col-sm-2 control-label">Hostel</label>
													<div class="col-sm-8">
														<select name="hostel" class="form-control">
															<?php 
																while ($a=mysqli_fetch_array($result)) {
																	
																	echo "<option value='".$a['hostel_id']."'>".$a['name']."</option>";		
																}
															?>
														</select>
													</div>
													
												</div>

												<div class="form-group">
												<label class="col-sm-2 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="pass" placeholder="Password" required=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain one lowercase, one uppercase, one number & must be 8 characters long">
												</div>
												</div>

												<div class="form-group">
												<label class="col-sm-2 control-label">Re.Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password" required=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain one lowercase, one uppercase, one number & must be 8 characters long">
												</div>
												</div>

												<div class="col-xs-4 col-sm-offset-4">
													<button name="change" class="btn btn-primary btn-block">Change</button>
												</div>
												</form>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>		
				</div>					
			</div>
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