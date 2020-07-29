<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"hostel_managment");

$result=mysqli_query($conn,"select * from seat");

echo"<div><table border=5>
		<tr>
			<td>Hostel Name</td>
			<td>Open Actual Seat</td>
			<td>Open Vacant Seat</td>
			<td>SC Actual Seat</td>
			<td>SC Vacant Seat</td>
			<td>ST Actual Seat</td>
			<td>ST Vacant Seat</td>
			<td>OBC Actual Seat</td>
			<td>OBC Vacant Seat</td>
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



	</tr> </div>";


}

?>