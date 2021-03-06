<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>WeLearn - Create Course</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">

</head>
<body>



    <?php 

        require("common.php"); 
         
    ?>

    <?php

    if(empty($_SESSION['user'])) : ?>

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


    <div class="page-header">
        <div class="page-title" id="ccourse"><h2>Create Course</h2></div> 
    </div>

        <form action="registercourse.php" method="post" id="createCourse">
            <div id="wrapper1">
                <h3>Course Info</h3>

                    <input id="coursename" type="text" name="coursename" value="" class="form-field" placeholder=" Course Name"/> 
                    <br /><br /> 


                <input id="datepicker" type="text" name="date" value="" class="form-field" placeholder=" Date"/> 


                        <br /><br /> 

                            <fieldset>
                            <label for="category">Select a Category</label>
                                <select name="category" id="speed">
                                    <option></option>
                                    <option>Art</option>
                                    <option>Automotive</option>
                                    <option>Beauty</option>
                                    <option>Childcare/Development</option>
                                    <option>Computers</option>
                                    <option>Cooking</option>
                                    <option>Crafts</option>
                                    <option>Boating</option>
                                    <option>Business</option>
                                    <option>Dance</option>
                                    <option>First-aid</option>
                                    <option>Games</option>
                                    <option>Gardening/Agriculture</option>
                                    <option>Health/Wellness</option>
                                    <option>History/Travel/Culture</option>
                                    <option>Home Renovation/Maintenance</option>
                                    <option>Languages</option>
                                    <option>Martial Arts</option>
                                    <option>Math</option>
                                    <option>Music</option>
                                    <option>Nature/Outdoors</option>
                                    <option>Pets</option>
                                    <option>Sciences</option>
                                    <option>Social Sciences</option>
                                    <option>Sports</option>
                                </select>
                            </fieldset>
                        <br />

                            <fieldset>
                                <label for="time">Select a Time</label>
                                  <select name="time" id="speed">
                                    <option>12 AM</option>
                                    <option>1 AM</option>
                                    <option>2 AM</option>
                                    <option>3 AM</option>
                                    <option>4 AM</option>
                                    <option>5 AM</option>
                                    <option>6 AM</option>
                                    <option>7 AM</option>
                                    <option>8 AM</option>
                                    <option>9 AM</option>
                                    <option>10 AM</option>
                                    <option>11 AM</option>
                                    <option>12 PM</option>
                                    <option>1 PM</option>
                                    <option>2 PM</option>
                                    <option>3 PM</option>
                                    <option>4 PM</option>
                                    <option>5 PM</option>
                                    <option>6 PM</option>
                                    <option>7 PM</option>
                                    <option>8 PM</option>
                                    <option>9 PM</option>
                                    <option>10 PM</option>
                                    <option>11 PM</option>
                                  </select>

                            </fieldset>
                        <br />



                            <fieldset>
                                <label for="region">Select a Region</label>
                                <select name="region" id="speed">
                                    <option></option>
                                    <option>Sunshine Coast</option>
                                </select>
                            </fieldset>
                        <br />


                            <fieldset>
                                <label for="area">Select a Area</label>
                                <select name="area" id="speed">
                                    <option></option>
                                    <option>Gibsons</option>
                                    <option>Roberts Creek</option>
                                    <option>Sechelt</option>
                                    <option>Pender Harbour</option>
                                    <option>Gambier Harbour</option>
                                    <option>Keats Island</option>
                                </select>
                            </fieldset>
                        <br />



                            <fieldset>
                                <label for="location">Select a Location</label>
                                <select name="location" id="speed">
                                    <option></option>
                                    <option>Library</option>
                                    <option>Coffee Shop</option>
                                    <option>Town Hall</option>
                                    <option>Ice Rink</option>
                                    <option>The Bush</option>
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

                      <a href="http://localhost/practicum/myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>"><input onclick="" type="submit" value="Create" class="button" id="createCourseBtn"/></a>
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