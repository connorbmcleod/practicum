<?php

require("common.php");
$courseid = $_SESSION['editcourse']['courseID'];

$query = " 
            UPDATE courses
            SET 
                coursename = :coursename,
                location = :location, 
                date = :date,
                minimumpeople = :minnumber, 
                maximumpeople = :maxnumber, 
                description = :courseDesc,
                objective1 = :objectiveone,
                objective2 = :objectivetwo,
                objective3 = :objectivethree,
                objective4 = :objectivefour,
                objective5 = :objectivefive,
            WHERE
            	courseID = $courseid
        "; 
         
         
        $query_params = array( 
            ':coursename' => $_POST['coursename'],
            ':location' => $_POST['location'], 
            ':date' => $_POST['date'],  
            ':minnumber' =>  $_POST['minnumber'],
            ':maxnumber' =>  $_POST['maxnumber'], 
            ':courseDesc' => $_POST['courseDesc'],
            ':objectiveone' => $_POST['objectiveone'],
            ':objectivetwo' => $_POST['objectivetwo'],
            ':objectivethree' => $_POST['objectivethree'],
            ':objectivefour' => $_POST['objectivefour'],
            ':objectivefive' => $_POST['objectivefive'],
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        header("Location: myprofile.php"); 
         
        die("Redirecting to registercourse.php");  

?>