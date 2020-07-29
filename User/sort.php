<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		
		<input type="submit" name="sort" value="sort">
	</form>
</body>
</html>
<?php
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
		$x="select * from student where category_id=".$values[$j]." and alloted=0 order by merit_rank desc";
		$result=mysqli_query($conn,$x);
		echo "category:".$values[$j]."</br>";
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
					echo "Student:".$stu."choice:".$h_id."</br>";
					$y="select seat_id,`1`,`2`,`3`,`4` from seat where hostel_id=".$h_id;

					$result2=mysqli_query($conn,$y);
					//echo $y;
					while($h=mysqli_fetch_array($result2))
					{
						echo "seats in hostel".$h[$values[$j]]."</br>";
						if($h[$values[$j]]>0)
						{
							//echo $h[$values[$j]];
							$counter=1;
							$result3=mysqli_query($conn,"insert into allot(hostel_id,stu_id)values('".$h_id."','".$stu."')");
							$result4=mysqli_query($conn,"update status_report set alloted=1 where stu_id=".$stu);


								$temp=$h[$values[$j]];
								$temp=$temp-1;
												//echo "hellllllllllllllo " .$temp;
							$l="update seat set `".$values[$j]."` = ".$temp." where hostel_id=".$h_id;
							echo $l;
							$result5=mysqli_query($conn,$l);

							/*$result4=mysqli_query($conn,"select * from alloted_seat where hostel_id=".$h_id);
						

							$result5=mysqli_query($conn,"update alloted_seat set ".$values[$j]." = ".$values[$j]+1." where hostel_id=".$h_id;*/
							break;
						}
						if($counter==1)
						{
							echo "break";
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

	
?>