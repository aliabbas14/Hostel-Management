<?php


        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'gpa_comp';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
  
        
        //Insert image content into database
     
 $file = "ACPDC.csv";

 $handle = fopen($file, "r");

 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
    $no= $filesop[0];
    $name = $filesop[1];
    $sem = $filesop[2];

    echo "$no $name $sem <br/>";

    $insert = $db->query("INSERT into studentinfo VALUES ('$no', '$name','$sem')");
 }

 if($insert)
 {
            echo "You database has imported successfully";
 }
 else
 {
            echo "Sorry! There is some problem.";
 }

 ?>