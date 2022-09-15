<?php 
    $serverName = "localhost";
    $dbName = "fancyclothes";
    $userName = "root";
    $password = "";

    try {
        // try to connect to the host and db
    $dbh = new PDO('mysql:host=localhost;dbname=fancyclothes; charset=utf8', $userName, $password);
    
    // if it works
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Knæhøj karse!";
    }
    // if it doesnt work
    catch(PDOException $e) {
        // tell me what went wrong (getMessage)
        echo "Connection failed: " . $e->getMessage();
    }
?>