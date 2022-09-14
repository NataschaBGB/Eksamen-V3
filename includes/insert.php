<?php

    include_once("./connect.php");
    
    session_start();

    $imgSrc = $_POST['imgSrc'];
    $imgAlt = $_POST['imgAlt'];
    $title = $_POST['heading'];
    $stars = $_POST['stars'];
    $published = $_POST['releaseDate'];
    $username = $_SESSION['userId'];
    $description = $_POST['content'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `product` (`productId`, `title`, `imgSrc`, `imgAlt`, `releaseDate`, `description`, `userId`, `stars`, `category`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    
    $stmt = $dbh->prepare($sql);

    $stmt->execute([NULL, $title, $imgSrc, $imgAlt, $published, $description, $username, $stars, $category]);

    $dbh = NULL;
    

    header("location: ../products.php");
?>