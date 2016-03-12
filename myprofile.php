<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title>WeLearn - My Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
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

            $query = " 
                SELECT * FROM ratings 
                WHERE 
                    teacherid = '$iduser' 
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
                 
            $_SESSION['teacherrate'] = $rows;

            $counts = count($_SESSION['teacherrate']);

            if(isset($_POST['rating']) && isset($_POST['comment'])){
                $query = " 
                    INSERT INTO ratings (
                        rating,
                        comment,
                        teacherid
                    ) VALUES (
                        :rating,
                        :comment,
                        $iduser
                    ) 
                "; 

                $query_params = array( 
                    ':rating' => $_POST['rating'],
                    ':comment' => $_POST['comment'],
                ); 
             
                try 
                { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                } 
                catch(PDOException $ex) 
                {  
                    die("Failed to run query: " . $ex->getMessage()); 
                } 

                header("Refresh:0");
        }

            $query = " 
                SELECT AVG(rating)
                FROM ratings
                WHERE teacherid = $iduser 
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
            $average = round($row['AVG(rating)']);

?>

<div class="hero hero_educator">

<?php include 'header.php'; ?>


    
    <div id="hero-wrap">
        <div class="hero-title-upper border-bottom"><?php echo $_SESSION['userinfo']['teacherfname'];?></div> 
        <div class="hero-title"><?php echo $_SESSION['userinfo']['teacherlname']; ?></div>
    </div>


        <div id="overall-rating">
        <?php for($a = 0; $a < $average; $a++) { 
                echo "&#9733";
            } 
            ?>
        </div>
    </div>
<!-- content -->
<!-- <div id="profile-name">
    <h2><strong><?php echo $firstname . ' ' . $lastname; ?></strong></h2>
        <h5><?php echo $_SESSION['userinfo']['location']?></h5>
            <hr>
</div> -->

<div class="content-wrapper" id="myprofile-content">

    <div class="bio">
        <h2 class="about_header">BIO</h2>
            <p><?php 
            if(empty($_SESSION['userinfo']['bio'])){
                echo "<a href='becomeeducator.php'><p>Fill Out Your Bio</p></a>";
            }
            else{
            echo $_SESSION['userinfo']['bio'];
            } ?></p>
    </div>

    
            <div class="allClasses">
                <h2 class="about_header"> Upcoming Classes </h2>
                    <?php 
                        if(!empty($_SESSION['courseinfo'])){ 
                            for($i = 0; $i < $count; $i++) { ?>
                                <a href='http://localhost/practicum/course.php?id=<?php echo $_SESSION['courseinfo'][$i]['courseID']; ?>'>
                                    <div class="search_class" id="profile-course-display">
                                        <p class="class_head"><?php echo $_SESSION['courseinfo'][$i]['coursename']; ?></p>
                                        <p><strong>Location: </strong><?php echo $_SESSION['courseinfo'][$i]['location']; ?></p>
                                        <p><?php echo substr($_SESSION['courseinfo'][$i]['description'], 0, 100) . "..."; ?></p>
                                    </div>
                                </a>
                            <?php }
                            ?>
                    <?php } 
                    ?>
            </div>



            <div class="createCourseDiv">
                <?php 

                    if(!empty($_SESSION['user'])){
                        if($_SESSION['user']['id'] == $iduser){ ?>
                            <a href="createcourse.php"><button class="button" id="create-course">Create a Course</button></a>
                        <?php }
                    }
                        ?>
            </div>
    </div>

<div id="entireRating">

        <div id="ratingDiv">
            <h2>Rate This Insturctor</h2>
                <?php if(!empty($_SESSION['user'])){
                    if($_SESSION['user']['id'] != $iduser){ ?>

       

                <form method="post">
                    <select name="rating" id="theStars">
                      <option value="1">&#9734</option>
                      <option value="2">&#9734 &#9734</option>
                      <option value="3">&#9734 &#9734 &#9734</option>
                      <option value="4">&#9734 &#9734 &#9734 &#9734</option>
                      <option value="5">&#9734 &#9734 &#9734 &#9734 &#9734</option>
                    </select>
                        <br>
                    <textarea name="comment" id="ratingComment"></textarea>
                        <br>
                    <input onclick="" type="submit" value="Leave Rating" class="button" id=""/></a>
                </form>
        </div>

         <div id="ratingAndComments">
            <h2> COMMENTS </h2>
                <p><?php 
                    if(!empty($_SESSION['teacherrate'])){ 
                        for($i = 0; $i < $counts; $i++) { ?>
                                <div class="search_class" id="profile-comment-display">
                                <p>
                                <?php for($e = 0; $e < $_SESSION['teacherrate'][$i]['rating']; $e++) { ?>
                                   &#9733 
                                <?php } ?>
                                </p>
                                    <p class="class_head"><?php echo $_SESSION['teacherrate'][$i]['comment']; ?></p>
                                </div>
                                <br>
                        <?php }
                        ?>
                <?php } ?>
        </div>
 </div>   

    <?php } } ?>



            
<!-- content -->

<!-- footer -->
    
<?php include 'footer.php'; ?>

<!-- footer -->
</body>
</html>