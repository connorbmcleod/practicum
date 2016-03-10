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
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

<div class="hero hero_educator">

<?php 

require("common.php"); 
include 'header.php'; 

if($_SESSION['user']['usertype'] != 2){
    header("Location: index.php");
}
else{
}

?>


    <div id="hero-wrap">
        <div class="hero-title-upper border-bottom">ADMIN</div> 
        <div class="hero-title"></div>
    </div>
    </div>

<?php include 'footer.php'; ?>