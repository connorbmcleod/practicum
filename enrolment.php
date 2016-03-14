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

// Compares number of enrolments to max/min number

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

                $query = " 
                    SELECT 
                        * 
                    FROM courses 
                    WHERE 
                        courseID = '$enrolment'  
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
                        courseID = '$enrolment'  
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
                        $msg = "The Instructor for $coursename, taking place at $location, on $date at $time, has activated this class.";

                        // use wordwrap() if lines are longer than 70 characters

                        $headers = "From: weLearn" . "\r\n" ;

                        $email = $ids[$e]['email'];
                        // send email
                        @mail("$email","Course Activated",$msg,$headers);
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