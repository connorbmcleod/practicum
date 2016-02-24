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
?>

<div class="hero hero_oureducators">

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
        <div class="hero-title-upper border-bottom">Our</div> 
        <div class="hero-title">Educators</div>
    </div>
</div>



<!-- content -->
<div class="content-wrapper educator-wrapper">
    <h2 class="about_header">Our Educators</h2>
        <p class="about_paragraph">Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.</p>
    <h2 class="about_header">Become an Educator</h2>
        <p class="about_paragraph">Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.<br>
        We have a few tips for you, if you are planning on becoming an educator. Here are links to the articles that are helpful:
            <ul>
                <li><a href="http://google.com">Article 1</a></li>
                <li><a href="http://google.com">Article 2</a></li>
                <li><a href="http://google.com">Article 3</a></li>
            </ul>
        </p>

         <div class="profile-buttons">
         <?php

            if(empty($_SESSION['user'])){
                echo '<a href="registerPage.php"><button class="button" id="become-educator">Sign Up</button></a>';
            }
            else{
                if($_SESSION['user']['usertype'] == 0){
                    echo '<a href="becomeeducator.php"><button class="button" id="become-educator">Become an Educator</button></a>';
                }
            }
        ?>
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