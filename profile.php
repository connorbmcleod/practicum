<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>WeLearn | Profile</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

<?php 

    require("common.php"); 
     
    
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
         
        die("Redirecting to index.php"); 
    } 
      
?> 

<div class="container">

<p id="hello">Hello <?php echo htmlentities($_SESSION['user']['firstname'], ENT_QUOTES, 'UTF-8'); ?></p>



<?php if($_SESSION['user']['usertype'] == "1"){
  echo "Student";
}
else {
  echo "Teacher";
}; ?>

    <img src="profilePic.png" width="200px">
      BIO: 
    </div>
  </div>

</body>
</html>
