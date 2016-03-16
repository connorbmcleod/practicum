<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>WeLearn - Become an Educator</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
</div><!-- Header end -->

    <?php endif;

    $userID = $_SESSION['user']['id'];
    $teacherfirstname = $_SESSION['user']['firstname'];
    $teacherlastname = $_SESSION['user']['lastname'];
         
        if(!empty($_POST)) 
        { 
            if(empty($_POST['bio'])) 
    	        { 
    	            die("Please enter your Bio."); 
    	        }

            if(empty($_POST['location'])) 
    	        { 
    	            die("Please enter your location"); 
    	        }  
             
            $query = " 
                INSERT INTO educatorinfo (
                    id,
                    teacherfname,
                    teacherlname, 
                    bio,
                    location 
                ) VALUES (
                    '$userID',
                    '$teacherfirstname',
                    '$teacherlastname',
                    :bio,
                    :location
                )
            "; 
             
             
            $query_params = array( 
                ':bio' => $_POST['bio'],
                ':location' => $_POST['location'], 
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

            $queryupdate = "UPDATE users
    					    SET usertype=1
    					    WHERE id='$userID'";
            try 
            { 
                $stmt = $db->prepare($queryupdate); 
                $result = $stmt->execute(); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 

            $_SESSION['user']["usertype"] = 1;
            header("Location: myprofile.php");
        } 
         
    ?> 

    <div class="content-wrapper" id="become-educator-content">
        <form action="becomeeducator.php" method="post" id="becomeEducator">
        	<input type="textarea" name="bio" value="" class="form-field" placeholder=" Tell us about yourself"/> 
            <br /><br /> 
            <input type="text" name="location" value="" class="form-field" placeholder=" Location"/>
            <br /><br /> 
            <input type="submit" value="Submit" class="button" id="createCourseBtn"/>
        </form>
    </div>

    <!--FOOTER -->
    <?php include 'footer.php'; ?>
    <!--End Footer-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>