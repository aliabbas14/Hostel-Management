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
echo $openSeats;

mysqli_close($con);
?>
