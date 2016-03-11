<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Carme|Work+Sans:400,700,300|Roboto:400,700,300,700italic,300italic' rel='stylesheet' type='text/css'>
    <title>WeLearn</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/weLearn-logo-black.png" type="image/png" sizes="16x16 20x20">
</head>
<body>

<?php 

    require("common.php");
    $courseid = $_GET["id"]; 

    $query = " 
                SELECT 
                    studentID 
                FROM enrollments 
                WHERE 
                    courseID = '$courseid'  
                "; 
                 
                try 
                { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute(); 
                } 
                catch(PDOException $ex) 
                {  
                    die("Failed to run query: " . $ex->getMessage()); 
                } 

                $row = $stmt->fetchAll();

                $count = count($row);

                $id = array();

                for($i = 0; $i < $count; $i++) {
                    array_push($id, $row[$i]['studentID']);
                }


                $ids = array();

                for($i = 0; $i < $count; $i++) {
                    $query = " 
                        SELECT 
                            email
                        FROM users 
                        WHERE 
                            id = $id[$i]  
                    "; 
                     
                    try 
                    { 
                        $stmt = $db->prepare($query); 
                        $result = $stmt->execute(); 
                    } 
                    catch(PDOException $ex) 
                    {  
                        die("Failed to run query: " . $ex->getMessage()); 
                    } 

                    array_push($ids, $stmt->fetch());
                }

                $counts = count($row);


?>

<style>

#roster {
	border: 1px solid black;
	margin: 100px auto;
	width: 500px;
}

#roster td {
	padding: 10px;
	text-align: center;
	border-left: 1px solid black;
}

.rostertop {
	border-bottom: 1px solid black;
}

</style>

<div class="hero hero_courses">

<?php include 'header.php'; ?>

<gcse:search></gcse:search>
	<div id="hero-wrap">
        <div class="hero-title-upper border-bottom">Class</div> 
        <div class="hero-title">Roster</div>
    </div>
</div>

<table id="roster">
<tr>
	<td class="rostertop">Number</td>
	<td class="rostertop">Email</td>
</tr>
<?php

for($e=0; $e < $counts; $e++){ ?>

	<tr>
		<td><?php echo $e + 1; ?></td>
		<td><?php echo $ids[$e]['email'] ?></td>
	</tr>


<?php } ?>

</table>

  	<?php include 'footer.php'; ?>

<!-- footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/global.js"></script>
</body>
</html>