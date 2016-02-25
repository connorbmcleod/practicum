<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Our Learners</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 

        require("common.php"); 
         
    ?>

    <div class="hero hero_ourlearners">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">Our</div> 
            <div class="hero-title">Learners</div>
        </div>
    </div>


    <!-- content -->
    <div id="about-us-content">
        <div class="cols" id="who">
            <h2 class="about_header">Join Now</h2>
        </div>

        <div class="cols" id="how">
            <p class="about_paragraph learner_lines">You start by signing up with us</p>
            <a href="registerPage.php"><button class="button" id="signup" name="signup">Sign up</button></a>
            <p class="about_paragraph learner_lines">There are courses and stuff you can look up</p>
            <div>
                <input type="search" placeholder=" Search.." id="search"><img src="images/search.png" width="35px"></input>
            </div>  
            <p>There's a small fee for each course and stuff</p>
            <p>You can update courses on your profile</p>
        </div>
    </div>

<!-- content -->


<!-- footer -->

   <?php include 'footer.php'; ?>

<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>