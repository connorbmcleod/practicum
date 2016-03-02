<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
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

<!-- content -->
<!-- <div id="profile-name">
    <h2><strong><?php echo $firstname . ' ' . $lastname; ?></strong></h2>
</div>
        <hr> -->

<!--             <div class="upcoming-classes">
                <h2><strong>Upcoming Classes</strong></h2>
                <a href="">
                    <div class="class" id="class-1">
                        <h3><strong><a href="class.php">Mushrooming 101</a></strong></h3>
                        <p>February 11th, 2016</p>
                        <p>7pm-8pm</p>
                        <p>The Bush</p>
                    </div>
                </a>

                <a href="">
                    <div class="class" id="class-2">
                        <h3><strong>Advanced Rock climbing</strong></h3>
                        <p>February 15th, 2016</p>
                        <p>2pm-3pm</p>
                        <p>The Rock</p>
                    </div>
                </a>
                </div> -->
                

            <div class="upcoming-classes">
                <h2><strong>Upcoming classes</strong></h2>

                <?php
                if(!empty($_SESSION['studentcourseinfo'])){ 
                            for($i = 0; $i < $count; $i++) { ?>
                                <div class="class">
                                    <a href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['studentcourseinfo'][$i]['courseID']; ?>'<h3><strong><?php echo $_SESSION['studentcourseinfo'][$i]['coursename']; ?></h3></strong></a>
                                    <p><?php echo $_SESSION['studentcourseinfo'][$i]['location']; ?></p>
                                    <p><?php echo $_SESSION['studentcourseinfo'][$i]['date']; ?></p>
                                    <div class="profile-course-buttons">
                                        
                                        <button class="button" id="drop-course">Drop Course</button>
                                    </div>
                                </div>
                            <?php }
                            ?>
                <?php } 
                ?>

                   
             </div> <!-- End of upcoming classes -->

                <div class="profile-buttons">
                    <a href="allcourses.php"><button class="button" id="sign-up-for-classes">Sign up for more classes</button></a>
                </div>


                <div class="profile-buttons">
                    <a href="becomeeducator.php"><button class="button" id="become-educator">Become an educator</button></a>
                </div>


<!-- content -->

<!-- footer -->

<?php include 'footer.php'; ?>

<!-- footer -->
</body>
</html>