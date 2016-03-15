<?php

require("common.php"); 

$courseid = $_GET["id"];
$userid = $_SESSION['user']['id'];

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