<?php 

    require("common.php"); 
     
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

        if(empty($_POST['number'])) 
        { 
            die("Please enter the number of students."); 
        } 

        if(empty($_POST['courseDesc'])) 
        { 
            die("Please enter a course description."); 
        }  
         
        $query = " 
            INSERT INTO courses ( 
                coursename,
                location, 
                date, 
                maximumpeople, 
                description 
            ) VALUES ( 
                :coursename,
                :location, 
                :date, 
                :number, 
                :courseDesc
            ) 
        "; 
         
         
        $query_params = array( 
            ':coursename' => $_POST['coursename'],
            ':location' => $_POST['location'], 
            ':date' => $_POST['date'],  
            ':number' =>  $_POST['number'], 
            ':courseDesc' => $_POST['courseDesc'] 
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
         
        header("Location: private.php"); 
         
        die("Redirecting to private.php"); 
    } 
     
?> 