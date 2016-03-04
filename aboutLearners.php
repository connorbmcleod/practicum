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
    <div id="about-learners-content">
        <div id="join">
            <h2>Join Now</h2>
        </div>

        <div id="learners">
            <p class="about_paragraph learner_lines">WeLearn offers a way for everyone in a community to share their skills and learn from eachother. Start now by signing up for free.</p>
            <a href="registerPage.php">
            <button class="button" id="signup" name="signup">Sign up</button></a>
            <p class="about_paragraph learner_lines">As a learner, you get to browse the offered courses and register for them. Our courses are offered by individuals who have interest and experience in that field. Courses are 1-hour long. Each course requires a $15 register fee.</p>
            <p class="about_paragraph learner_lines">To begin, you can look up the courses in your local area.</p>
                <button class="go-to-courses"><a href="allCourses.php">Browse Courses</a></button>
            <div>

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