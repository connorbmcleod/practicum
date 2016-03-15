<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>WeLearn - Learners</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
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
    <div class="content-wrapper educator-wrapper">
        <div class="educators_header">
            <h2>About Learners</h2>
        </div>

        <div id="learners">
            <p class="about_paragraph">Welearn is designed to allow neighbours to teach neighbours in a community.  Every person in every community has a knowledge, skill or ability that is valuable to others.  The welearn website provides a platform where community members can come together around learning.</p>


            <div class="educators_header">
                <h2>How it works</h2>
            </div>
                     <p class="about_paragraph">As a student you can browse the classes that are being offered in your community. If you find one that interest you, you can sign up.  Once there is sufficient enrolment the class becomes active and is provided to the students.  Each class is 1 hour in length and costs $15.</p>


                            <div class="educators_header">
                                <h2>Steps</h2>
                            </div> 
                                <p>
            
                                1.      Complete your profile.<br>

                                2.      Find a course (or courses) of interest.<br>

                                3.      Note the location where the class is being held.<br>

                                4.      Enroll in the class or classes of interest, and pay your class fee.<br>

                                5.      Monitor the class to see when it changes from pending to active (encourage your friends to join you to have the class become active quicker (you will receive email alerts of for upcoming courses that you are enrolled).<br>

                                6.      Go to your class and have a great time!<br>

                                7.      Explore the site for your next class.<br><br><br>  
                               
                                To begin, you can sign up OR browse the courses in your local area.</p>                     
                                    
    </div>
</div>

                                <div id="learners-buttons">
                                    <a href="registerPage.php">
                                        <button class="button" id="signup" name="signup">Sign up</button>
                                    </a>
                                    <button class="go-to-courses"><a href="allCourses.php">Browse Courses</a></button>
                                </div>
<!-- content -->


<!-- footer -->



<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>

   <?php include 'footer.php'; ?>

</html>