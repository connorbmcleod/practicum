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

<?php
if(empty($_SESSION['user'])) : ?>

    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/logo.gif" width="50px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allCourses.php" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" class="pure-menu-link">About us</a>
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
    <div class="header-logged header_line">
        <div class="logo"><a href="index.php"><img src="images/logo.gif" width="50px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allCourses.php" class="pure-menu-link" id="form-header">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" class="pure-menu-link" id="form-header">About us</a>
                        <ul class="pure-menu-children" id="form-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link" id="form-header">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link" id="form-header">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link" id="form-header">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link" id="form-header"> Contact us</a></li>
                </ul>

         </div> <!-- pure-menu end-->

        <div class="nav">
            <div id="welcome"><p> <?php echo $_SESSION['user']['firstname']; ?> </p></div>
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


<!-- content -->


<div class="page-header">
    <div class="page-title"><h2>Create Course</h2></div> 
</div>

                <form action="registercourse.php" method="post" id="createCourse">
                    <div id="wrapper1">
                        <input type="text" name="coursename" value="" class="form-field" placeholder=" Course Name"/> 
                        <br /><br /> 
                        <!-- <input type="text" name="location" value="" class="form-field" placeholder=" Location"/>  -->
                        <div id="location_drop">
                            <p>&nbsp;Choose a Location</p>
                                <ul id="location_drop_menu">
                                    <li id="location" value="Gibsons">Gibsons</li>
                                    <li id="location" value="Lund">Lund</li>
                                    <li id="location" value="Sechelt">Sechelt</li>
                                </ul>


                     <!-- Waiting for list of locations to finish -->

                     
                        </div>
                        <br /><br /> 
                        <input type="text" name="date" value="" class="form-field" placeholder=" Time"/> 
                        <br /><br /> 
                        <input type="text" name="minnumber" value="" class="form-field" placeholder=" Minimum Number of Students"/> 
                        <br /><br />
                        <input type="text" name="maxnumber" value="" class="form-field" placeholder=" Maximum Number of Students"/> 
                        <br /><br /> 

                    </div>
                    <div id="wrapper2">
                    <textarea cols="50" rows="15" type="text" name="courseDesc" value="" placeholder=" Course Description"></textarea>
                    </div>
                    <br />
                     <input type="submit" value="Register" class="button" id="createCourseBtn"/>
                </form>


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