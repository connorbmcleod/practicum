<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    
    <title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link"> Home</a></li>
                    <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" id="menuLink1" class="pure-menu-link">Courses</a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Browse courses</a></li>
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Request a course</a></li>
                        </ul>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" id="menuLink1" class="pure-menu-link">About us</a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Who are we</a></li>
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="#" class="pure-menu-link"> Contact us</a></li>
                </ul>
            </div> <!-- pure-menu end-->

 <div id="header-stripe">           
    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/logo.gif" width="100px"></a></div>
<!--        <div id="title"><h1>weLearn</h1></div> -->
    </div><!-- header end-->


		<div class="nav">
			<div class="login">
				<form action="index.php" method="post" class="form">
					<input id="email" name="email" type="text" placeholder="Email" value=""/>
					<input id="password" name="password" type="password" placeholder="Password" value="">
					<button type="submit" value="Login" class="button" id="login" name="login">Login</button>
				</form>
			<button class="button" id="signup" name="signup"><a href="registerPage.php">Sign up</a></button>
			</div>

        </div><!-- Nav end-->
</div> <!-- header stripe end -->
<div class="page-header">
	<div class="page-title"><h2>Register</h2></div>	
</div>



                <form action="register.php" method="post" id="registerForm1">
                    <div id="registerFormWrapper1">
                        <input type="text" name="firstname" value="" class="form-field" placeholder=" First Name" autocomplete="off"/> 
                        <br /><br /> 
                        <input type="text" name="lastname" value="" class="form-field" placeholder=" Last Name" autocomplete="off"/> 
                        <br /><br /> 
                    </div> 

                    <div id="registerFormWrapper2">
                        <input type="text" name="email" value="" class="form-field" placeholder=" Email" autocomplete="off"/> 
                        <br /><br /> 
                        <input type="password" name="password" value="" class="form-field" placeholder=" Password" autocomplete="off"/> 
                        <br /><br /> 
                        <input type="submit" value="Register" class="button" id="register2"/>
                    </div>
                </form>

                <div id="registerFormWrapper3">
                	<h4>Go to my profile</h4>
                </div>



<!-- footer -->
    <div class="footer">
            <div class="footer-col" id="footer-one">
  				 <ul id="social-media">
                    <li><a href="#"><img src="images/facebook-square.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/instagram.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/twitter.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/googleplus-square.png" width="30px"></a></li>
                </ul>

       <!--      <div id="footer-buttons">
                    <button class="button" id="browse-courses">Browse courses</button>
                    <button class="button" id="request-courses">Request a course</button>
                </div> -->
                
            </div>

             <div class="footer-col" id="footer-two">
                <p>#555 Seymour st. | 604.1234567 | info@welearn.ca</p>
                <p>Copyright | 2016 | Design by BCIT</p>
             </div>

             <div class="footer-col" id="footer-three">
            </div>

        </div>

    </div>

<!-- footer -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/global.js"></script>
</body>
</html>