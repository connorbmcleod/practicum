<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <title>About weLearn</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php 

        require("common.php");
         
    ?>

    <div class="hero hero_about">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">About</div> 
            <div class="hero-title">weLearn</div>
        </div>
    </div>

    <!-- content -->
    <!-- content -->

    <div class="content-wrapper" id="about-us-content">
        <p class="vision_stmnt">"&thinsp;&thinsp;Bring a community together with knowledge .&thinsp;"</p>
        <h2 class="about_header">Our Mission</h2>
        <p class="about_paragraph">We want to provide communities with an outlet for them to come together through learning from each other.
        <br />
        <br />
        Everyone has something to share. We want to make a neighbourhood feel like a family. Provide a portal for people with common interest to come together, share their passion and grow with each other.</p>
        <h2 class="about_header">Our Staff</h2>
            
    <div class="pure-g">
            <div class="pure-u-1 pure-u-md-1-3"> 
                <img src="logo.png" width="300px" class="staff_img">
            <h3 class="staff_name">Connor McLeod</h2>
                <p class="about_paragraph">Back end Developer</p>
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                <img src="logo.png" width="300px" class="staff_img">
            <h3 class="staff_name">Darya Shokouhi</h2>
                <p class="about_paragraph">Front End Developer</p>
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                <img src="logo.png" width="300px" class="staff_img">
            <h3 class="staff_name">Kyle Fedorchuk</h2>
                <p class="about_paragraph">UI/UX Designer</p>

            </div>

    </div>
        <div class="join-team">
            <hr />
            <h3>Interested in joining our team? Check out our available positions.</h3>
            <button class="button" id="careers">Careers</button>
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