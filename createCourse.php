<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Create Course</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

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
                        <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header">Home</a></li>
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


    <!-- content -->


    <div class="page-header">
        <div class="page-title"><h2>Create Course</h2></div> 
    </div>

        <form action="registercourse.php" method="post" id="createCourse">
            <div id="wrapper1">
                <h3>Course Info</h3>

                    <input id="coursename" type="text" name="coursename" value="" class="form-field" placeholder=" Course Name"/> 
                    <br /><br /> 
                <!-- <input id="location" type="text" name="location" value="" class="form-field" placeholder=" Location"/>  -->

            <!-- <div id="location_drop">
                    <p>&nbsp;Choose a Location</p>
                        <ul id="location_drop_menu">
                            <li id="location" value="Gibsons">Gibsons</li>
                            <li id="location" value="Lund">Lund</li>
                            <li id="location" value="Sechelt">Sechelt</li>
                        </ul>

                </div> -->
             <!-- Waiting for list of locations to finish -->

                <input id="datepicker" type="text" name="date" value="" class="form-field" placeholder=" Date"/> 


                        <br /><br /> 

                            <fieldset>
                                <label for="time">Select a Time</label>
                                <select name="time" id="speed">
                                  <option>12am</option>
                                  <option>1am</option>
                                  <option>2am</option>
                                  <option>3am</option>
                                  <option>4am</option>
                                  <option>5am</option>
                                  <option>6am</option>
                                  <option>7am</option>
                                  <option>8am</option>
                                  <option>9am</option>
                                  <option>10am</option>
                                  <option>11am</option>
                                  <option>12pm</option>
                                  <option>1pm</option>
                                  <option>2pm</option>
                                  <option>3pm</option>
                                  <option>4pm</option>
                                  <option>5pm</option>
                                  <option>6pm</option>
                                  <option>7pm</option>
                                  <option>8pm</option>
                                  <option>9pm</option>
                                  <option>10pm</option>
                                  <option>11pm</option>
                                </select>
                            </fieldset>
                        <br />


                            <fieldset>
                                <label for="location">Select a Region</label>
                                <select name="location" id="speed">
                                  <option>Gibsons</option>
                                  <option>Roberts Creek</option>
                                  <option>Sechelt</option>
                                  <option>Pender Harbour</option>
                                  <option>Gambier Harbour</option>
                                  <option>Keats Island</option>
                                </select>
                            </fieldset>
                        <br />


                <input id="minnumber" type="text" name="minnumber" value="" class="form-field" placeholder=" Minimum Number of Students"/> 
                <br /><br />
                <input id="maxnumber" type="text" name="maxnumber" value="" class="form-field" placeholder=" Maximum Number of Students"/> 
                <br /><br /> 
            </div>




            <div id="wrapper2">
                <h3>Learning Objectives</h3>
                      <input type="text" name="objectiveone" value="" class="form-field" placeholder="1"/> 
                      <br /><br />
                       <input type="text" name="objectivetwo" value="" class="form-field" placeholder="2"/> 
                      <br /><br /> 
                       <input type="text" name="objectivethree" value="" class="form-field" placeholder="3"/> 
                      <br /><br /> 
                       <input type="text" name="objectivefour" value="" class="form-field" placeholder="4"/> 
                      <br /><br /> 
                       <input type="text" name="objectivefive" value="" class="form-field" placeholder="5"/> 
                      <br /><br /> 
                      <br />
            </div>



            <div id="wrapper3">
                  <h3> Course Description</h3>
                      <textarea id="coursedesc" cols="50" rows="15" type="text" name="courseDesc" value="" placeholder=""></textarea>
            </div>

                      <a href="http://localhost/practicum/myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>"><input onclick="" type="submit" value="Register" class="button" id="createCourseBtn"/></a>
        </form>


    <!-- content -->

    <!-- footer -->

        <?php include 'footer.php'; ?>

    <!-- footer -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/global.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


</body>
</html>