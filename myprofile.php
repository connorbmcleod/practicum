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

    if(empty($_SESSION['user'])) 
        { 
            header("Location: index.php"); 
             
            die("Redirecting to index.php"); 
        } 
      
    $firstname = $_SESSION['user']['firstname'];
    $lastname = $_SESSION['user']['lastname'];
     
?>
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
                     <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a href="#" id="arrow" class="pure-menu-link"><img src="images/menu-arrow.png" width="30px"></a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">My Profile</a></li>
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">My Account</a></li>
                            <li class="pure-menu-item"><a href="#" class="pure-menu-link">Settings</a></li>
                        </ul>
                    </li>

                </ul>

            </div> <!-- pure-menu end-->

            
	<div class="header">
		<div class="logo"><a href="index.php"><img src="images/logo.gif" width="70px"></a></div>
<!-- 		<div id="title"><h1>weLearn</h1></div> -->
	</div><!-- header end-->


    <div id="profile-search">
        <input type="search" placeholder=" Search.." id="search"><img src="images/search.png" width="35px"></input>
    </div>


<div class="hero" id="other-hero">
	<div class="hero-title"></div>
</div>

<!-- content -->
<div id="profile-name">
    <h2><strong><?php echo $firstname . ' ' . $lastname; ?></strong></h2>
        <h5>Vancouver, BC</h5>
            <hr>
</div>

<div class="left" id="profile-left">
        <div class="bio">
            <h3><strong>BIO</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
        et augue interdum, facilisis leo consequat, posuere sem. Ut sed
        leo vel tellus faucibus euismod. In et enim cursus, rhoncus libero
        sed, ornare elit. Sed nec quam rutrum, interdum augue vitae, porttitor
        purus. Aliquam et ipsum risus.</p>
        </div>

        <div class="hobbies">
            <h3><strong>HOBBIES</strong></h3>
            <ul>
                <li>This</li>
                <li>That</li>
                <li>And That</li>
            </ul>
        </div>

        <div class="skills">
            <h3><strong>SKILLS</strong></h3>
            <ul>
                <li>Mushrooming</li>
                <li>Gardening</li>
                <li>Hair Flipping</li>
            </ul>
        </div>
</div>
<div class="right" id="profile-right">
    <div class="past-classes">
        <h2> Upcoming Classes </h2>
        <div class="class-wrapper">

        </div>
        <button class="button" id="see-all">See All</button>
    </div>
</div>
<!-- content -->

<!-- footer -->
    <div id="index-footer">
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