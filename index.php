<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 

    require("common.php"); 
     
    $submitted_email = ''; 
      
    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                id,
                firstname,
                lastname,  
                password, 
                salt, 
                email,
                usertype 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
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
         
        $login_ok = false; 
         
        $row = $stmt->fetch(); 
        if($row) 
        { 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                $login_ok = true; 
            } 
        } 
         
        if($login_ok) 
        { 
            unset($row['salt']); 
            unset($row['password']); 
             
            $_SESSION['user'] = $row;

            if($_SESSION['user']['usertype'] == 1){ 
                header("Location: myprofile.php?id=" . $_SESSION['user']['id']); 
            }
            else {
                header("Location: userprofile.php");
            }
        } 
        else 
        { 
            // print("Login Failed."); 
            echo "<script type='text/javascript'>alert('Failed to log in');</script>";
             
            $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?>

<!-- NOT LOGGED IN HEADER -->

<div class="hero hero_index">

<?php include 'header.php'; ?>

	<div id="hero-wrap">
        <div class="hero-title-upper border-bottom">share your skills</div> 
        <div class="hero-title">weLearn</div>
    </div>
	<!-- <div id="index-search">
		<input type="search" placeholder=" Search for Classes" id="search"><img src="images/search.png" width="30px"></input>
	</div> -->
</div>

           
<!-- CONTENT -->
<div class="content" id="index-content">
        <div class="hr">
            <hr>
        </div>
        <?php
        if(empty($_SESSION['user'])) : ?>
            <div class="pure-g" id="not-logged">
                <div class="pure-u-1 pure-u-md-1-3" id="index-col-1">
                    <a href="registerPage.php"> 
                        <img src="images/1.jpeg" width="300px">
                        <h3>Sign Up</h3>
                    </a>
                </div>
                <div class="pure-u-1 pure-u-md-1-3" id="index-col-2">
                    <a href="allcourses.php">
                        <img src="images/2.jpeg" width="300px">
                        <h3>View Courses</h3>
                   </a>
                </div>
                <div class="pure-u-1 pure-u-md-1-3" id="index-col-3">
                    <a href="aboutUs.php">
                        <img src="images/3.jpeg" width="300px">
                        <h3>Our Community</h3>
                    </a>
                </div>
            </div>


        <?php else : ?>
            <div class="pure-g" id="not-logged">
                <div class="pure-u-1 pure-u-md-1-2" id="index-col-1">
                    
                <?php if($_SESSION['user']['usertype'] == 0){ ?>
                    <a href="userprofile.php"> 
                <?php } else { ?>
                    <a href="myprofile.php?id=<?php echo $_SESSION['user']['id'] ?>">
                <?php } ?>
                        <img src="images/4.jpeg" width="300px">
                        <h3>PROFILE</h3>
                    </a>
                </div>
                <div class="pure-u-1 pure-u-md-1-2" id="index-col-2">
                    <a href="allcourses.php">
                        <img src="images/5.jpeg" width="300px">
                        <h3>VIEW COURSES</h3>
                   </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="hr">
            <hr>
        </div>
<!-- <div id="index-learn-more">
    <h3><a href="aboutus.php">Learn more about weLEarn</a></h3>
</div>
 -->
</div> <!-- end of content -->
<!-- CONTENT -->

<!-- footer -->

<?php include 'footer.php'; ?>

<!-- footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>