<?php
//session_start();
$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel");
		
	
if(isset($_POST['submit']))
{
$id=$_POST['id'];
$name=$_POST['name'];
$city=$_POST['city'];
$email=$_POST['email'];
$b=$_POST['b'];
$aid=$_POST['aid'];
$password=$_POST['password'];
$open=intval($_POST['open']);
$obc=intval($_POST['obc']);
$sc=intval($_POST['sc']);
$st=intval($_POST['st']);
$seats=$opan+$obc+$sc+$st;
$result=mysqli_query($conn,"insert into  hostel(hostel_id,name,seats,city,email,boys,id,password) values('".$id."','".$seats."','".$name."','".$city."','".$email."','".$b."','".$aid."','".$password."')");
$result1=mysqli_query($conn,"insert into  seat(hostel_id,open,sc,st,obc) values('".$id."','".$open."','".$sc."','".$st."','".$obc."')");

if($result==1 && $result1==1)
		{
			echo"<script>alert('Hostel Succssfully register');</script>";
		}
		
		else
		{
			echo "something went wrong!!";
		}

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
	<title>User Registration</title>
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
					
						<h2 class="page-title">Add Hostel </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Information</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Id</label>
<div class="col-sm-8">
<input type="text" name="id" id="regno"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name</label>
<div class="col-sm-8">
<input type="text" name="name" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel City</label>
<div class="col-sm-8">
<input type="text" name="city" id="fname"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">boys Hostel?</label>
<div class="col-sm-8">
<input type="text" name="b" id="fname"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Number Of seats for Open</label>
<div class="col-sm-8">
<input type="text" name="open" id="mname"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Number Of seats for OBC</label>
<div class="col-sm-8">
<input type="text" name="obc" id="lname"  class="form-control" required="required">
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
<input type="text" name="sc" id="contact"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Number Of Seats for ST</label>
<div class="col-sm-8">
<input type="text" name="st" id="contact"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Hostel Email </label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">id</label>
<div class="col-sm-8">
<input type="text" name="aid" id="lname"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">password</label>
<div class="col-sm-8">
<input type="password" name="password" id="lname"  class="form-control" required="required">
</div>
</div>
<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Add" class="btn btn-primary">
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