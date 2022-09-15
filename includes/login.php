<?php
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];
    
    include_once("./connect.php");

    $sql = "SELECT * FROM users WHERE userName = ? AND userPass = ?";

    $stmt = $dbh->prepare($sql);

    $stmt->execute([$username, $userpass]);
    $dbh = NULL;

    // if $row (the variable we collect data from the db to) is empty / if it doesnt exists in the db
    if(empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
        // then send the user back to the front page with an error (?err = noUser)
        header("location: ../index.php?err=noUser");
    }
    // if the user exists in the db
    else {
        // echo "en bruger er fundet!";
        // start session
        session_start();
        // save username from db (userName) in the variable $_SESSION
        $_SESSION['username'] = $row['userName'];
        $_SESSION['userId'] = $row['userId'];
        // and return to the front page
        header("location: ../index.php");
    }
?>