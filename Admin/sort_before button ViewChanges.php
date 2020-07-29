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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Seat Allocation</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Information</div>
									<div class="panel-body">


												<form method="post" >
		<select>
  <option value="0">Please Select</option>
  <option value="1">Merit</option>
  <option value="2">Distance</option>
  <option value="3">Both Merit and Distance</option>
</select><br><br>

<input type="submit" name="temp_sort" value="View" class="btn btn-default">
		<input type="submit" name="sort" value="Allocate Seat" class="btn btn-default">
	</form>
<?php
$x1=0;
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"hostel_managment");
	$i=0;
	$values[]="";
	if(isset($_POST['sort']))
	{
		$counter=0;

		$result=mysqli_query($conn,"select * from category");
		while($a=mysqli_fetch_array($result))
		{	
			$values[$i]=$a['category_id'];
			$i++;
		}

	for($j=0;$j<sizeof($values);$j++)
	{
		$year1=date("Y");
		$x="select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year1." order by merit_rank desc";
		$result=mysqli_query($conn,$x);
		//echo "category:".$values[$j]."</br>";
		while($a=mysqli_fetch_array($result))
		{
			$choice=$a['choice'];
			$arr=explode(",",$choice);
			$stu=$a['stu_id'];
			//echo $stu;
			$counter=0;
			for($x=0;$x<sizeof($arr);$x++)
			{
				
				$y="select * from hostel where name='".$arr[$x]."'";
				$result1=mysqli_query($conn,$y);
				while($k=mysqli_fetch_array($result1))
				{
					$h_id=$k['hostel_id'];
					//echo "Student:".$stu."choice:".$h_id."</br>";
					$y="select seat_id,`1`,`2`,`3`,`4`,`5` from seat where hostel_id=".$h_id;

					$result2=mysqli_query($conn,$y);
					//echo $y;
					while($h=mysqli_fetch_array($result2))
					{
						//echo "seats in hostel".$h[$values[$j]]."</br>";
						if($h[$values[$j]]>0)
						{
							//echo $h[$values[$j]];
							$dataTime = date("Y-m-d H:i:s");
							$counter=1;
							$result3=mysqli_query($conn,"insert into allot(hostel_id,stu_id,category_id )values('".$h_id."','".$stu."',".$values[$j].")");
							$result4=mysqli_query($conn,"update status_report set alloted=1 , alloted_time='".$dataTime."' 	 where stu_id=".$stu);

							$result6=mysqli_query($conn,"update student set alloted=1 where stu_id=".$stu);
								$temp=$h[$values[$j]];
								$temp=$temp-1;
												//echo "hellllllllllllllo " .$temp;
							$l="update seat set `".$values[$j]."` = ".$temp." where hostel_id=".$h_id;
							//echo $l;
							$result5=mysqli_query($conn,$l);
							$x1=1;

							
							/*$result4=mysqli_query($conn,"select * from alloted_seat where hostel_id=".$h_id);
							

							$result5=mysqli_query($conn,"update alloted_seat set ".$values[$j]." = ".$values[$j]+1." where hostel_id=".$h_id;*/
							break;
						}
						if($counter==1)
						{
							//echo "break";
							break;
						}

					}
						if($counter==1)
							break;
				}
				if($counter==1)
							break;
				}
			}

		
		}
	}
	

if($x1==1)
	echo "<script>alert('Seat has been allocated')</script>";

	
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

