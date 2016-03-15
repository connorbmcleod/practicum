<?php 

    require("common.php"); 

    $userID = $_SESSION['user']['id'];
     
    if(!empty($_POST)) 
    { 
        if(empty($_POST['coursename'])) 
        { 
            die("Please enter your Course's Name."); 
        }

        if(empty($_POST['location'])) 
        { 
            die("Please enter the location of your course."); 
        } 
         
        if(empty($_POST['date'])) 
        { 
            die("Please enter a date."); 
        } 

        if(empty($_POST['minnumber'])) 
        { 
            die("Please enter the minimum number of students."); 
        } 

        if(empty($_POST['maxnumber'])) 
        { 
            die("Please enter the maximum number of students."); 
        } 

        if(empty($_POST['courseDesc'])) 
        { 
            die("Please enter a course description."); 
        }  
         
        $query = " 
            INSERT INTO courses ( 
                coursename,
                region,
                area,
                location,
                date, 
                time,
                minimumpeople, 
                maximumpeople, 
                description,
                objective1,
                objective2,
                objective3,
                objective4,
                objective5,
                teacherID,
                status 
            ) VALUES ( 
                :coursename,
                :region,
                :area,
                :location, 
                :date,
                :time, 
                :minnumber,
                :maxnumber, 
                :courseDesc,
                :objectiveone,
                :objectivetwo,
                :objectivethree,
                :objectivefour,
                :objectivefive,
                '$userID',
                '0'
            ) 
        "; 
         
         
        $query_params = array( 
            ':coursename' => $_POST['coursename'],
            ':region' => $_POST['region'],
            ':area' => $_POST['area'],
            ':location' => $_POST['location'],
            ':time' => $_POST['time'],   
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
         
        header("Location: myprofile.php?id=$userID"); 
         
        die("Redirecting to registercourse.php"); 
    } 
     
?> 