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

    if(!empty($_SESSION['user'])){
        $firstname = $_SESSION['user']['firstname'];
        $lastname = $_SESSION['user']['lastname'];
        $userID = $_SESSION['user']['id'];
    }
    
    $iduser = $_GET["id"];


            $query = " 
                SELECT * FROM educatorinfo 
                WHERE 
                    id = '$iduser' 
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
                 
                $_SESSION['userinfo'] = $row;

            $coursequery = " 
                SELECT
                    courseID,
                    coursename,
                    location,
                    description 
                FROM courses 
                WHERE 
                    teacherID = '$iduser' 
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
                 
                $_SESSION['courseinfo'] = $rows;  
         
            $count = count($_SESSION['courseinfo']);

?>

<div class="hero hero_educator">

<?php include 'header.php'; ?>


    
    <div id="hero-wrap">
        <div class="hero-title-upper border-bottom"><?php echo $_SESSION['userinfo']['teacherfname'];?></div> 
        <div class="hero-title"><?php echo $_SESSION['userinfo']['teacherlname']; ?></div>
    </div>
    </div>

<!-- content -->
<!-- <div id="profile-name">
    <h2><strong><?php echo $firstname . ' ' . $lastname; ?></strong></h2>
        <h5><?php echo $_SESSION['userinfo']['location']?></h5>
            <hr>
</div> -->

<div class="content-wrapper" id="about-us-content">

<div class="bio">
    <h2 class="about_header">BIO</h2>
    <p class="about_paragraph"><?php 
    if(empty($_SESSION['userinfo']['bio'])){
        echo "<a href='becomeeducator.php'><p>Fill Out Your Bio</p></a>";
    }
    else{
    echo $_SESSION['userinfo']['bio'];
    } ?></p>
</div>


    <h2 class="about_header">Past Classes</h2>


    <h2 class="about_header"> Upcoming Classes </h2>
    <div class="allclasses">

    <?php 
        if(!empty($_SESSION['courseinfo'])){ 
            for($i = 0; $i < $count; $i++) { ?>
                <div class="search_class">
                    <a href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['courseinfo'][$i]['courseID']; ?>'<p><?php echo $_SESSION['courseinfo'][$i]['coursename']; ?></p></a>
                    <p><?php echo $_SESSION['courseinfo'][$i]['location']; ?></p>
                    <p><?php echo substr($_SESSION['courseinfo'][$i]['description'], 0, 100) . "..."; ?></p>

                </div>
            <?php }
            ?>
<?php } 
?>
    </div>
    <?php 

        if(!empty($_SESSION['user'])){
            if($_SESSION['user']['usertype'] == 1){ ?>
                <a href="createcourse.php"><button class="button" id="create-course">Create a Course</button></a>
            <?php }
        }
            ?>
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
</body>
</html>