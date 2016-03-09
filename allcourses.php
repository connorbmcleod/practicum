<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Courses</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 

        require("common.php"); 

        $query = " 
                    SELECT
                        * 
                    FROM courses 
                    WHERE 
                        completion = 0 
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
                 
                $rows = $stmt->fetchAll(); 
                     
                    $_SESSION['allcourses'] = $rows;

                    $count = count($_SESSION['allcourses']);

    ?>

    <div class="hero hero_courses">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">Browse</div> 
            <div class="hero-title">Courses</div>
        </div>
    </div>


    <!-- content -->
    <div id="all-courses-search">
        <h2>Search for a course</h2>
        <input type="search" placeholder=" Search.." id="course-page-search">
            <img src="images/search.png" width="43px">
        </input>
    </div>

    <div class="test-wrapper">

           <?php 
           if(!empty($_SESSION['allcourses'])){ 
                    for($i = 0; $i < $count; $i++) { ?>

                        <div class="course-wrapper">                                
                                <a class="buh" href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['allcourses'][$i]['courseID']; ?>'
                                
                                <p class="class_header"><?php echo $_SESSION['allcourses'][$i]['coursename']; ?></p></a>
                                <div class="course_info">
                                    <p><?php echo $_SESSION['allcourses'][$i]['area']; ?></p>
                                    <p><?php echo $_SESSION['allcourses'][$i]['date']; ?></p>
                                </div>
                                <?php if($_SESSION['allcourses'][$i]['status'] == 0) {  ?>
                                             <p class="pending">PENDING</p>
                                    <?php }
                                        else if($_SESSION['allcourses'][$i]['status'] == 1){ ?>
                                            <p class="active">ACTIVE</p>
                                    <?php } else { ?>
                                            <p class="full">FULL</p>
                                    <?php } ?>
                        </div>
            <?php }; }; ?>
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