<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>WeLEarn - Edit Course</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

    <?php 

        require("common.php"); 
        $courseid = $_GET["id"];

        $query = " 
                SELECT * 
                FROM courses 
                WHERE 
                    courseID = '$courseid'  
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
                     
                    $_SESSION['editcourse'] = $row;


         
    ?>

    <?php

    if(empty($_SESSION['user'])) : ?>

    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo-black.png" width="200px"></a></div>

<div id="big_head">

            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allcourses.php" id="menuLink1 form-header" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <span id="menuLink1 form-header" class="pure-menu-link">About us</span>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link" id="form-header">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link" id="form-header">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link" id="form-header">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link" id="form-header"> Contact us</a></li>
                </ul>

            </div> <!-- pure-menu end-->


        <div class="nav">
            <div id="show-login">Login</div>
                <a href="registerPage.php"><div class="button" id="signup_head" name="signup">Sign up</div></a>
        </div>
            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value=""/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
            </div>
        <!-- Nav end-->
</div>


<div id="little_head">
    <div id="show_lhead">
        <span class="da_button">&#9776;</span>   
            <div id="lhead_content">
                <ul class="kdropmenu">
                     <li><a href="index.php"> Home</a></li>
                     <li><a href="allcourses.php" id="menuLink1">Courses</a></li>
                      <li>
                        <a href="#" class="mini_open">About us</a>
                        <ul class="mini_menu">
                            <li><a href="aboutUs.php">Who are we</a></li>
                            <li><a href="aboutEducators.php">Our educators</a></li>
                            <li><a href="aboutLearners.php">Our learners</a></li>
                        </ul>
                    </li>
                    <li><a href="contactUs.php"> Contact us</a></li>
                </ul>

            </div>


            <div class="nav">
                <div id="show-login">Login</div>
                    <a href="registerPage.php"><div class="button" id="signup_head" name="signup">Sign up</div></a>
            
            <!-- Nav end-->     
            </div>

            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value=""/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
            </div>

    </div>

</div>


</div> <!-- Header end -->

<?php else : ?>

