<html>
<head>
	<title>Clean and Clear Window Washing</title>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Gentium+Basic' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php 

    require("common.php"); 
     
    $submitted_username = ''; 
      
    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
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
         
        $login_ok = false; 
         
        $row = $stmt->fetch(); 
        if($row) 
        { 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                $login_ok = true; 
            } 
        } 
         
        if($login_ok) 
        { 
            unset($row['salt']); 
            unset($row['password']); 
             
            $_SESSION['user'] = $row; 
             
            header("Location: private.php"); 
            die("Redirecting to: private.php"); 
        } 
        else 
        { 
            print("Login Failed."); 
             
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?>

	<header>
		<img id="logo" src="assets/clean_clear_logo.png"/>
		<button class="pure-button" id="loginButton">Login</button>

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
        <div id="innerForm">
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
        </div>
	</div>

   <div id="footer">
        <p>Copyright 2015 Clean and Clear</p>
        <div id="social-media">
            <img id="facebook" src="assets/facebook.png">
            <img id="twitter" src="assets/twitter.png">
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>