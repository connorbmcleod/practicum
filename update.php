<?php
require("common.php");

$userID = $_SESSION['user']['id'];

    if(!empty($_POST)) 
    { 
        if(empty($_POST['bio'])) 
            { 
                die("Please enter your Bio."); 
            }

        if(empty($_POST['location'])) 
            { 
                die("Please enter your location"); 
            }  
        

        $query = "UPDATE users
                  SET usertype = 1
                  WHERE id='$userID'";
         
         
        $query_params = array( 
            ':bio' => $_POST['bio'],
            ':location' => $_POST['location'], 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        }

        // header("Location: myprofile.php");
    } 
?> 


<form action="update.php" method="post" id="becomeEducator">
    <input type="textarea" name="bio" value="" class="form-field" placeholder=" Tell us about yourself"/> 
    <br /><br /> 
    <input type="text" name="location" value="" class="form-field" placeholder=" Location"/>
    <input type="submit" value="Submit" class="button" id="createCourseBtn"/>
</form>