<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
    <title>WeLearn - Contact Us</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

    <?php 

        require("common.php"); 
         
    ?>

    <div class="hero hero_contact">

        <?php include 'header.php'; ?>

        <div id="hero-wrap">
            <div class="hero-title-upper border-bottom">Get in</div> 
            <div class="hero-title">touch</div>
        </div>
    </div>

<!-- content -->

    <div class="contact_wrapper" id="about-us-content">
        <div class="general-inquiry">
            <p><a href="mailto:info@welearn.ca">info@welearn.ca</a></p>
            <br>
                <p><strong>Address</strong></p>
                    <p>#555 Seymour Street,
                    Vancouver, BC, V9L0C8</p>
        </div>


        <div id="social_media_contact">
               <ul class="soc">
                        <li><a class="soc-twitter" href='#'></a></li>
                        <li><a class="soc-instagram" href="#"></a></li>
                        <li><a class="soc-linkedin" href="#"></a></li>
                        <li><a class="soc-youtube" href="#"></a></li>
                        <li><a class="soc-facebook soc-icon-last" href="#"></a></li>
                    </ul>

        </div>


        <form id='contact-form' action="send_form_email.php" method="post" target="_blank">
            <input type="text" name="name" placeholder="Full Name" id="name"><br>
            <input type="email" name="email" placeholder="Email" id="email"><br>
            <textarea name="message" placeholder="Message.." id="message"></textarea><br>
            <input type="submit" value="Submit" id="submit-button">
        </form>
    </div>
<!-- content -->

<!-- footer -->

    <?php include 'footer.php'; ?>

<!-- footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>