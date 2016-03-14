<?php
require("common.php"); 
$enrolment = $_SESSION['enrolment'];
$user = $_SESSION['user']['id'];

$query = " 
			DELETE FROM enrollments
			WHERE courseID = '$enrolment' AND studentID = '$user'
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

$countquery = " 
                SELECT
                    * 
                FROM enrollments
                WHERE 
                    courseID = '$enrolment' 
            "; 
             
            try 
            { 
                $stmt = $db->prepare($countquery); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
             
            $rows = $stmt->fetchAll(); 
                 
                $_SESSION['countinfo'] = $rows;  
         
            $count = count($_SESSION['countinfo']);

$getquery = " 
            SELECT
                minimumpeople,
                maximumpeople
            FROM courses
            WHERE courseID = '$enrolment'
        ";

    try 
            { 
                $stmt = $db->prepare($getquery); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            }

            $row = $stmt->fetch(); 
                     
                    $_SESSION['number'] = $row;
                    $minnumber = $_SESSION['number']['minimumpeople'];
                    $maxnumber = $_SESSION['number']['maximumpeople'];



            if($count >= $minnumber && $count < $maxnumber){

                $rightquery = " 
                    UPDATE courses
                    SET 
                        status = '1'
                    WHERE
                        courseID = '$enrolment'
                "; 

                try 
                { 
                    $stmt = $db->prepare($rightquery); 
                    $result = $stmt->execute(); 
                } 
                catch(PDOException $ex) 
                {  
                    die("Failed to run query: " . $ex->getMessage()); 
                } 

                

            }

            else if($count < $minnumber){
                $maxquery = " 
                    UPDATE courses
                    SET 
                        status = '0'
                    WHERE
                        courseID = '$enrolment'
                "; 

                try 
                { 
                    $stmt = $db->prepare($maxquery); 
                    $result = $stmt->execute(); 
                } 
                catch(PDOException $ex) 
                {  
                    die("Failed to run query: " . $ex->getMessage()); 
                } 
            }

            else if($count == $maxnumber){
                $maxquery = " 
                    UPDATE courses
                    SET 
                        status = '2'
                    WHERE
                        courseID = '$enrolment'
                "; 

                try 
                { 
                    $stmt = $db->prepare($maxquery); 
                    $result = $stmt->execute(); 
                } 
                catch(PDOException $ex) 
                {  
                    die("Failed to run query: " . $ex->getMessage()); 
                } 
            }


            if($_SESSION['user']['usertype'] == 0){
                header("Location: userprofile.php"); 
            }
            else {
                header("Location: myprofile.php?id=" . $_SESSION['user']['id']);
            }

?>