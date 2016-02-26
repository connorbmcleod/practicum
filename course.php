<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title>Course Details</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 

        require("common.php"); 
        $courseid = $_GET["id"];
        $_SESSION['enrolment'] = $courseid;

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
            <div class="hero-title-upper border-bottom"><?php echo $_SESSION['coursepage']['coursename']; ?></div> 
            <div class="hero-title"></div>
        </div>
    </div> 
    
    <!-- Header end -->

    <!-- content -->
    <div id="course-content">
        <h1><?php echo $_SESSION['coursepage']['coursename']; ?></h1>
        <div class="rating">
            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
        </div>


    <div class="col" id="course-left-col">
        <h3>Educator</h3>
        <a href='http://localhost/practicum/myprofile.php?id=<?php echo $teacherid; ?>'>
            <p><?php echo $_SESSION['teacher']['teacherfname'] . ' ' . $_SESSION['teacher']['teacherlname']; ?></p>
        </a>
        <br>
        <h3>Time</h3>
        <p><?php echo $_SESSION['coursepage']['date']; ?></p><br>
        <h3>Location</h3>
        <p><?php echo $_SESSION['coursepage']['location']; ?></p><br>
    </div>
    <div class="col" id="course-right-col">
        <p><?php echo $_SESSION['coursepage']['description']; ?></p>
    </div>

<br>
    <?php 

        if(!empty($_SESSION['user'])){ 

            if($truth) 
            { ?>
                <form action="dropcourse.php" method="post" class="form">
                    <button>Drop Course</button>
                </form> 
           <?php }

           else { ?> 

                <form action="enrolment.php" method="post" class="form">
                    <button>Join Course</button>
                </form>

            <?php }

        if($teacherid == $_SESSION['user']['id']){ ?>
        
            <a href="editCourse.php?id=<?php echo $courseid ?>"><button id="login-register-btn">Edit Course Details</button></a>
        
        <?php } 
        }

        if(empty($_SESSION['user'])) { ?>

            <a href="registerPage.php"><button id="login-register-btn">Sign In to Enroll</button></a>

        <?php } ?>




    </div>
    <!-- content -->


    <!-- footer -->

    <?php include 'footer.php'; ?>

<!-- footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>