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
        <p class="about_paragraph">Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.</p>
        <h2 class="about_header">Become an Educator</h2>
        <p class="about_paragraph">Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.Lorem ipsum blah blah yes no partially ok.<br>
        We have a few tips for you, if you are planning on becoming an educator. Here are links to the articles that are helpful:</p>
        <ul>
            <li><a href="http://google.com">Article 1</a></li>
            <li><a href="http://google.com">Article 2</a></li>
            <li><a href="http://google.com">Article 3</a></li>
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