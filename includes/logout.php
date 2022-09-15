<?php
    // start session to destroy session
    session_start();
    // destroy session to log out
    session_destroy();
    // return user to the front page
    header("location: ../index.php");
?>