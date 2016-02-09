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
     
    $submitted_email = ''; 
      
    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                id,
                firstname,
                lastname,  
                password, 
                salt, 
                email,
                usertype 
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
             
            $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
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
                </ul>

            </div> <!-- pure-menu end-->

            
	<div class="header">
		<div class="logo"><a href="index.php"><img src="images/logo.gif" width="100px"></a></div>
<!-- 		<div id="title"><h1>weLearn</h1></div> -->
	</div>

    <div id="profile-search">
        <input type="search" placeholder=" Search.." id="search"><img src="images/search.png" width="35px"></input>
    </div>


<div class="hero" id="other-hero">
	<div class="hero-title"></div>
</div>

<!-- header end-->



<!-- content -->
<div id="all-courses-search">
    <input type="search" placeholder=" Search.." id="course-page-search">
        <img src="images/search.png" width="43px">
    </input>
</div>

<div class="posted-courses">
    

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