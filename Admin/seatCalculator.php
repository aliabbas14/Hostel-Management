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

<?php
session_start();
$totalSeats = intval($_GET['q']);

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

$openSeats_1 = floor(($totalSeats*$openSeats)/100);
$obcSeats_1 = floor(($totalSeats*$obcSeats)/100);

$stSeats_1 = floor(($totalSeats*$stSeats)/100);
$scSeats_1 = floor(($totalSeats*$scSeats)/100);
$DSSeats_1 = floor(($totalSeats*$DSSeats)/100);

$calulatedTotal = $openSeats_1+$scSeats_1+$stSeats_1+$obcSeats_1+$DSSeats_1;
if($calulatedTotal<$totalSeats)
{
    $openSeats_1=$openSeats_1 + 1;
    $diff = $totalSeats-$calulatedTotal;
    switch ($diff) {
       
        case '2' :
                $obcSeats_1 =$obcSeats_1 +1;
            break;

        case '3' :
                 $obcSeats_1 =$obcSeats_1 +1;
                 $stSeats_1=$stSeats_1+1;
            break;

        case '4':
             $obcSeats_1 =$obcSeats_1 +1;
             $stSeats_1=$stSeats_1+1;
             $scSeats_1=$scSeats_1+1;
            break;
        
        default:
            
            break;
    }
}
echo "<table>
<tr>
<th>Category</th>
<th>Seats</th>
</tr>";

echo "<tr><td>Open</td><td><div id=\"open_seat\" >".$openSeats_1."</div></td></tr>";
echo "<tr><td>OBC</td><td id=\"obc_seat\">".$obcSeats_1."</td></tr>";
echo "<tr><td>SC</td><td id=\"sc_seat\">".$scSeats_1."</td></tr>";
echo "<tr><td>ST</td><td id=\"st_seat\">".$stSeats_1."</td></tr>";
echo "<tr><td>DS</td><td id=\"ds_seat\">".$DSSeats_1."</td></tr>";
echo "</table>";

$_SESSION['openSeats_1']=$openSeats_1;
$_SESSION['obcSeats_1']=$obcSeats_1;
$_SESSION['scSeats_1']=$scSeats_1;
$_SESSION['stSeats_1']=$stSeats_1;
$_SESSION['DSSeats_1']=$DSSeats_1;
//echo $openSeats_1;
mysqli_close($con);
?>
</body>
</html>