<?php


     include 'dbConfig.php';


    //get records from database
    $result = $db->query("SELECT * FROM studentinfo");

    if($result->num_rows>0)
    {
        $delimiter = ",";
        $filename = "students_" . date('Y-m-d') . ".csv";
        
        //create a file pointer
        $f = fopen('php://memory', 'w');
        
        //set column headers
        $fields = array('No', 'Name', 'Sem');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $result->fetch_assoc())
        {
            $lineData = array($row['No'], $row['Name'], $row['Sem']);
            fputcsv($f, $lineData, $delimiter);
        }
        
        //move back to beginning of file
        fseek($f, 0);
        
        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        //output all remaining data on a file pointer
        fpassthru($f);
    }
    exit;


 ?>