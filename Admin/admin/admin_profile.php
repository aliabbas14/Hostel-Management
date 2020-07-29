<?php
/*session_start();
	$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");
		
		if(isset($_SESSION['admin']))
		{
			$a=$_SESSION['admin'];
	
	$getinfo = "SELECT * from admin_add where name = '".$a."'";
	$query = mysqli_query($conn,$getinfo);
		
		$a=mysqli_fetch_array($query,MYSQLI_BOTH);
		}*/
		session_start();

if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}
if(isset($_SESSION['admin']))
		{
			//$a=$_SESSION['admin'];
	
	$getinfo = "SELECT * from admin_add where name = '".$_SESSION['admin']."'";
	$query = mysqli_query($conn,$getinfo);
		
	
		}
		$a=mysqli_fetch_array($query,MYSQLI_BOTH);

			

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Admin Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Profile Admin </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Account Information</div>
									<div class="panel-body">

										<div class="form-group">
										<label class="col-sm-2 control-label">Name</label>
										<div class="col-sm-8">
										<label class="control-label"><?php echo $a[1]?></label>
										</div>
										</div><br>

										<div class="form-group">
										<label class="col-sm-2 control-label">City</label>
										<div class="col-sm-8">
										<label class="control-label"><?php echo $a[2];?></label>
										</div>
										</div><br>

										<div class="form-group">
										<label class="col-sm-2 control-label">Email</label>
										<div class="col-sm-8">
										<label class="control-label"><?php echo $a[3];?></label>
										</div>
										</div><br>
										
										<div class="form-group">
										<label class="col-sm-2 control-label">Gender</label>
										<div class="col-sm-8">
										<label class="control-label"><?php echo $a[4];?></label>
										</div>
										</div><br>

										<div class="form-group">
										<label class="col-sm-2 control-label">Phone</label>
										<div class="col-sm-8">
										<label class=""><?php echo $a[5];?></label>
										</div>
										</div><br>
					

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>


</html>