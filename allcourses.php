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


   <div class="test">
       <?php 
       if(!empty($_SESSION['allcourses'])){ 
                for($i = 0; $i < $count; $i++) { ?>
                   <div class="search_class">
                        <a href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['allcourses'][$i]['courseID']; ?>'
                        <p><?php echo $_SESSION['allcourses'][$i]['coursename']; ?></p></a>
                        <p><?php echo $_SESSION['allcourses'][$i]['location']; ?></p>
                        <p><?php echo $_SESSION['allcourses'][$i]['date']; ?></p>
                   </div>
        <?php }; }; ?>
   </div>   


</div>
<!-- content -->




<!-- footer -->
    <div class="footer">
            <div class="footer-col" id="footer-one">
            </div>

             <div class="footer-col" id="footer-two">
                 <p>#555 Seymour Street | info@welearn.ca</p>
                <p>2016 | DACOKYE DESIGN</p>
             </div>

             <div class="footer-col" id="footer-three">
                <ul id="social-media">
                    <li><a href="#"><img src="images/facebook-square.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/instagram.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/twitter.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/googleplus-square.png" width="30px"></a></li>
                </ul>
            </div>

        </div>

    </div>

<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>