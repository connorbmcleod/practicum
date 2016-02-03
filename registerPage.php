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


	<div class="header">
		<div class="logo"><img src="images/logo.png" width="150px"></div>
		<div id="title"><h1>weLearn</h1></div>
	</div><!-- header end-->


		<div class="nav">
			<div class="login">
				<form action="index.php" method="post" class="form">
					<input id="email" name="email" type="text" placeholder="Email" value="<?php echo $submitted_email; ?>"/>
					<input id="password" name="password" type="password" placeholder="Password" value="">
					<button type="submit" value="Login" class="button" id="login" name="login">Login</button>
				</form>
			<button class="button" id="signup" name="signup"><a href="registerPage.php">Sign up</a></button>
			</div>


        	<div class="pure-menu pure-menu-horizontal">
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
        </div><!-- Nav end-->

<div class="page-header">
	<div class="page-title"><h2>Register</h2></div>	
</div>


        <div id="registerFormWrapper1">
            <div id="innerForm">
                <form action="register.php" method="post" id="registerForm1"> 
                    <input type="text" name="firstName" value="" class="form-field" placeholder=" First Name"/> 
                    <br /><br /> 
                    <input type="text" name="lastName" value="" class="form-field" placeholder=" Last Name"/> 
                    <br /><br /> 
                    <input type="password" name="" value="" class="form-field" placeholder=" Password"/> 
                    <br /><br /> 
                    <input type="submit" value="Next" class="button" id="register1"/> 
                </form>
            </div>
        </div>


<div class="register-div">
	    <div id="registerFormWrapper2">
            <div id="innerForm">
                <form action="register.php" method="post" id="registerForm"> 
                    <input type="text" name="username" value="" class="form-field" placeholder=" Username"/> 
                    <br /><br /> 
                    <input type="text" name="email" value="" class="form-field" placeholder=" Email"/> 
                    <br /><br /> 
                    <input type="password" name="password" value="" class="form-field" placeholder=" Password"/> 
                    <br /><br /> 
                    <input type="submit" value="Register" class="button" id="register2"/> 
                </form>
            </div>
        </div>


        <div id="registerFormWrapper3">
        	<h4>Go to my profile</h4>
        </div>
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
</body>
</html>