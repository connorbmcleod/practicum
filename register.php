<?php 

    require("common.php"); 
     
    if(!empty($_POST)) 
    { 
        if(empty($_POST['firstname'])) 
        { 
            die("Please enter your First Name."); 
        }

        if(empty($_POST['lastname'])) 
        { 
            die("Please enter you Last Name."); 
        } 
         
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        } 
          
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email is already in use"); 
        }  
         
        $query = " 
            INSERT INTO users ( 
                firstname,
                lastname, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :firstname,
                :lastname, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
         
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        $query_params = array( 
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        header("Location: index.php"); 
         
        die("Redirecting to index.php"); 
    } 
     
?> 