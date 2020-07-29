<?php
//session_start();

session_start();
if(!isset($_SESSION['admin']))
{
	header('location:admin_login.php');
}

	
if(isset($_POST['submit']))
{
//echo "<script type='text/javascript'>alert(document.getElementById('').innerHTML);</script>";


//echo $xx;
//echo "<script type='text/javascript'>alert('$xx');";
$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

$name=$_POST['name'];
$type=$_POST['type'];
$city=$_POST['city'];
$email=$_POST['email'];
$b=$_POST['b'];
$fee=$_POST['fee'];
$aid=$_POST['aid'];
$password=$_POST['password'];
$open=intval($_POST['open']);
$obc=intval($_POST['obc']);
$sc=intval($_POST['sc']);
$st=intval($_POST['st']);
$ds=intval($_POST['ds']);
$mode=$_POST['seatAllocation'];
$allocation_type=0;
if (!strcmp($mode,"Automatic"))
{
$seats=$_POST['total_Seat'];
$open=$_SESSION['openSeats_1'];
$obc=$_SESSION['obcSeats_1'];
$sc=$_SESSION['scSeats_1'];
$st=$_SESSION['stSeats_1'];
$ds=$_SESSION['DSSeats_1'];

$allocation_type=1;
}
else
$seats=$open+$obc+$sc+$st+$ds;

$result3=mysqli_query($conn,"select max(hostel_id)+1 from hostel");
$r=mysqli_fetch_array($result3,MYSQLI_BOTH);
//print_r($r);
$r[0]=$r[0]+1;
//print_r($r);
$dataTime = date("Y-m-d H:i:s");
$year1=date("Y");
$x="insert into  hostel(hostel_id,name,hostel_type,seats,city,email,boys,id,password,fees,allocation_type,created_date,year) values(".$r[0].",'".$name."','".$type."','".$seats."','".$city."','".$email."','".$b."','".$aid."','".$password."','".$fee."',".$allocation_type.",'".$dataTime."',".$year1.")";
echo $x;
$result=mysqli_query($conn,$x);
//echo "hello".$result;
$result2=mysqli_query($conn,"select max(hostel_id) from hostel");
$q=mysqli_fetch_array($result2,MYSQLI_BOTH);
//print_r($q);
 //$q[0]=$q[0]+1;
 //print_r($q);
$y="insert into seat(hostel_id,`1`,1_vacant,`2`,2_vacant,`3`,3_vacant,`4`,4_vacant,`5`,`5_vacant`) values(".$q[0].",".$open.",".$open.",".$obc.",".$obc.",".$sc.",".$sc.",".$st.",".$st.",".$ds.",".$ds.")";
//echo $y;
$result1=mysqli_query($conn,$y);
//for ($x = 1; $x <= 5; $x++) {

//$y="INSERT INTO `seat_allocation` (`hostel_id`, `category_id`, `no_of_seat`, `vacant_seat`) VALUES 
//(".$q[0].", "", "", "")";

//} 





if($result==1 && $result1==1)
		{
			echo"<script>alert('Hostel Succssfully register')</script>";
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

function handleClick(seatAllocation) 
{
	if(seatAllocation.value=="Automatic")
	{
		document.getElementById("totalSeats").style.display="block";
		document.getElementById("seatsOpen").style.display="none";
		document.getElementById("seatsOBC").style.display="none";
		document.getElementById("seatsSC").style.display="none";
		document.getElementById("seatsST").style.display="none";
		document.getElementById("seatsDS").style.display="none";
		document.getElementById("txtCalculatedSeats").innerHTML="";
		document.getElementById("open").value="";
		document.getElementById("obc").value="";
		document.getElementById("sc").value="";
		document.getElementById("st").value="";
		document.getElementById("total_Seat").value="";
		document.getElementById("ds").value="";
	}
	else
	{
		document.getElementById("totalSeats").style.display="none";
		document.getElementById("seatsOpen").style.display="block";
		document.getElementById("seatsOBC").style.display="block";
		document.getElementById("seatsSC").style.display="block";
		document.getElementById("seatsST").style.display="block";
		document.getElementById("seatsDS").style.display="block";
		document.getElementById("txtCalculatedSeats").innerHTML="";
		document.getElementById("open").value="";
		document.getElementById("obc").value="";
		document.getElementById("sc").value="";
		document.getElementById("st").value="";
		document.getElementById("total_Seat").value="";
		document.getElementById("ds").value="";
	}
}

function calc_auto_seats() {
	 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtCalculatedSeats").innerHTML = this.responseText;
            }
        };
        //alert('hello');
        xmlhttp.open("GET","seatCalculator.php?q="+document.getElementById("total_Seat").value,true);
        xmlhttp.send();
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
											
										

<!--<div class="form-group">
<label class="col-sm-2 control-label">Hostel Id</label>
<div class="col-sm-8">
<input type="text" name="id" id="regno"  class="form-control" required="required" >
</div>
</div>-->


<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name</label>
<div class="col-sm-8">
<input type="text" name="name" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Type</label>
<div class="col-sm-8">
<input type="radio" name="type"  value="Government" >&nbsp;&nbsp;Government&nbsp;&nbsp;
<input type="radio" name="type"  value="Private" >&nbsp;&nbsp;Private
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
<label class="col-sm-2 control-label">fees</label>
<div class="col-sm-8">
<input type="text" name="fee" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group" >
<label class="col-sm-2 control-label">Mode</label>
<div class="col-sm-8">
<input type="radio" name="seatAllocation" value="Automatic" class="form-control1" onclick="handleClick(this);"> Automatic
<input type="radio" name="seatAllocation" value="Custom" class="form-control1" onclick="handleClick(this);"> Custom
</div>
</div>



<div class="form-group" style="display: none;" id="totalSeats">
<label class="col-sm-2 control-label">Total number of Seats : </label>
<div class="col-sm-8">
<input type="Number" name="total_Seat" id="total_Seat"  class="form-control"><br/>
<input type="button" name="Calculate" Value="Calculate" class="btn btn-primary" formnovalidate onclick="calc_auto_seats()">
<br/>
<div id="txtCalculatedSeats"></div>
</div>
</div>


<div class="form-group" style="display: none;" id="seatsOpen">
<label class="col-sm-2 control-label">Number Of seats for Open</label>
<div class="col-sm-8">
<input type="text" name="open" id="open"  class="form-control">
</div>
</div>




<div class="form-group" style="display: none;" id="seatsOBC">
<label class="col-sm-2 control-label">Number Of seats for OBC</label>
<div class="col-sm-8">
<input type="text" name="obc" id="obc"  class="form-control" >
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
<div class="form-group" style="display: none;" id="seatsSC">
<label class="col-sm-2 control-label">Number Of Seats for SC</label>
<div class="col-sm-8">
<input type="text" name="sc" id="sc"  class="form-control">
</div>
</div>

<div class="form-group" style="display: none;" id="seatsST">
<label class="col-sm-2 control-label">Number Of Seats for ST</label>
<div class="col-sm-8">
<input type="text" name="st" id="st"  class="form-control">
</div>
</div>

<div class="form-group" style="display: none;" id="seatsDS">
<label class="col-sm-2 control-label">Number Of Seats for DS</label>
<div class="col-sm-8">
<input type="text" name="ds" id="ds"  class="form-control
">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Email </label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label"> User id</label>
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