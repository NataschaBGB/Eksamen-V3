<?php

    include_once("./connect.php");
    
    session_start();

    // image selector
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["imgSrc"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgSrc"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["imgSrc"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }
    else {
        if (move_uploaded_file($_FILES["imgSrc"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["imgSrc"]["name"])). " has been uploaded.";
        }
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // connect every bit of data to the db
    $imgAlt = $_POST['imgAlt'];
    $title = $_POST['heading'];
    $stars = $_POST['stars'];
    $published = $_POST['releaseDate'];
    $username = $_SESSION['userId'];
    $description = $_POST['content'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `product` (`productId`, `title`, `imgSrc`, `imgAlt`, `releaseDate`, `description`, `userId`, `stars`, `category`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = $dbh->prepare($sql);

    $stmt->execute([NULL,  $title, $target_file, $imgAlt, $published, $description, $username, $stars, $category]);

    
    $dbh = NULL;

    // return to products page
    header("location: ../products.php");
?>