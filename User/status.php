<?php
	include_once 'header2.php';

	//session_start();
	$a=$_SESSION['login'];
 	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hostel_managment");

	$a="select * from student where email='".$a."'";
	//echo $a;

	$result=mysqli_query($conn,$a);
	$row=mysqli_fetch_array($result);
	$x=$row['stu_id'];

	$result4=mysqli_query($conn,"select * from allot where stu_id=".$x);
	$row4=mysqli_fetch_array($result4);

	$result2=mysqli_query($conn,"select * from status_report where stu_id=".$x);
	$row2=mysqli_fetch_array($result2);

	$result3=mysqli_query($conn,"select * from hostel where hostel_id=".$row4['hostel_id']);
	$row3=mysqli_fetch_array($result3);


	//echo $row['alloted'];

	echo "<table border=5>
		<tr>
			<td>Status</td>
			<td>Date</td>
		</tr>
	";

	if($row2['pending']==1)
	{

		echo "
		<tr>
			<td><div style=\"     margin-top: 5%; color:red;font-size:120%    margin-top: 8%;
    margin-bottom: 8%;
    text-align: center\">Your request is being processed (pending)</div></td>
    	<td>".$row2['pending_time']."</td>

    	</tr>";


		
	}
		if($row2['alloted']==1)
		{
			echo "
		<tr>
			<td>Your seat has been alloted in <div style=\" color:red;font-size:120%;  margin-top: 8%;
    margin-bottom: 8%;
    text-align: center\">".$row3['name']." hostel.</td>
    	<td>".$row2['alloted_time']."</td>

    	</tr>";



			
		}
		if($row2['confirmed']==1) {
		echo "
		<tr>
			<td><div style=\" color:green;font-size:120%;
    margin-top: 8%;
    margin-bottom: 8%;
    text-align: center\">Your seat has been confirmed ".$row3['name']." hostel</div>
    	<td>".$row2['alloted_time']."</td>

    	</tr>";
		}

		echo "</table>";
	

	
	include_once 'footer.php';	
?>