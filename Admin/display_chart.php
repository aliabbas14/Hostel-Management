<?php
session_start();

if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}
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
<?php
	 include("config.php");
	 
	 
	 $res = mysqli_query($con,"select * from category");
	 while($row=mysqli_fetch_array($res))
	 {
		switch ($row['category']) 
		{

			case 'open':
				$open = $row['seat_percentage'];
			break;

			case 'obc':
	 			$obc= $row['seat_percentage'];
	 		break;

			case 'st':
		 		$st= $row['seat_percentage'];
	 		break;

	 		case 'sc':
	 			$sc= $row['seat_percentage'];
	 		break;

	 		case 'ds':
	 			$ds= $row['seat_percentage'];
	 		break;

			default:
				# code...
			break;
      	}
	 }

		$dataPoints = array(
		array("label"=> "OPEN", "y"=> $open),
		array("label"=> "OBC", "y"=> $obc),
		array("label"=> "SC", "y"=> $sc),
		array("label"=> "ST", "y"=> $st),
		array("label"=> "DS", "y"=> $ds),
		
	);
		
	
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
	<title>Display Student</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script>
	window.onload = function () {
	 
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		exportEnabled: true,
		title:{
			text: "Category wise Seats"
		},
		subtitles: [{
			text: "status chart"
		}],
		data: [{
			type: "pie",
			showInLegend: "true",
			legendText: "{label}",
			indexLabelFontSize: 16,
			indexLabel: "{label} - #percent%",
			yValueFormatString: "#,##0",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();
	 
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
						<h2 class="page-title">Chart</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Category wise</div>
							<div class="panel-body">
								<div id="chartContainer" style="height: 370px; width: 100%; margin:10% auto""></div>
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
	<script src="js/canvasjs.min.js"></script>
</body>

</html>
