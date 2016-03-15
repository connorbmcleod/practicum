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
                <div id="welcome">
                    <?php if($_SESSION['user']['usertype'] == 1){ ?>
                    <a href='myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                <?php }
                    else { ?>
                        <a href='userprofile.php'><p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php } ?>
                </div>
                    <div class="dropdown">
                      <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                      <div class="dropdown-content">
                        <a href="userprofile.php">My Profile</a>
                        <a href="edit_account.php">Edit Profile</a>
                        <a href="#"><form id="logout-form" action="logout.php">
                        <button type="submit" id="logout">Logout</button></a>
                        </form>
                      </div>
                    </div>
            </div>
        </div> <!-- Header end -->

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
    <form action="becomeeducator.php" method="post" id="becomeEducator">
    	<input type="textarea" name="bio" value="" class="form-field" placeholder=" Tell us about yourself"/> 
        <br /><br /> 
        <input type="text" name="location" value="" class="form-field" placeholder=" Location"/>
        <input type="submit" value="Submit" class="button" id="createCourseBtn"/>
    </form>

    <!--FOOTER -->
    <?php include 'footer.php'; ?>
    <!--End Footer-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>