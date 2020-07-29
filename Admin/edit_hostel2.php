<?php
include("config.php");
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM category";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

    switch ($row['category']) {
        case 'open':
                $openSeats = $row['seat_percentage'];
            break;

        case 'sc':
                $scSeats = $row['seat_percentage'];
            break;

        case 'st':
                $stSeats = $row['seat_percentage'];
            break;

        case 'obc':
                $obcSeats = $row['seat_percentage'];
            break;

        case 'ds':
                $DSSeats = $row['seat_percentage'];
            break;
        
        default:
            
            break;
    }
}



mysqli_close($con);
?>




<?php
session_start();

if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}

	
if(isset($_POST['submit']))
{

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

$fee=$_POST['fee'];
$open=intval($_POST['open']);
$obc=intval($_POST['obc']);
$sc=intval($_POST['sc']);
$st=intval($_POST['st']);
$ds=intval($_POST['ds']);
$aid=$_POST['aid'];

$mode=$_POST['seatAllocation'];
$allocation_type=0;
if (!strcmp($mode,"Automatic"))
{
$seats=$_POST['total_Seat'];
$allocation_type=1;
}
else
$seats=$open+$obc+$sc+$st+$ds;

$result3=mysqli_query($conn,"select max(hostel_id)+1 from hostel");
$r=mysqli_fetch_array($result3,MYSQLI_BOTH);

$r[0]=$r[0]+1;

$dataTime = date("Y-m-d H:i:s");
$year1=date("Y");

	$h_id=$_GET['Hid'];

	$z="UPDATE `hostel` SET `seats`='$seats',`id`='$aid',`fees`='$fee' where hostel_id=".$h_id;

	$a="UPDATE `seat` SET `1_vacant`=$open,`2_vacant`=$obc,`3_vacant`=$sc,`4_vacant`=$st,`5_vacant`=$ds where hostel_id=".$h_id;

//$x="insert into  hostel(hostel_id,name,hostel_type,seats,city,email,boys,id,password,fees,allocation_type,created_date,year) values(".$r[0].",'".$name."','".$type."','".$seats."','".$city."','".$email."','".$Gendertype."','".$aid."','".$password."','".$fee."',".$allocation_type.",'".$dataTime."',".$year1.")";
$result=mysqli_query($conn,$z);

$result2=mysqli_query($conn,"select max(hostel_id) from hostel");
$q=mysqli_fetch_array($result2,MYSQLI_BOTH);

//$y="insert into seat(hostel_id,`1`,1_vacant,`1temp`,2`,2_vacant,`2temp`,`3`,3_vacant,`3temp`,`4`,4_vacant,`4temp`,`5`,`5_vacant`,`1temp`) values(".$q[0].",".$open.",".$open.",".$open.",".$obc.",".$obc.",".$obc.",".$st.",".$st.",".$st.",".$sc.",".$sc.",".$sc.",".$ds.",".$ds.",".$ds.",)";
//echo $y;
$result1=mysqli_query($conn,$a);


if($result==1 && $result1==1)
		{
			echo"<script>alert('Hostel Edited Succssfully')</script>";
		}
		
		else
		{
			echo "<script>alert('something went wrong!!')</script>";
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script language="JavaScript">
$(document).ready(function()
{
	$(".field").change(function()
	{
		var $totalSeats=document.getElementById('total_Seat').value;
	
		var $openSeats="<?php echo $openSeats;?>";
		var $obcSeats="<?php echo $obcSeats;?>";
		var $stSeats="<?php echo $stSeats;?>";
		var $scSeats="<?php echo $scSeats;?>";
		var $DSSeats="<?php echo $DSSeats;?>";

		
   		var $openSeats_1 = Math.floor($totalSeats * $openSeats/100);
		var $obcSeats_1 = Math.floor($totalSeats * $obcSeats/100);
		var $stSeats_1 = Math.floor($totalSeats * $stSeats/100);
    	var $scSeats_1 = Math.floor($totalSeats * $scSeats/100);
    	var $dsSeats_1 = Math.floor($totalSeats * $DSSeats/100);

    	var $diff=0;
    	var $calulatedTotal = $openSeats_1 + $obcSeats_1 +  $stSeats_1 + $scSeats_1 + $dsSeats_1;
		if($calulatedTotal<$totalSeats)
		{
	    	
	    	$diff = $totalSeats-$calulatedTotal;
	    	switch ($diff) 
	    	{
	    		case 1 :
	    					$openSeats_1=$openSeats_1 + 1;
	    					break;
	        	case 2 :
			        		$openSeats_1=$openSeats_1 + 1;
			                $obcSeats_1 =$obcSeats_1 + 1;
	            	break;
	        	case 3 :
	        				 $openSeats_1=$openSeats_1 + 1;
			                 $obcSeats_1 =$obcSeats_1 + 1;
			                 $stSeats_1=$stSeats_1 + 1;
	            	break;
	        	case 4:
				             $obcSeats_1 =$obcSeats_1 + 1;
			    	         $stSeats_1=$stSeats_1 + 1;
			        	     $scSeats_1=$scSeats_1 + 1;
	        	    break;
	        	default: 
	    	        break;
	    	}
		}

	  	document.getElementById('open').value = $openSeats_1;
	  	document.getElementById('obc').value = $obcSeats_1;
	  	document.getElementById('st').value = $stSeats_1;
	  	document.getElementById('sc').value = $scSeats_1;
	  	document.getElementById('ds').value = $dsSeats_1;

	  	var $calulatedTotal2 = $openSeats_1 + $obcSeats_1 +  $stSeats_1 + $scSeats_1 + $dsSeats_1;

	  	document.getElementById('total2').value = $calulatedTotal2;

	  	if (parseInt($totalSeats)==parseInt($calulatedTotal2))
	  	{
	  		document.getElementById('match').value="Total and Calculated Seats Match";
	  		$(document.getElementById('match')).css("color", "green");
	  		document.getElementById('add').disabled = false;
	  	}
	  	else
	  	{
	  		document.getElementById('match').value="Total and Calculated Seats Not Match";
	  		$(document.getElementById('match')).css("color", "#ff0000");
	  		document.getElementById('add').disabled=true;
	  	}
    });
});

$(document).ready(function()
{
	$(".field2").change(function()
	{
		var $totalSeats=document.getElementById('total_Seat').value;

   		var $openSeats_1 = document.getElementById('open').value;
		var $obcSeats_1 = document.getElementById('obc').value;
		var $stSeats_1 = document.getElementById('st').value;
    	var $scSeats_1 = document.getElementById('sc').value;
    	var $dsSeats_1 = document.getElementById('ds').value;

	  	var $calulatedTotal2 = parseInt($openSeats_1) + parseInt($obcSeats_1) + parseInt($stSeats_1) + parseInt($scSeats_1) + parseInt($dsSeats_1);

		
	  	document.getElementById('total2').value = $calulatedTotal2;

	  	if (parseInt($totalSeats)==parseInt($calulatedTotal2))
	  	{
	  		document.getElementById('match').value="Total and Calculated Seats Match";
	  		$(document.getElementById('match')).css("color", "green");
	  			document.getElementById('add').disabled = false;
	  	}
	  	else
	  	{
	  		document.getElementById('match').value="Total and Calculated Seats Not Match";
	  		$(document.getElementById('match')).css("color", "#ff0000");
	  		document.getElementById('add').disabled = true;
	  	}

    });
});
</script>
</head>

<body>
	<?php //include('includes/header.php');?>
	<div class="ts-main-content">
		<?php //include('includes/sidebar.php');?>
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
				<form method="post" action="" name="registration" class="form-horizontal" >
		


		<?php
		$con=mysqli_connect('localhost','root','') or die("can't connect");
$db=mysqli_select_db($con,'hostel_managment') or die("cannot connect database");
				if(isset($_GET['Hid']))
				{
					$h_id=$_GET['Hid'];

					//"select * from hostel where hostel_id=".$h_id
					//
$q="SELECT * FROM hostel INNER JOIN seat ON hostel.hostel_id=seat.hostel_id WHERE hostel.hostel_id=".$h_id;
					$res=mysqli_query($con,$q);
					$ans=mysqli_fetch_array($res);

					$type=$ans['hostel_type'];
					echo $type;
					$gen=$ans['boys'];
				}

					?>									

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name:</label>
<div class="col-sm-8">
<input type="text" name="name" id="fname"  class="form-control" required="required" value="<?php echo $ans['name']?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Type:</label>
<div class="col-sm-8">
<input type="radio" name="type"  value="Government" <?php if($type="Government") echo"checked"; else echo"disabled" ?> >&nbsp;&nbsp;Government&nbsp;&nbsp;
<input type="radio" name="type"  value="Private" <?php if($type=="Private") echo"checked"; else echo"disabled"?> disabled>&nbsp;&nbsp;Private <br/>
<input type="radio" name="Gendertype"  value="1" <?php if($gen==1) echo"checked";  else echo"disabled"?>>&nbsp;&nbsp;Boys&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="Gendertype"  value="0" <?php if($gen==0) echo"checked";  else echo"disabled"?>>&nbsp;&nbsp;Girls
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel City:</label>
<div class="col-sm-8">
<input type="text" name="city" id="fname"  class="form-control" required="required" value="<?php echo $ans['city']?>" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">fees:</label>
<div class="col-sm-8">
<input type="text" name="fee" id="lname"  class="form-control" required="required" value="<?php echo $ans['fees']?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Total number of Seats :</label>
<div class="col-sm-8">
<input type="Number" name="total_Seat" id="total_Seat"  class="form-control field" required="required" value="<?php echo $ans['seats']?>" min="<?php echo $ans['seats']?>">
</div>
</div>
<div class="" id="seatsOpen">
<label class="col-sm-2 control-label">Seats of Open :</label>
<div class="col-sm-1">
<input type="Number" name="open" id="open" class="form-control field2" required="required" value="<?php echo $ans['1_vacant']?>" min="<?php echo $ans['1_vacant']?>" style="width: 137%;">
</div>
</div>


<div class="" id="seatsOBC">
<label class="col-sm-2 control-label">Seats of OBC :</label>
<div class="col-sm-1">
<input type="Number" name="obc" value="<?php echo $ans['2_vacant']?>" id="obc"  style="width: 137%;" class="col-sm-4  form-control field2" required="required" min="<?php echo $ans['2_vacant']?>">
</div>
</div>

<div class="" id="seatsST">
<label class="col-sm-2 control-label">Seats of ST :</label>
<div class="col-sm-1">
<input type="Number" name="st" value="<?php echo $ans['3_vacant']?>"  id="st"  class="form-control field2" required="required" min="<?php echo $ans['3_vacant']?>" style="width: 137%;">
</div> 
</div>

<div class="form-group" id="seatsSC">
<label class="col-sm-2 control-label">Seats of SC :</label>
<div class="col-sm-1">
<input type="Number" name="sc" value="<?php echo $ans['4_vacant']?>" id="sc"  class="form-control field2" required="required" min="<?php echo $ans['4_vacant']?>" style="width: 137%;">
</div>
</div>



<div class="" id="seatsDS">
<label class="col-sm-2 control-label">Seats of DS :</label>
<div class="col-sm-1">
<input type="Number" name="ds" value="<?php echo $ans['5_vacant']?>"   id="ds"  class="form-control field2" required="required" min="<?php echo $ans['5_vacant']?>" style="width: 137%;">
</div>
</div>

<div class="form-group" id="seatsCalTotala">
<label class="col-sm-2 control-label"><B>Calculated Total:</B></label>
<div class="col-sm-1">
<input type="Number" name="total2" value=""   id="total2"  class="form-control field2" required="required" disabled style="width: 137%;">
</div>
</div>


<div class="form-group" id="seatsMatch">
<label class="col-sm-2 control-label"></label>
<div class="col-sm-8">
<input type="text" name="match" value=""   id="match"  class="form-control field2" required="required"  disabled>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Hostel Email: </label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control" required="required" value="<?php echo $ans['email']?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label"> User id :</label>
<div class="col-sm-8">
<input type="text" name="aid" id="lname"  class="form-control" required="required" value="<?php echo $ans['id']?>">
</div>
</div>


</div>
<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Edit" id="add" class="btn btn-primary" >
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



<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

</body>
</html>
