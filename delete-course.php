<?php

require("common.php"); 

$courseid = $_GET["id"];
$userid = $_SESSION['user']['id'];


$query = " 
                SELECT 
                    * 
                FROM courses 
                WHERE 
                    courseID = '$courseid'  
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

                $row = $stmt->fetch();
                $coursename = $row['coursename'];
                $location = $row['location'];
                $date = $row['date'];
                $time = $row['time'];

$query = " 
                SELECT 
                    studentID 
                FROM enrollments 
                WHERE 
                    courseID = '$courseid'  
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

                $row = $stmt->fetchAll();

                $count = count($row);

                $id = array();

                for($i = 0; $i < $count; $i++) {
                    array_push($id, $row[$i]['studentID']);
                }


                $ids = array();

                for($i = 0; $i < $count; $i++) {
                    $query = " 
                        SELECT 
                            email
                        FROM users 
                        WHERE 
                            id = $id[$i]  
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

                    array_push($ids, $stmt->fetch());
                }

                $counts = count($row);

                for($e = 0; $e < $counts; $e++) {
                    // the message
                    $msg = "The Instructor for $coursename, taking place at $location, on $date at $time, has cancelled this class. We apologize for any inconvenience.";

                    // use wordwrap() if lines are longer than 70 characters

                    $headers = "From: weLearn" . "\r\n" ;

                    $email = $ids[$e]['email'];
                    // send email
                    @mail("$email","Course Deleted",$msg,$headers);
                }

$query = " 
            DELETE
            FROM courses 
            WHERE 
                courseID = '$courseid'  
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



            


            header("Location: myprofile.php?id=$userid");

?>