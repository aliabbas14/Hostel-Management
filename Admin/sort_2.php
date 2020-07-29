




<!DOCTYPE html>
<html>
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
					
						<h2 class="page-title">Current Hostel Status</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">All Information</div>
									<div class="panel-body">
			
										
							<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"hostel_managment");


	$result=mysqli_query($conn,"select * from seat");

echo"<div><table border=5>
		<tr>
			<td>Hostel Name</td>
			<td>Open Actual Seat</td>
			<td>Open Vacant Seat</td>
			<td>OBC Actual Seat</td>
			<td>OBC Vacant Seat</td>
			<td>ST Actual Seat</td>
			<td>ST Vacant Seat</td>
			<td>SC Actual Seat</td>
			<td>SC Vacant Seat</td>
			<td>DS Actual Seat</td>
			<td>DS Vacant Seat</td>
			
		</tr>
";

while($row=mysqli_fetch_array($result))
{
	$a=$row['hostel_id'];
	$g="select * from hostel where hostel_id=".$a;
	$result2=mysqli_query($conn,$g);
	$row2=mysqli_fetch_array($result2);
	$hostel_name=$row2['1'];

	echo "<tr>
			<td>".$hostel_name."</td>
			<td>".$row['1_vacant']."</td>
			<td>".$row['1']."</td>
			<td>".$row['2_vacant']."</td>
			<td>".$row['2']."</td>
			<td>".$row['3_vacant']."</td>
			<td>".$row['3']."</td>
			<td>".$row['4_vacant']."</td>
			<td>".$row['4']."</td>
			<td>".$row['5_vacant']."</td>
			<td>".$row['5']."</td>



	</tr> </div>";


}


	
?>


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

