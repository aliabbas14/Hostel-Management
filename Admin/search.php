<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
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
	<title>Search with different Criteria</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>
	<?php
	include_once 'config.php';
	$result=mysqli_query($con,"select hostel_id,name from hostel");
	$result2=mysqli_query($con,"select category_id,category from category");
?>
<form method="post">
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
			<br/>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Search with different Criteria</h2>
						<div>
								<label>Hostel Type:</label>&nbsp;&nbsp;
								<input type="checkbox" name="chkgov"  value="Government" >&nbsp;Government
								<input type="checkbox" name="chkpri"  value="Private" >&nbsp;Private <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="chkmale"  value="1" >&nbsp;Boys&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="chkfemale"  value="0" >&nbsp;Girls
								<br/>

								<select name="hostel">
									<option value="null">Please select any one</option>
								<?php 
								while ($a=mysqli_fetch_array($result)) {
							
								echo "<option value='".$a['hostel_id']."'>".$a['name']."</option>";		
								}
								?>
					
				</select>

			

							<input type="submit" name="submit" Value="Search" id="search" class="btn btn-primary">	
						</div>
						<br/>
						<div class="panel panel-default">
							<div class="panel-heading">All Hostel Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Hid</th>
										<th>Hostel Name</th>
										<th>Hostel type</th>
										<th>seats</th>
										<th>city</th>
										<th>email</th>
										<th>Is Boys?</th>
										<th>Fee</th>
										</tr>
									</thead>
									<tbody>
<?php	

if(isset($_POST['submit']))
{
//echo "<script type='text/javascript'>alert('hello');</script>";

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

$query="select * from hostel where ";		
$whereCond ="";
$or=0;
$select=0;
$male=0;
$female=0;
$gov=0;
$pri=0;
if(isset($_POST['chkgov']))
{
	$select=1;
	$gov=1;
	if($or == 0)
	{
		$or=1;
		$whereCond .= " hostel_type='Government' ";
	}
	else
	{
		$whereCond .= " and hostel_type='Government' ";
	}
}
if(isset($_POST['chkpri']))
{$select=1;
	$pri=1;
	if($or == 0)
	{
		$or=1;
		$whereCond .= " hostel_type='Private' ";
	}
	else
	{
		$whereCond .= " and hostel_type='Private' ";
	}
}
if(isset($_POST['chkmale']))
{$select=1;
	$male=1;
	if($or == 0)
	{
		$or=1;
		$whereCond .= " boys=1 ";
	}
	else
	{
		$whereCond .= " and boys=1 ";
	}
}
if(isset($_POST['chkfemale']))
{$select=1;
	$female=1;
	if($or == 0)
	{
		$or=1;
		$whereCond .= " boys=0 ";
	}
	else
	{
		$whereCond .= " and boys=0 ";
	}
}

$hostel=$_POST['hostel'];

if ($hostel=="null") {
	
	if($select==0)
	$query="select * from hostel";
elseif ($male==1 && $female==1 && $gov==1 && $pri==1) {
	$query="select * from hostel";
}
elseif ($gov==1 && $male==1 && $female==1) {
	$query="select * from hostel where hostel_type='Government'";
}
elseif ($pri==1 && $male==1 && $female==1) {
	$query="select * from hostel where hostel_type='Private'";
}
elseif ($male==1 && $female==1) {
	$query="select * from hostel";
}
else
	$query=$query.$whereCond;
}

else
{
	$select=1;
	if($or == 0)
	{
		$or=1;
		$whereCond .= " hostel_id=".$hostel." ";
	}
	else
	{
		$whereCond .= " and hostel_id=".$hostel." ";
	}	
	$query=$query.$whereCond;
}


echo "<script type='text/javascript'>alert('$query');</script>";
$result=mysqli_query($conn, $query);
		
while($a=mysqli_fetch_array($result,MYSQLI_BOTH))
{	  

	if($a[6]==0)
		$gen="Girls";
	else
		$gen="Boys";

	?>
		
			<tr><td><?php echo $a[0] ?></td>
				<td><?php echo $a[1] ?></td>
				<td><?php echo $a[2] ?></td>
				<td><?php echo $a[3] ?></td>
				<td><?php echo $a[4] ?></td>
				<td><?php echo $a[5] ?></td>
				<td><?php echo $gen ?></td>
				<td><?php echo $a[7] ?></td>
				</tr>
			<?php  } ?>
									
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>
<?php  } ?>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</form>
</body>

</html>
