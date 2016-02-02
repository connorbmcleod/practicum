<html>
<head>
	<title>Services</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Gentium+Basic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/favicon.ico' />
</head>

	<body>

		<?php 
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "cleanclear";

			$connection = mysql_connect($host, $user, $pass) or die ("Unable to Connect");

			mysql_select_db($db) or die ("Unable to select database!");

			$query = "SELECT * FROM services";

			$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

    require("common.php"); 
     
		?>

		<header>

			<?php
			if(empty($_SESSION['user'])) { ?>
			<a href="index.php">
				<img id="logo" src="assets/clean_clear_logo.png"/>
			</a>
			<button class="pure-button" id="loginButton">Login</button> <?php
			}
			else{ ?>
				<a href="private.php">
					<img id="logo" src="assets/clean_clear_logo.png"/>
				</a>
				<p id="hello">Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></p>
		        <form action="logout.php" method="get">
		            <button class="pure-button" id="logoutButton">Logout</button>
		        </form> <?php
			}; ?>
	        <div class="pure-menu pure-menu-horizontal" id="navMenu">
	            <ul class="pure-menu-list">
	                <li class="pure-menu-item"><a href="#" class="pure-menu-link menuItem">Our Services</a></li>
	                <li class="pure-menu-item"><a href="#" class="pure-menu-link menuItem">Why Clean and Clear?</a></li>
	            </ul>
	        </div>
	    </header>

	    <section id="services">
	    	<h1 id="title"> Services </h1>

	    	<?php
				//see if any rows were returned
				if (mysql_num_rows($result) > 0) {
					//yes
					//print them one after another
					
					while($row = mysql_fetch_row($result)) {
						echo "<div id='serviceTable'>";
						echo "<div class='serviceName'><h1 id='serviceTitle'>".$row[1]."</h1></div>";
						echo "<div class='serviceDesc'>" .$row[2]."</div>";
						echo "</div>";
					}
					

				}

				else {
					//no
					//print status message

					echo "no rows found!";
				}
	 		?>

	    </section>

	    <div id="loginForm">

		<form action="index.php" method="post" class="pure-form pure-form-stacked">
    		<fieldset>

        		<label for="email">Username</label>
        		<input type="text" name="username" value="" />

        		<label for="password">Password</label>
        		<input type="password" name="password" value="" /> 

        		<input type="submit" value="Login" /> 
    		</fieldset>
            <a href="register.php">Register</a>
		</form>
		<p id="exitForm">x</p>
	</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>