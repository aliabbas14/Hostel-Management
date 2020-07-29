<?php
session_start();		
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}
		$Hid="";
		$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");
		
		if(isset($_GET["Hid"]))
		{
			$Hid=$_GET['Hid'];
		}
		
		if(isset($_POST["delete"]))
		{
			$result=mysqli_query($conn,"delete from hostel where hostel_id=".$Hid."");
	
			if($result==1)
			{
				echo "<script>alert('succesfully deleted data')</script>";
			}
			else
			{
					echo "<script>alert('failed!!')</script>";
			}
		}
		if(isset($_POST['back']))
		{
			header('location:dashboard.php');
		}
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
	<title>Delete Hostel</title>
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
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
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
					
						<h2 class="page-title">Delete Hostel </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Information</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
					
<?php

		/*$result=mysqli_query($conn,"select hostel_id from hostel where hostel_id=".$Hid);
		$row=mysqli_fetch_array($result);
		$h=$row[0];*/
?>		

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Id</label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno" value="<?php echo $Hid; ?>" class="form-control" >
</div>
</div>

<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit" name="back">Back</button>
<input type="submit" name="delete" Value="Delete" class="btn btn-primary">
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
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>