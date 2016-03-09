 <html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>Our Educators</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 
        require("common.php"); 
    ?>

    <div class="hero hero_oureducators">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">Our</div> 
            <div class="hero-title">Educators</div>
        </div>
    </div>


    <!-- content -->
    <div class="content-wrapper educator-wrapper">
        <h2 class="about_header">Our Educators</h2>
        <p class="about_paragraph">Welearn is designed to allow neighbours to teach neighbours in a community.  Every person in every community has a knowledge, skill or ability that is valuable to others.  The welearn website provides a platform where community members can come together around learning.</p>
        <p></p>
        <h2 class="about_header">How It Works</h2>
        <p class="about_paragraph">As an educator you can create any class that you would like to instruct.   If you have a unique knowledge, skill or ability that you would like to share with others, build it into a class! For every student that signs up to your class you will receive $12.</p> 

        <ul class="steps">
            <li>Complete your profile</li>
            <li>Cerate a class</li>
                <ul class="steps2">
                    <li>Class title</li>
                    <li>Brief description</li>
                    <li>5 learning outcomes that students will learn over the course of the one hour class</li>
                </ul>
            <li>Decide how many student can attend the class</li>
                <ul class="steps2">
                    <li>Min = How many students needed until the class becomes active</li>
                    <li>Max = How many students needed until the class becomes full</li>
                </ul>
            <li>Decide where the class will take place</li>
        </ul>


        <ul id="articles">
            <li class="article1"><a href="http://www.adprima.com/tipson.htm" target="_blank">Tips on becoming a teacher</a></li>
            <li class="article2"><a href="http://www.gophersport.com/blogentry/10-things-to-know-before-you-start-teaching" target="_blank">10 things to know before you start teaching</a></li>
            <li class="article3"><a href="https://www.teachingchannel.org/videos/class-starting-teaching-strategy" target="_blank">"Do Now" Strategy</a></li>
            <li class="article4"><a href="https://www.youtube.com/watch?v=wqe8C7dwViE" target="_blank">Why become a teacher</a></li>
            <li class="article5"><a href="https://www.youtube.com/watch?v=VfK7tfDCSIk" target="_blank">Ways to be an excellent teacher</a></li>
        </ul>


         <div class="profile-buttons">
             <?php

                if(empty($_SESSION['user'])){
                    echo '<a href="registerPage.php"><button class="button" id="become-educator">Sign Up</button></a>';
                }
                else{
                    if($_SESSION['user']['usertype'] == 0){
                        echo '<a href="becomeeducator.php"><button class="button" id="become-educator">Become an Educator</button></a>';
                    }
                }
            ?>
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