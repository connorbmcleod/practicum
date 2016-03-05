<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Register Page</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 

    require("common.php"); 
     
?>

<?php
if(empty($_SESSION['user'])) : ?>

    <div class="header register_header">
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo-black.png" width="200px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link" id="form-header"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allCourses.php" class="pure-menu-link" id="form-header">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" class="pure-menu-link" id="form-header">About us</a>
                        <ul class="pure-menu-children" id="form-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who are we</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link" id="form-header"> Contact us</a></li>
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
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo-black.png" width="200px"></a></div>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link"> Home</a></li>
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

<div class="page-header">
	<div class="page-title"><h2>Register</h2></div>	
</div>



                <form action="register.php" method="post" id="registerForm1">
                    <div id="registerFormWrapper1">
                        <input id="firstname" type="text" name="firstname" value="" class="form-field" placeholder=" First Name" autocomplete="off"/> 
                        <br /><br /> 
                        <input id="lastname" type="text" name="lastname" value="" class="form-field" placeholder=" Last Name" autocomplete="off"/> 
                        <br /><br /> 
                        <input id="emails" type="text" name="email" value="" class="form-field" placeholder=" Email" autocomplete="off"/> 
                        <br /><br /> 
                        <input id="pswrd" type="password" name="password" value="" class="form-field" placeholder=" Password" autocomplete="off"/> 
                        <br /><br /> 
                        <input id="confirmpswrd" type="password" name="password" value="" class="form-field" placeholder=" Confirm Password" autocomplete="off"/> 
                        <br /><br /> 
                        <input type="submit" value="Register" class="button" id="register2"/>
                    </div>
                </form>

                <div id="registerFormWrapper3">
                	<h4>Go to my profile</h4>
                </div>



<!-- footer -->
   
    <?php include 'footer.php'; ?>

<!-- footer -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/global.js"></script>
</body>
</html>