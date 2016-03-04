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
        <p class="about_paragraph">WeLearn educators are people in your community who have a passion for a subject and want to share that passion with others. If you have a skill that you want to share with others in your community then dont wait, begin teaching a class of your own.</p>
        <p></p>
        <h2 class="about_header">Become an Educator</h2>
        <p class="about_paragraph">Setting up your own class is simple. As long as you are a member you can become an educator. Once becoming an educator, you can add and delete your own classes as well as add a bio to your profile and have it display for learners who may be interested in your class.</p> 
        <p class="about_paragraph">Never taught before? Don't let that stop you. Below you will find referance material on how to effectively set-up and teach your course. </p>


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