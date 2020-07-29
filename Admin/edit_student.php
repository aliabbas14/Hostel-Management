<?php
session_start();
		
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}
		
			$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");
		
		
		
		//$sid="";
		$name="";
		$gender="";
		$dob="";
		$phone="";
		$address="";
		$city="";
		$email="";
		$category="";
		//$obc="";
		//$fee="";
		
		if(isset($_GET["Sid"]))
		{
						
			

			$Sid=$_GET['Sid'];
			$x="select * from student where stu_id=".$Sid;
			//echo "<script>alert('$x')</script>";
			
			//$y="select * from seat where hostel_id=".$Sid;
			//echo "<script>alert('$y')</script>";

			
			
			$result=mysqli_query($conn,$x);
			//$result1=mysqli_query($conn,$y);
			$row=mysqli_fetch_array($result);
			//$row2=mysqli_fetch_array($result1);
			
			$name=$row[1];
			$gender=$row[2];
			$dob=$row[3];
			$phone=$row[4];
			$address=$row[5];
			$city=$row[6];
			$email=$row[9];
			$category=$row[11];
			//$open=$row2[2];
			//$sc=$row2[3];
			//$st=$row2[4];
			//$obc=$row2[5];
		}
		if(isset($_POST["edit"]))
		{

			
		/*$name=$_POST["name"];
		$gender=$_POST["gender"];
		$dob=$_POST["dob"];*/
		$phone=$_POST["phone"];
		//$address=$_POST["address"];
		//$city=$_POST["city"];
		$email=$_POST["email"];
		//$category=$_POST["category"];
		

		$a="update student set phone='".$phone."',email='".$email."'where stu_id='".$Sid."'";
		$result=mysqli_query($conn,$a);
		//$result1=mysqli_query($conn,"update seat set `1`='".$open."',`2`='".$sc."',`3`='".$st."',`4`='".$obc."' where hostel_id='".$Sid."'");
		
		if($result==1)
		{
			//setcookie("edit","abc");
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
	<title>Edit Student</title>
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
					
						<h2 class="page-title">Edit Student </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Information</div>
									<div class="panel-body">
				<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										
				<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-8">
				<input type="text" name="name" id="fname" value="<?php echo $name; ?>" class="form-control" required="required" disabled>
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-2 control-label">Gender</label>
				<div class="col-sm-8">
				<input type="text" name="gender" id="fname" value="<?php echo $gender; ?>" class="form-control" required="required" disabled>
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-2 control-label">DOB</label>
				<div class="col-sm-8">
				<input type="text" name="dob" id="fname"  value="<?php echo $dob; ?>" class="form-control" required="required" disabled>
				</div>
				</div>


				<div class="form-group">
				<label class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-8">
				<input type="text" name="phone" id="fname"  value="<?php echo $phone; ?>" class="form-control" required="required">
				</div>
				</div>




				<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-sm-8">
				<input type="text" name="address" id="mname"  class="form-control" value="<?php echo $address; ?>" disabled>
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-2 control-label">City</label>
				<div class="col-sm-8">
				<input type="text" name="city" id="lname"  class="form-control" value="<?php echo $city; ?>" disabled>
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
				<label class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-8">
				<input type="email" name="email" id="contact"  class="form-control" required="required" value="<?php echo $email; ?>">
				</div>
				</div>


				<div class="form-group">
				<label class="col-sm-2 control-label">Category</label>
				<div class="col-sm-8">
				<input type="text" name="category" id="contact"  class="form-control" required="required" value="<?php echo $category; ?>" disabled>
				</div>
				</div>


				<!--<div class="form-group">
				<label class="col-sm-2 control-label">Total Number Of Seats</label>
				<div class="col-sm-8">
				<input type="text" name="seat" id="contact"  class="form-control" required="required" value="<?php //echo $seat; ?>">
				</div>
				</div>




				<div class="form-group">
				<label class="col-sm-2 control-label">password</label>
				<div class="col-sm-8">
				<input type="password" name="password" id="lname"  class="form-control" required="required" value="<?php //echo $password ?>">
				</div>-->
				</div>
				<div class="col-sm-6 col-sm-offset-4">
				<button class="btn btn-default" type="submit" name="cancel">Cancel</button>
				<input type="submit" name="edit" Value="edit" class="btn btn-primary">
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
$("#loaderIcon").Side();
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