<?php

require("common.php"); 

$courseid = $_GET["id"];
$userid = $_SESSION['user']['id'];

// $query = " 
//             DELETE
//             FROM courses 
//             WHERE 
//                 courseID = '$courseid'  
//             "; 
             
//             try 
//             { 
//                 $stmt = $db->prepare($query); 
//                 $result = $stmt->execute(); 
//             } 
//             catch(PDOException $ex) 
//             {  
//                 die("Failed to run query: " . $ex->getMessage()); 
//             } 

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

                print_r($ids);

                $counts = count($row);

                echo $ids[1]['email'];

                for($e = 0; $e < $counts; $e++) {
                    // the message
                    $msg = "First line of text\nSecond line of text";

                    // use wordwrap() if lines are longer than 70 characters
                    $msg = wordwrap($msg,70);
                    $headers = "From: webmaster@example.com" . "\r\n" .
                    "CC: somebodyelse@example.com";

                    $email = $ids[$e]['email'];
                    // send email
                    @mail("$email","My subject",$msg,$headers);
                }



            


            // header("Location: myprofile.php?id=$userid"); 

?>