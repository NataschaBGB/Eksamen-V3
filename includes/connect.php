<?php 
    $serverName = "localhost";
    $dbName = "fancyclothes";
    $userName = "root";
    $password = "";

    try {
        // prøv at connecte til min host og databasen
    $dbh = new PDO('mysql:host=localhost;dbname=fancyclothes; charset=utf8', $userName, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Knæhøj karse!";
    }
    // hvis det ikke virker, så fortæl (getMessage) hvad der gik galt
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>