<?php 

    require("common.php"); 

    $user = $_SESSION['user']['id'];
    $enrolment = $_SESSION['enrolment'];

    $thequery = " 
            SELECT 
            	courseID,
                studentID
            FROM enrollments
            WHERE (courseID = '$enrolment' AND studentID = '$user')
        ";

    try 
            { 
                $stmt = $db->prepare($thequery); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 

            $row = $stmt->fetch();

            if($row) 
        	{ 
            	die("You've already registered bra"); 
        	} 

    $query = " 
            INSERT INTO enrollments ( 
                courseID,
                studentID
            ) VALUES ( 
            	'$enrolment',
                '$user'
            ) 
        ";

    try 
            { 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 

            if($_SESSION['user']['usertype'] == 0){
                header("Location: userprofile.php"); 
            }
            else {
                header("Location: myprofile.php?id=" . $_SESSION['user']['id']);
            }
?> 