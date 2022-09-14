<?php
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];
    
    include_once("./connect.php");

    $sql = "SELECT * FROM users WHERE userName = ? AND userPass = ?";

    $stmt = $dbh->prepare($sql);

    $stmt->execute([$username, $userpass]);
    $dbh = NULL;

    // hvis $row (den variabel vi henter data fra db ned til) er tom (altså den ikke eksisterer i databasen)
    if(empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
        // så send brugeren tilbage til forsiden, men med en fejl (?err = noUser)
        header("location: ../index.php?err=noUser");
    }
    // hvis brugeren eksisterer i databasen
    else {
        echo "en bruger er fundet!";
        // start session
        session_start();
        // gem brugernavn fra databasen (userName) i variabel $_SESSION
        $_SESSION['username'] = $row['userName'];
        $_SESSION['userId'] = $row['userId'];
        // og retuner til forsiden
        header("location: ../index.php");
    }
?>