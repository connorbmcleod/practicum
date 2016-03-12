<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title>WeLearn - Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/kylestyle.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

<?php 

    require("common.php"); 
     
    if($_SESSION['user']['usertype'] == 1){
        header("Location: myprofile.php");
    }
     
     $firstname = $_SESSION['user']['firstname'];
     $lastname = $_SESSION['user']['lastname'];
     $userid = $_SESSION['user']['id'];

     $coursequery = " 
                SELECT
                    courseID
                FROM enrollments 
                WHERE 
                    studentID = '$userid' 
            "; 
             
            try 
            { 
                $stmt = $db->prepare($coursequery); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
             
            $rows = $stmt->fetchAll(); 
                 
                $_SESSION['studentcourses'] = $rows;

    $studentcourses = $_SESSION['studentcourses'];

        $coursequery = " 
                SELECT
                *
                FROM courses
                     INNER JOIN enrollments ON 
                         enrollments.courseID = courses.courseID 
                         AND enrollments.studentID = '$userid'
                WHERE 1;
                "; 
             
            try 
            { 
                $stmt = $db->prepare($coursequery); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
             
            $row = $stmt->fetchAll(); 
                 
                $_SESSION['studentcourseinfo'] = $row;

                $count = count($_SESSION['studentcourseinfo']);
?>

<div class="hero hero_userprofile">

<?php include 'header.php'; ?>



	<div id="hero-wrap">
        <div class="hero-title-upper border-bottom"><?php echo $firstname ?></div> 
        <div class="hero-title"><?php echo $lastname ?></div>
    </div>
</div>
                


                
    <div class="test-wrapper content-wrapper">
            <div class="educators_header">
                <h2>Upcoming classes</h2>
            </div>    
                <?php
                if(!empty($_SESSION['studentcourseinfo'])){ 
                            for($i = 0; $i < $count; $i++) { ?>
<div class="course-wrapper">  
                                        <a class="buh" href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['studentcourseinfo'][$i]['courseID']; ?>'
                                            

                                        <p class="class_header"><?php echo $_SESSION['studentcourseinfo'][$i]['coursename']; ?></p></a>
                                        <div class="course_info">
                                        <p><?php echo $_SESSION['studentcourseinfo'][$i]['location']; ?></p>
                                        <p><?php echo $_SESSION['studentcourseinfo'][$i]['date']; ?></p>
                                        </div>
                                    
                            <?php }
                            ?>
                            </div>
                <?php } 
                ?>
             <!-- END OF ALL CLASSES -->
       </div>            

            <div id="button_container">
                <div class="profile-buttons">
                    <a href="allcourses.php"><button class="button" id="sign-up-for-classes">Sign up for more classes</button></a>
                </div>


                <div class="profile-buttons">
                    <a href="becomeeducator.php"><button class="button" id="become-educator">Become an educator</button></a>
                </div>
            </div>
    
<!-- content -->

<!-- footer -->

<?php include 'footer.php'; ?>



<!-- footer -->
</body>
</html>