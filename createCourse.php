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
             
            header("Location: myprofile.php"); 
            die("Redirecting to: myprofile.php"); 
        } 
        else 
        { 
            print("Login Failed."); 
             
            $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?>

<?php
if(empty($_SESSION['user'])) : ?>

    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/logo.gif" width="50px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allCourses.php" id="menuLink1" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" id="menuLink1" class="pure-menu-link">About us</a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link"> Contact us</a></li>
                </ul>

         </div> <!-- pure-menu end-->


        <div class="nav">
            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value="<?php echo $submitted_email; ?>"/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
             <button class="button" id="signup" name="signup"><a href="registerPage.php">Sign up</a></button>
              </div>
        </div><!-- Nav end-->

</div> <!-- Header end -->

<?php else : ?>

<!-- LOGGED IN HEADER -->
    <div class="header-logged">
        <div class="logo"><a href="index.php"><img src="images/logo.gif" width="50px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allCourses.php" id="menuLink1" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" id="menuLink1" class="pure-menu-link">About us</a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link"> Contact us</a></li>
                </ul>

         </div> <!-- pure-menu end-->

        <div class="nav">
            <div id="welcome"><p> <?php echo $_SESSION['user']['firstname']; ?> </p></div>
            <form id="logout-form" action="logout.php">
                <button class="button" type="submit" id="logout">Logout</button>
            </form>
            <img src="images/menu-arrow.png" width="40px">
        </div>
    </div> <!-- Header end -->

<?php endif; ?>


<!-- content -->



<div class="page-header">
    <div class="page-title"><h2>Create Course</h2></div> 
</div>

                <form action="registercourse.php" method="post" id="createCourse">
                    <div id="wrapper1">
                        <input type="text" name="coursename" value="" class="form-field" placeholder=" Course Name"/> 
                        <br /><br /> 
                        <input type="text" name="location" value="" class="form-field" placeholder=" Location"/> 
                        <br /><br /> 
                        <input type="text" name="date" value="" class="form-field" placeholder=" Time"/> 
                        <br /><br /> 
                        <input type="text" name="number" value="" class="form-field" placeholder=" Number of people needed"/> 
                        <br /><br /> 

                    </div>
                    <div id="wrapper2">
                    <textarea cols="50" rows="15" type="text" name="courseDesc" value="" placeholder=" Course Description"></textarea>
                    </div>
                    <br />
                     <input type="submit" value="Register" class="button" id="createCourseBtn"/>
                </form>


                <?php
                    if($_SESSION['user']['usertype'] == 0){
                        echo "i'm fat and a 0";
                    };
                ?>

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