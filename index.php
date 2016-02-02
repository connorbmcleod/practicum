<html>
<head>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 

    require("common.php"); 
     
<<<<<<< HEAD
    $submitted_email = ''; 
=======
    $submitted_username = ''; 
>>>>>>> origin/master
      
    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
<<<<<<< HEAD
                id,
                firstname,
                lastname,  
                password, 
                salt, 
                email 
            FROM users2 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
=======
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
>>>>>>> origin/master
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
             
            header("Location: profile.php"); 
            die("Redirecting to: profile.php"); 
        } 
        else 
        { 
            print("Login Failed."); 
             
<<<<<<< HEAD
            $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
=======
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
>>>>>>> origin/master
        } 
    } 
     
?>

	<div class="header">
		<div class="logo"><img src="logo.png" width="150px"></div>
		<div id="title"><h1>weLearn</h1></div>
	</div><!-- header end-->


		<div class="nav">
			<div class="login">
<<<<<<< HEAD
				<form action="indexcopy.php" method="post" class="">
					<input id="email" name="email" type="text" placeholder="Email" value="<?php echo $submitted_email; ?>"/>
=======
				<form action="index.php" method="post" class="">
					<input id="username" name="username" type="text" placeholder="Username" value="<?php echo $submitted_username; ?>"/>
>>>>>>> origin/master
					<input id="password" name="password" type="password" placeholder="Password" value="">
					<button type="submit" value="Login" class="button" id="login" name="login">Login</button>
				</form>
			<button class="button" id="signup" name="signup">Sign up</button>
			</div>


<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master


<div class="hero">
	<div class="hero-title"><h2>Meet new people, Learn new things</h2></div>
	<div id="index-search">
		<h3>Search for a course</h3>
		<input type="search" placeholder=" Search.." id="search"><img src="images/search.png" width="30px"></input>
	</div>
<<<<<<< HEAD
</div>

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
=======

</div>
>>>>>>> origin/master


</body>
</html>