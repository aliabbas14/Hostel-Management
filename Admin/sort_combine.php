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
												
												<div class="form-group">
<label class="col-sm-2 control-label">Select Criteria:</label>
<div class="col-sm-8">
<select name="criteria">
  <option value="0">Please Select</option>
  <option value="1">Merit</option>
  <option value="2">Distance</option>
  <option value="3">Both Merit and Distance</option>
</select>
</div>
<div>
<label class="col-sm-2 control-label">Select Criteria:</label>
<div class="col-sm-8">
<input type="Number" name="txt_merit" >&nbsp;
<label class="col-sm-2 control-label">Select Criteria:</label>
<input type="Number" name="txt_distance" >
</div>
</div>


</div>

<div class="col-sm-8">
<input type="submit" name="temp_sort" value="View" class="btn btn-default">&nbsp;&nbsp;
		<input type="submit" name="sort" value="Allocate Seat" class="btn btn-default">
</div>



	</form>
<?php

	
	if(isset($_POST['sort']))
	{
		UpdateData('apply');		
	}
	if(isset($_POST['temp_sort']))
	{
	//	echo "<script type='text/javascript'>alert('view');</script>";
		UpdateData('view');		
	}

function UpdateData($actionPerformed)
{
	$criteria = $_POST['criteria'];

	$x1=0;
	$x2=0;
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hostel_managment");
	$i=0;
	$values[]="";
$limit_merit=0;
$limit_distance=0;
	$counter=0;
$result=mysqli_query($conn,"select * from category");
		
		while($a=mysqli_fetch_array($result))
		{	
		/*	if(strcmp($actionPerformed, "apply"))
			{
				$values[$i]=$a['category_id'];
			}
		else
			{
				$values[$i]=$a['category_id']."temp";
			}
			$i++;*/

		$values[$i]=$a['category_id'];
		$i++;
		}  
if($criteria ==3 )
{
$year2=date("Y");
$merit_per=50;
				$distance_per=50;
				
				$result_merit=mysqli_query($conn,"select count(*) as Total from student where  alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year2." order by merit_rank desc");
		
		while($a_merit=mysqli_fetch_array($result_merit))
		{	
		
		$merit_total=$a_merit['Total'];
		
		}
		
		$result_distance=mysqli_query($conn,"select count(*) as Total from student where  alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year2." order by merit_rank desc");
		
		while($a_distance=mysqli_fetch_array($result_distance))
		{	
		
		$distance_total=$a_distance['Total'];
		
		}
		$limit_merit= round(($merit_total*$merit_per)/100);
		$limit_distance=round(($distance_total*$distance_per)/100);
		
}

	for($j=0;$j<sizeof($values);$j++)
	{
		$year1=date("Y");
		
		switch ($criteria) {
			case 1:
				$x3="select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year1." order by merit_rank desc,distance desc";
				break;

			case 2:
				$x3="select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year1." order by distance desc,merit_rank desc";
				break;
			case 3:
				
		
	//	echo "<script type='text/javascript'>alert('$limit_distance');</script>";
//		echo "<script type='text/javascript'>alert('$limit_merit');</script>";
			//	$x3="(select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 order by merit_rank desc limit 2 ) union (select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 order by distance desc limit 2)"
			
			$x3="(select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year1." order by merit_rank desc,distance desc limit ".$limit_merit." ) union (select * from student where category_id=".$values[$j]." and alloted=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = ".$year1." order by distance desc,merit_rank desc limit ".$limit_distance.")";
			
				break;
			
			default:
				
				break;
		}
		
 // echo "<script type='text/javascript'>alert('$x3	');</script>";
		$result=mysqli_query($conn,$x3);
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
					
					if(!strcmp($actionPerformed, "apply"))
					{
						//echo "Student:".$stu."choice:".$h_id."</br>";
						$y="select seat_id,`1`,`2`,`3`,`4`,`5` from seat where hostel_id=".$h_id;	
					}
					else
					{
						//echo "Student:".$stu."choice:".$h_id."</br>";
						$y="select seat_id,`1temp`,`2temp`,`3temp`,`4temp`,`5temp` from seat where hostel_id=".$h_id;		
					}
					

					$result2=mysqli_query($conn,$y);
					//echo $y;
					while($h=mysqli_fetch_array($result2))
					{
						if(!strcmp($actionPerformed, "apply"))
						{
							//echo "seats in hostel".$h[$values[$j]]."</br>";
							if($h[$values[$j]]>0)
							{
								//echo $h[$values[$j]];
								$dataTime = date("Y-m-d H:i:s");
								$counter=1;

								
								$result3=mysqli_query($conn,"insert into allot(hostel_id,stu_id,category_id )values('".$h_id."','".$stu."',".$values[$j].")");
								$result4=mysqli_query($conn,"update status_report set alloted=1 , alloted_time='".$dataTime."' 	 where stu_id=".$stu);

								$result6=mysqli_query($conn,"update student set alloted=1,alloted_temp=1 where stu_id=".$stu);
									$temp=$h[$values[$j]];
									$temp=$temp-1;
													
								$l="update seat set `".$values[$j]."` = ".$temp.",`".$values[$j]."temp` = ".$temp." where hostel_id=".$h_id;
								
								
								$result5=mysqli_query($conn,$l);
								$x1=1;
								break;
							}
						}
						else
						{
							//echo "<script type='text/javascript'>alert('yes');</script>";
							if($h[$values[$j]."temp"]>0)
							{
								//echo $h[$values[$j]];
							//	$qq=$h[$values[$j]."temp"];
							//	echo "<script type='text/javascript'>alert('$qq');</script>";
								$dataTime = date("Y-m-d H:i:s");
								$counter=1;

								$result6=mysqli_query($conn,"update student set alloted_temp=1,hostelid_temp=".$h_id." where stu_id=".$stu);

									$temp=$h[$values[$j]];
									$temp=$temp-1;
													
								$l="update seat set `".$values[$j]."temp` = ".$temp." where hostel_id=".$h_id;

								$result5=mysqli_query($conn,$l);

								
								
								$x2=1;
								//break;
							}
						}				

					}
					
					
					
					
					/*	if($counter==1)
							break; */
				}
				
				if($counter==1)
				{
					$counter=0;
							break;
							}
				
			}
			
		}
	}
	
	
	if($x1 == 1)
			echo "<script>alert('Seat has been allocated')</script>";
	
	if($x2 == 1)
	{
	   $criteria1 = $_POST['criteria'];
	   
	   switch ($criteria1) {
	   
	   case 1:
				$sqlView="select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance,hostel.name  as alloted_hostel from student inner join category on student.category_id = category.category_id join hostel on hostel.hostel_id =student.hostelid_temp where alloted_temp=1 ORDER BY alloted_hostel, category, merit_rank DESC " ;
				break;

			case 2:
				$sqlView="select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance,hostel.name  as alloted_hostel from student inner join category on student.category_id = category.category_id join hostel on hostel.hostel_id =student.hostelid_temp where alloted_temp=1 ORDER BY alloted_hostel, category, distance DESC " ;
				break;
			case 3:
				$sqlView="(select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance,hostel.name  as alloted_hostel from student inner join category on student.category_id = category.category_id join hostel on hostel.hostel_id =student.hostelid_temp where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by merit_rank desc,distance desc limit ".$limit_merit." ) union (select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance,hostel.name  as alloted_hostel from student inner join category on student.category_id = category.category_id join hostel on hostel.hostel_id =student.hostelid_temp where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by distance desc,merit_rank desc limit ".$limit_distance." )";
				
				//echo "<script>alert('$sqlView')</script>";
				//(select * from student where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by merit_rank desc,distance desc limit 3 ) union (select * from student where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by distance desc,merit_rank desc limit 3 )
				break;
			
			default:
				
				break;
		
		}
	   
		
								$resultView = mysqli_query($conn,$sqlView);
						
								echo "<div><table border=5 width=100%>
								<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Gender</th>
								<th>City</th>
								<th>Category</th>
								<th>Merit</th>
								<th>Distance</th>
								<th>Alloted Hostel</th>
								</tr>";
								while($rowView = mysqli_fetch_array($resultView)) 
								{
									echo "<tr>
											<td>".$rowView['s_id']."</td>
											<td>".$rowView['s_name']."</td>
											<td>".$rowView['gender']."</td>
											<td>".$rowView['s_city']."</td>
											<td>".$rowView['category']."</td>
											<td>".$rowView['merit_rank']."</td>
											<td>".$rowView['distance']."</td>
											<td>".$rowView['alloted_hostel']."</td>
										</tr>";
								}
								echo "</table></div></br>";
								
								
								
								switch ($criteria1) {			
				
				
					case 1:
				$sqlView="select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance from student inner join category on student.category_id = category.category_id  where alloted_temp=0 ORDER BY  category, merit_rank DESC " ;
				break;

			case 2:
				$sqlView="select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance from student inner join category on student.category_id = category.category_id where alloted_temp=0 ORDER BY category, distance DESC " ;
				break;
			case 3:
				$sqlView="(select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance from student inner join category on student.category_id = category.category_id  where alloted_temp=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by merit_rank desc,distance desc limit ".$limit_merit." ) union (select student.stu_id as s_id,student.name as s_name,gender ,student.city as s_city, category,merit_rank,distance from student inner join category on student.category_id = category.category_id  where alloted_temp=0 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by distance desc,merit_rank desc limit ".$limit_distance." )";
				
				//echo "<script>alert('$sqlView')</script>";
				//(select * from student where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by merit_rank desc,distance desc limit 3 ) union (select * from student where alloted_temp=1 and confirmed=0 and RIGHT(YEAR(datetime),4) = 2018 order by distance desc,merit_rank desc limit 3 )
				break;
			
			default:
				
				break;
		}
	   
	//	echo "<script type='text/javascript'>alert('$sqlView');</script>";
								$resultView = mysqli_query($conn,$sqlView);
						
								echo "<div><table border=5 width=100%>
								<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Gender</th>
								<th>City</th>
								<th>Category</th>
								<th>Merit</th>
								<th>Distance</th>
								
								</tr>";
								while($rowView = mysqli_fetch_array($resultView)) 
								{
									echo "<tr>
											<td>".$rowView['s_id']."</td>
											<td>".$rowView['s_name']."</td>
											<td>".$rowView['gender']."</td>
											<td>".$rowView['s_city']."</td>
											<td>".$rowView['category']."</td>
											<td>".$rowView['merit_rank']."</td>
											<td>".$rowView['distance']."</td>
											
										</tr>";
								}
								echo "</table></div>";
								
								
								
								
								
								$result7=mysqli_query($conn,"update student set alloted_temp=0,hostelid_temp=0 ");


							$result9=mysqli_query($conn,"UPDATE seat SET 1temp=seat.1,2temp=seat.2,3temp=seat.3,4temp=seat.4,5temp=seat.5");
								
								echo "<script>alert('Tempory Seat has been allocated as shown below!!')</script>";

								
	}
	
		

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

