<?php
session_start();
		
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}
		
			$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");
		
		
		
		$hid="";
		$name="";
		$email="";
		$id="";
		$seat="";
		$password="";
		$open="";
		$sc="";
		$st="";
		$obc="";
		
		if(isset($_GET["Hid"]))
		{
			
			$Hid=$_GET['Hid'];
			$result=mysqli_query($conn,"select * from hostel where hostel_id=".$Hid);
			$result1=mysqli_query($conn,"select * from seat where hostel_id=".$Hid);
			$row=mysqli_fetch_array($result);
			$row2=mysqli_fetch_array($result1);
			$seat=$row[2];
			$name=$row[1];
			$email=$row[4];
			$id=$row[6];
			$hid=$row[0];
			
			$password=$row[7];
			$open=$row2[2];
			$sc=$row2[3];
			$st=$row2[4];
			$obc=$row2[5];
		}
		if(isset($_POST["edit"]))
		{
			
		$name=$_POST["name"];
		$email=$_POST["email"];
		$seat=$_POST["seat"];
		$password=$_POST["password"];
		$open=$_POST["open"];
		$sc=$_POST["sc"];
		$st=$_POST["st"];
		$obc=$_POST["obc"];
		
		
		$result=mysqli_query($conn,"update hostel set name='".$name."',seats='".$seat."',email='".$email."',password='".$password."' where hostel_id='".$Hid."'");
		$result1=mysqli_query($conn,"update seat set open='".$open."',sc='".$sc."',st='".$st."',obc='".$obc."' where hostel_id='".$Hid."'");
		
		if($result && $result1)
		{
			setcookie("edit","abc");
			//header("location:edit.php");
			echo "<script>alert('succesfully updated data')</script>";
		}
		else
		{
			echo "<script>alert('failed to update data')</script>";
		}
		}
		if(isset($_POST['cancel']))
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
	<title>Edit Hostel</title>
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
					
						<h2 class="page-title">Edit Hostel </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Information</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										



<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name</label>
<div class="col-sm-8">
<input type="text" name="name" id="fname" value="<?php echo $name; ?>" class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email</label>
<div class="col-sm-8">
<input type="email" name="email" id="fname"  value="<?php echo $email; ?>" class="form-control" required="required" >
</div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label">Number Of seats for Open</label>
<div class="col-sm-8">
<input type="text" name="open" id="mname"  class="form-control" value="<?php echo $open; ?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Number Of seats for OBC</label>
<div class="col-sm-8">
<input type="text" name="obc" id="lname"  class="form-control" required="required" value="<?php echo $obc; ?>">
</div>
</div>


<!--
<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>
</select>
</div>
</div>
-->
<div class="form-group">
<label class="col-sm-2 control-label">Number Of Seats for SC</label>
<div class="col-sm-8">
<input type="text" name="sc" id="contact"  class="form-control" required="required" value="<?php echo $sc; ?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Number Of Seats for ST</label>
<div class="col-sm-8">
<input type="text" name="st" id="contact"  class="form-control" required="required" value="<?php echo $st; ?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Total Number Of Seats</label>
<div class="col-sm-8">
<input type="text" name="seat" id="contact"  class="form-control" required="required" value="<?php echo $seat; ?>">
</div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label">password</label>
<div class="col-sm-8">
<input type="password" name="password" id="lname"  class="form-control" required="required" value="<?php echo $password ?>">
</div>
</div>
<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit" name="cancel">Cancel</button>
<input type="submit" name="edit" Value="Edit" class="btn btn-primary">
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