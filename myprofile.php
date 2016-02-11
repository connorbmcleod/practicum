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
     
     $firstname = $_SESSION['user']['firstname'];
     $lastname = $_SESSION['user']['lastname'];
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


<div class="hero" id="other-hero">
	<div class="hero-title"></div>
</div>

<!-- content -->
<div id="profile-name">
    <h2><strong><?php echo $firstname . ' ' . $lastname; ?></strong></h2>
        <h5>Vancouver, BC</h5>
            <hr>
</div>

<div class="left" id="profile-left">
        <div class="bio">
            <h3><strong>BIO</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
        et augue interdum, facilisis leo consequat, posuere sem. Ut sed
        leo vel tellus faucibus euismod. In et enim cursus, rhoncus libero
        sed, ornare elit. Sed nec quam rutrum, interdum augue vitae, porttitor
        purus. Aliquam et ipsum risus.</p>
        </div>

        <div class="hobbies">
            <h3><strong>HOBBIES</strong></h3>
            <ul>
                <li>This</li>
                <li>That</li>
                <li>And That</li>
            </ul>
        </div>

        <div class="skills">
            <h3><strong>SKILLS</strong></h3>
            <ul>
                <li>Mushrooming</li>
                <li>Gardening</li>
                <li>Hair Flipping</li>
            </ul>
        </div>
</div>
<div class="right" id="profile-right">
    <div class="past-classes">
        <h2> Upcoming Classes </h2>
        <div class="class-wrapper">

        </div>
        <button class="button" id="see-all">See All</button>
    </div>
</div>
<!-- content -->

<!-- footer -->
    <div id="index-footer">
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