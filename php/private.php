<html>
<head>
    <title>Clean and Clear Window Washing</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Gentium+Basic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/favicon.ico' />
</head>

<body>

<?php 

    require("common.php"); 
     
    
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
         
        die("Redirecting to index.php"); 
    } 
      
?> 

        
        
<header>
        <a href="private.php">
            <img id="logo" src="assets/clean_clear_logo.png"/>
        </a>
        <form action="logout.php" method="get">
            <button class="pure-button" id="logoutButton">Logout</button>
        </form>
        <form action="edit_account.php" method="get">
            <button class="pure-button" id="customerButton">Edit Information</button>
        </form>
        
        <p id="hello">Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="pure-menu pure-menu-horizontal" id="navMenu">
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="services.php" class="pure-menu-link menuItem">Our Services</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link menuItem">Why Clean and Clear?</a></li>
            </ul>
        </div>

        <div id="header-text">
            <h1> Clean and Clear </h1> 
            <h2> Window Washing </h2>
        </div>

        <div id="actionCenter">
            <div id="actionContainer">
                <form class="pure-form" id="callToAction">
                    <select id="package">
                            <option disabled selected>Select a Package</option>
                            <option>Standard</option>
                            <option>Premium</option>
                            <option>Supreme</option>
                    </select>

                    <button type="submit" class="pure-button pure-button-primary" id="actionButton">Get Clean!</button>
                </form>
            </div>
        </div>

    </header>

    <div id="loginForm">

        <form action="index.php" method="post" class="pure-form pure-form-stacked">
            <fieldset>

                <label for="email">Username</label>
                <input type="text" name="username" value="<?php echo $submitted_username; ?>" />

                <label for="password">Password</label>
                <input type="password" name="password" value="" /> 

                <input type="submit" value="Login" /> 
            </fieldset>
            <a href="register.php">Register</a>
        </form>
        <p id="exitForm">x</p>
    </div>

    <section id="footer">
        <p>Copyright 2015 Clean and Clear</p>
        <div id="social-media">
            <img id="facebook" src="assets/facebook.png">
            <img id="twitter" src="assets/twitter.png">
        </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>