<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>

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
        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 
     
    if(!empty($_POST)) 
    { 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
          
        if($_POST['email'] != $_SESSION['user']['email']) 
        { 

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
                die("This E-Mail address is already in use"); 
            } 
        } 
         
        if(!empty($_POST['password'])) 
        { 
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $_POST['password'] . $salt); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $password = hash('sha256', $password . $salt); 
            } 
        } 
        else 
        { 
            $password = null; 
            $salt = null; 
        } 
         
        $query_params = array( 
            ':email' => $_POST['email'], 
            ':user_id' => $_SESSION['user']['id'], 
        ); 
          
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            $query_params[':salt'] = $salt; 
        } 
         
        $query = " 
            UPDATE users 
            SET 
                email = :email 
        "; 
         
        if($password !== null) 
        { 
            $query .= " 
                , password = :password 
                , salt = :salt 
            "; 
        } 
         
        $query .= " 
            WHERE 
                id = :user_id 
        "; 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $_SESSION['user']['email'] = $_POST['email']; 
         
        header("Location: private.php"); 
         
        die("Redirecting to private.php"); 
    } 
     
?> 

<div class="hero hero_about">

<?php include 'header.php'; ?>



    <div id="hero-wrap">
        <div class="hero-title-upper border-bottom">Edit</div> 
        <div class="hero-title">Account</div>
    </div>
</div>







            <div id="accountFormWrapper" class="content-wrapper">
                <div id="innerForm">
                    <h1>Edit Account</h1> 
                    <form action="edit_account.php" method="post"> 
                        Name:<br /> 
                        <b><?php echo $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname']; ?></b> 
                        <br /><br />
                        Current Email:<br /> 
                        <b><?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?></b> 
                        <br /><br />  
                        New E-Mail Address:<br /> 
                        <input type="text" name="email" value="" />
                        <br /><br /> 
                        New Password:<br /> 
                        <input type="password" name="password" value="" /><br /> 
                        <i>(leave blank if you do not want to change your password)</i> 
                        <br /><br /> 
                        <input class="update_button" type="submit" value="Update Account" /> 
                    </form>
                </div>
            </div>


<div class="footer">
            <div class="footer-col" id="footer-one">
            </div>

             <div class="footer-col" id="footer-two">
                 <p>#555 Seymour Street | info@welearn.ca</p>
                <p>2016 | DACOKYE DESIGN</p>
             </div>

             <div class="footer-col" id="footer-three">
                <ul id="social-media">
                    <li><a href="#"><img src="images/facebook-square.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/instagram.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/twitter.png" width="30px"></a></li>
                    <li><a href="#"><img src="images/googleplus-square.png" width="30px"></a></li>
                </ul>
            </div>

        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
            $('html').click(function (e) {
            if (e.target.id == 'accountFormWrapper') {
                window.location.href = "private.php";
            } else {
            }
        });
        </script>
    </body>
</html>