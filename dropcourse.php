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

            if($_SESSION['user']['usertype'] == 0){
                header("Location: userprofile.php"); 
            }
            else {
                header("Location: myprofile.php?id=" . $_SESSION['user']['id']);
            }

?>