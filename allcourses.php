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
            <button id="show-login">Login</button>
                <a href="registerPage.php"><button class="button" id="signup" name="signup">Sign up</button></a>

            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value=""/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
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
            <div id="welcome">
                <?php if($_SESSION['user']['usertype'] == 1){ ?>
                <a href='http://localhost/practicum/myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
            <?php }
                else { ?>
                    <a href='http://localhost/practicum/userprofile.php'><p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                <?php } ?>
            </div>
                <div class="dropdown">
                  <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                  <div class="dropdown-content">
                    <a href="userprofile.php">My Profile</a>
                    <a href="edit_account.php">Edit Profile</a>
                    <a href="#"><form id="logout-form" action="logout.php">
                        <button type="submit" id="logout">Logout</button>
                    </form></a>
                  </div>
                </div>
            
        </div>
    </div> <!-- Header end -->

<?php endif; ?>


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