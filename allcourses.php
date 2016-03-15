<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Courses</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/kylestyle.css">
</head>
<body>

    <?php 

        require("common.php"); 


if (isset($_GET["category"])) {

        $category = $_GET["category"];

        $query = " 
                    SELECT
                        * 
                    FROM courses 
                    WHERE 
                        category = '$category' 
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
    }
    else if(isset($_GET["search"])){
        $search = $_GET["search"];
        $search = '%'.$search.'%';
        $query = " 
                    SELECT
                        * 
                    FROM courses 
                    WHERE 
                        lower(coursename) LIKE '$search'
                    OR  lower(category) LIKE '$search'
                    OR  lower(region) LIKE '$search'
                    OR  lower(area) LIKE '$search'
                    OR  lower(location) LIKE '$search'
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
    } 
    else {

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

    }

    if(isset($_POST["category"])){
        $category = $_POST["category"];
        if($category == ''){
            header("Location: allcourses.php"); 
        }
        else{
            header("Location: allcourses.php?category=$category"); 
        }
    }

    if(isset($_POST["search"])){
        $search = strtolower($_POST["search"]);
        if($search == ''){
            header("Location: allcourses.php"); 
        }
        else{
            header("Location: allcourses.php?search=$search"); 
        }
    }
    ?>

    <div class="hero hero_courses">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">Browse</div> 
            <div class="hero-title">Courses</div>
        </div>
    </div>


    <form method="post">

                     <fieldset>
                                <label for="category">Filter By Category</label>
                                <select name="category" id="speed">
                                    <option></option>
                                    <option>Art</option>
                                    <option>Automotive</option>
                                    <option>Beauty</option>
                                    <option>Childcare/Development</option>
                                    <option>Computers</option>
                                    <option>Cooking</option>
                                    <option>Crafts</option>
                                    <option>Boating</option>
                                    <option>Business</option>
                                    <option>Dance</option>
                                    <option>First-aid</option>
                                    <option>Games</option>
                                    <option>Gardening/Agriculture</option>
                                    <option>Health/Wellness</option>
                                    <option>History/Travel/Culture</option>
                                    <option>Home Renovation/Maintenance</option>
                                    <option>Languages</option>
                                    <option>Martial Arts</option>
                                    <option>Math</option>
                                    <option>Music</option>
                                    <option>Nature/Outdoors</option>
                                    <option>Pets</option>
                                    <option>Sciences</option>
                                    <option>Social Sciences</option>
                                    <option>Sports</option>
                                </select>
                            <button type="submit" id="filter">Filter</button>
                            <button id="reset-courses"><a href="http://localhost/practicum/allcourses.php">Reset</a></button>
                        </fieldset>

                 </form>

                 <div id="all-courses-search">
                        <form method="post">
                        <input type="search" placeholder=" Search.." name="search" id="course-page-search">
                        </input>
                        <button type="submit" id="search-button"><img src="images/search.png" width="43px"></button>
                    </form>
                </div>

        <div class="test-wrapper">

           <?php 
           if(!empty($_SESSION['allcourses'])){ 
                    for($i = 0; $i < $count; $i++) { ?>

                        <div class="course-wrapper">                                
                                <a class="buh" href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['allcourses'][$i]['courseID']; ?>'
                                
                                <p class="class_header"><?php echo $_SESSION['allcourses'][$i]['coursename']; ?></p></a>
                                <div class="course_info">
                                    <p><?php echo $_SESSION['allcourses'][$i]['location']; ?></p>
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



<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
    <?php include 'footer.php'; ?>
</html>

<!-- footer -->
