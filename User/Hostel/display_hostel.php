<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}

//include('includes/config.php');
/*include('includes/checklogin.php');
check_login();
*/
if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from rooms where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
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
	<title>Display Hostel</title>
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
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Display Hostel</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Hostel Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Hid</th>
										<th>Hostel Name</th>
										<th>seats</th>
										<th>city</th>
										<th>email</th>
										<th>Is Boys?</th>
										<th>Edit</th>
										<th>Delete</th>
											
										</tr>
									</thead>
									<tbody>
<?php	

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

$result=mysqli_query($conn,"select * from hostel");
		


while($a=mysqli_fetch_array($result,MYSQLI_BOTH))
			{	  	?>
		

			<tr><td><?php echo $a[0] ?></td>
				<td><?php echo $a[1] ?></td>
				<td><?php echo $a[2] ?></td>
				<td><?php echo $a[3] ?></td>
				<td><?php echo $a[4] ?></td>
				<td><?php echo $a[5] ?></td>
				<!--<td><a href="edit_hostel.php?Hid=<?php// echo $a[0]; ?>" >edit</a></td>-->
				<td><a href="edit_hostel.php?Hid=<?php echo $a[0]; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;</td>
				<td><a href="delete_hostel.php?Hid=<?php echo $a[0];?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
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

</body>

</html>
