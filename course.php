<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title>WeLearn</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

    <?php 

        require("common.php"); 
        $courseid = $_GET["id"];
        $_SESSION['enrolment'] = $courseid;
        $userid = $_SESSION['user']['id'];

        $query = " 
                SELECT * 
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
                     
                    $_SESSION['coursepage'] = $row;

                $teacherid = $_SESSION['coursepage']['teacherID'];

        $query = " 
                SELECT 
                    teacherfname,
                    teacherlname 
                FROM educatorinfo 
                WHERE 
                    id = '$teacherid'  
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
                     
                    $_SESSION['teacher'] = $row;

        $query = " 
                SELECT 
                    1 
                FROM enrollments
                WHERE 
                    courseID = '$courseid'
                AND
                    studentID = $userid
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
              
            $truth = $stmt->fetch();  
         
    ?>

    <div class="hero hero_courses">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title border-bottom"><?php echo $_SESSION['coursepage']['coursename']; ?></div> 
            <div class="hero-title"></div>
        </div>
    </div> 
    
    <!-- Header end -->

    <!-- content -->
    <div id="course-content">


    <div class="col" id="course-left-col">
        <h3><strong>Educator</strong></h3>
        <a id="courseeducator" href='http://localhost/practicum/myprofile.php?id=<?php echo $teacherid; ?>'>
            <p><?php echo $_SESSION['teacher']['teacherfname'] . ' ' . $_SESSION['teacher']['teacherlname']; ?></p>
        </a>
        <br>
        <h3><strong>Date</strong></h3>
        <p><?php echo $_SESSION['coursepage']['date']; ?></p><br>
        <h3><strong>Time</strong></h3>
        <p><?php echo $_SESSION['coursepage']['time']; ?></p><br>
        <h3><strong>Region</strong></h3>
        <p><?php echo $_SESSION['coursepage']['region']; ?></p><br>
        <h3><strong>Area</strong></h3>
        <p><?php echo $_SESSION['coursepage']['area']; ?></p><br>
        <h3><strong>Location</strong></h3>
        <p><?php echo $_SESSION['coursepage']['location']; ?></p><br>
    </div>
    <div class="col" id="course-right-col">
        <p><?php echo $_SESSION['coursepage']['description']; ?></p>
    </div>

<br>

    <div id="coursebuttons">
    <?php 

        if(!empty($_SESSION['user'])){ 

            if($truth) 
            { ?>
                <form action="dropcourse.php" method="post" class="form">
                    <button id="course-delete-button">Drop Course</button>
                </form> 
           <?php }

           else if($_SESSION['user']['id'] != $teacherid) { ?> 

                <form action="enrolment.php" method="post" class="form">
                    <button id="joincourse">Join Course</button>
                </form>

            <?php }

        if($teacherid == $_SESSION['user']['id']){ ?>
        
            <a href="editCourse.php?id=<?php echo $courseid ?>"><button id="login-register-btn">Edit Course Details</button></a>
            <a href="roster.php?id=<?php echo $courseid ?>"><button id="login-register-btn">View Roster</button></a>
            <a href="delete-course.php?id=<?php echo $courseid ?>"><button id="course-delete-button">Delete Course</button></a>
        
        <?php } 
        }

        if(empty($_SESSION['user'])) { ?>

            <a href="loginPage.php"><button id="login-register-btn">Sign In to Enroll</button></a>

        <?php } ?>

    </div>


    </div>
    <!-- content -->


    <!-- footer -->

    <?php include 'footer.php'; ?>

<!-- footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>