<!-- LOGGED IN HEADER -->
    <div class="header-logged">
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo-black.png" width="200px"></a></div>

        <div id="big_head">
            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allcourses.php" id="menuLink1" class="pure-menu-link form-header">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <span id="menuLink1" class="pure-menu-link form-header">About us</span>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link" id="form-header"> Contact us</a></li>
                </ul>

         </div> <!-- pure-menu end-->

        <div class="nav">
                <div class="dropdown">
                  <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                      <div class="dropdown-content">

                      <?php if($_SESSION['user']['usertype'] == 1){?>
                        <a href="myprofile.php?id=<?php echo $_SESSION['user']['id']?>">My Profile</a>
                        <?php } 
                            else if($_SESSION['user']['usertype'] == 0){?>
                        <a href="userprofile.php">My Profile</a>
                        <?php } ?>
                        <a href="edit_account.php">Edit Account</a>
                        <a href="#"><form id="logout-form" action="logout.php">
                            <button type="submit" id="logout">Logout</button>
                        </form></a>
                      </div>
                </div>


                <div id="welcome2">
                    <?php if($_SESSION['user']['usertype'] == 1){ ?>
                    <a href='myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p class="name_color"> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php }
                    else { ?>
                    <a href='practicum/userprofile.php'><p class="name_color"> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php } ?>
                </div>
            
        </div>
    </div>


<div id="little_head">
    <div id="show_lhead">
        <span class="da_button">&#9776;</span>   
            <div id="lhead_content">
                <ul class="kdropmenu">
                     <li><a href="index.php"> Home</a></li>
                     <li><a href="allcourses.php" id="menuLink1">Courses</a></li>
                      <li>
                        <a href="#" class="mini_open">About us</a>
                        <ul class="mini_menu">
                            <li><a href="aboutUs.php">Who are we</a></li>
                            <li><a href="aboutEducators.php">Our educators</a></li>
                            <li><a href="aboutLearners.php">Our learners</a></li>
                        </ul>
                    </li>
                    <li><a href="contactUs.php"> Contact us</a></li>
                </ul>
            </div>


        <div class="nav">
                <div class="dropdown">
                  <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                  <div class="dropdown-content">

                  <?php if($_SESSION['user']['usertype'] == 1){?>
                    <a href="myprofile.php?id=<?php echo $_SESSION['user']['id']?>">My Profile</a>
                    <?php } 
                        else if($_SESSION['user']['usertype'] == 0){?>
                    <a href="userprofile.php">My Profile</a>
                    <?php } ?>
                    <a href="edit_account.php">Edit Account</a>
                    <a href="#"><form id="logout-form" action="logout.php">
                        <button type="submit" id="logout">Logout</button>
                    </form></a>
                  </div>
                </div>


                <div id="welcome2">
                    <?php if($_SESSION['user']['usertype'] == 1){ ?>
                    <a href='myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p class="name_color"> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php }
                    else { ?>
                        <a href='userprofile.php'><p class="name_color"> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php } ?>
                </div>
            
        </div>
    </div>
<!-- Nav end-->
</div>

</div>
</div> <!-- Header end -->

    <?php endif; ?>
    <!-- content -->


<div class="responsive-wrapper">
        <div class="edit-course-title"><h2>Edit Course</h2></div> 


        <form action="courseEdit.php" method="post" id="createCourse">
            <div id="wrapper1">
                <h3><strong> <?php echo $_SESSION['editcourse']['coursename'] ?> </strong></h3>

                <input id="location" type="text" name="location" value="<?php echo $_SESSION['editcourse']['location'] ?>" class="form-field" placeholder=" Location"/> 

             
               
                <br /><br /> 
                <input id="time" type="text" name="date" value="<?php echo $_SESSION['editcourse']['date'] ?>" class="form-field" placeholder=" Time"/> 
                <br /><br /> 
                <input id="minnumber" type="text" name="minnumber" value="<?php echo $_SESSION['editcourse']['minimumpeople'] ?>" class="form-field" placeholder=" Minimum Number of Students"/> 
                <br /><br />
                <input id="maxnumber" type="text" name="maxnumber" value="<?php echo $_SESSION['editcourse']['maximumpeople'] ?>" class="form-field" placeholder=" Maximum Number of Students"/> 
                <br /><br /> 


                <h3> Learning Objectives </h3>

                <input type="text" name="objectiveone" value="<?php echo $_SESSION['editcourse']['objective1'] ?>" class="form-field" placeholder=" Learning Objective One"/> 
            <br /><br />
             <input type="text" name="objectivetwo" value="<?php echo $_SESSION['editcourse']['objective2'] ?>" class="form-field" placeholder=" Learning Objective Two"/> 
            <br /><br /> 
             <input type="text" name="objectivethree" value="<?php echo $_SESSION['editcourse']['objective3'] ?>" class="form-field" placeholder=" Learning Objective Three"/> 
            <br /><br /> 
             <input type="text" name="objectivefour" value="<?php echo $_SESSION['editcourse']['objective4'] ?>" class="form-field" placeholder=" Learning Objective Four"/> 
            <br /><br /> 
             <input type="text" name="objectivefive" value="<?php echo $_SESSION['editcourse']['objective5'] ?>" class="form-field" placeholder=" Learning Objective Five"/> 

            </div>
            <div id="wrapper2">
            <h3> Course Descrption </h3>
                <textarea id="coursedesc" cols="50" rows="15" type="text" name="courseDesc" placeholder=" Course Description"><?php echo $_SESSION['editcourse']['description'] ?></textarea>
                <br />

            </div>
            <br /><br /> 
            <br />
             <input onclick="" type="submit" value="Update" class="button" id="createCourseBtn"/>

        </form>

</div>
    <!-- content -->

    <!-- footer -->

        <?php include 'footer.php'; ?>

    <!-- footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>