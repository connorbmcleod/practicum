<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Ratings</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 

        require("common.php");

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

            $count = count($_SESSION['teacherrate']);
         
    ?>

    <div class="hero hero_ourlearners">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom"><?php echo $_SESSION['userinfo']['teacherfname'];?></div> 
            <div class="hero-title"><?php echo $_SESSION['userinfo']['teacherlname']; ?></div>
        </div>
    </div>


<!-- content -->

<div>

    <p><?php 
            if(!empty($_SESSION['courseinfo'])){ 
                for($i = 0; $i < $count; $i++) { ?>
                        <div class="search_class" id="profile-course-display">
                        <p>
                        <?php for($e = 0; $e < $_SESSION['teacherrate'][$i]['rating']; $e++) { ?>
                           &#9733 
                        <?php } ?>
                        </p>
                            <p class="class_head"><?php echo $_SESSION['teacherrate'][$i]['comment']; ?></p>
                        </div>
                    </a>
                <?php }
                ?>
        <?php } ?></p>
</div>

<!-- content -->


<!-- footer -->



<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>

   <?php include 'footer.php'; ?>

</html>