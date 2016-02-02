<html>
<head>
    <title>Services</title>
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
     
    if(!empty($_POST)) 
    { 
        if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
         
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        $query_params = array( 
            ':username' => $_POST['username'] 
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
          
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
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
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
         
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
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
         
        header("Location: private.php"); 
         
        die("Redirecting to private.php"); 
    } 
     
?> 
        <header>
        <img id="logo" src="assets/clean_clear_logo.png"/>
        <button class="pure-button" id="loginButton">Login</button>

        <div class="pure-menu pure-menu-horizontal" id="navMenu">
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="services.php" class="pure-menu-link menuItem">Our Services</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link menuItem">Why Clean and Clear?</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link menuItem">Contact Us</a></li>
            </ul>
        </div>
        </header>

        <div id="registerFormWrapper">
            <div id="innerForm">
                <h1>Register</h1> 
                <form action="register.php" method="post" id="registerForm"> 
                    <input type="text" name="username" value="" placeholder="Username"/> 
                    <br /><br /> 
                    <input type="text" name="email" value="" placeholder="Email"/> 
                    <br /><br /> 
                    <input type="password" name="password" value="" placeholder="Password"/> 
                    <br /><br /> 
                    <input type="submit" value="Register" /> 
                </form>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            $('html').click(function (e) {
            if (e.target.id == 'registerFormWrapper') {
                window.location.href = "private.php";
            } else {
            }
        });
        </script>
    </body>
</html>