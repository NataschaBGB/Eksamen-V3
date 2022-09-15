<?php
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forside | FancyClothes.dk</title>
    <meta name="description" content="Velkommen til FancyClothes.dk">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        
        <?php
            // if session is active / if user is logged in
            if(isset($_SESSION['username'])) {
                // echo this welcome message
                echo "<h2>Velkommen " . $_SESSION['username'] . "</h2>";
            }
        ?>

    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="active"><a href="index.php">Forside</a></li>
                <li><a href="products.php">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>
                <?php
                // if username is not set (if no one is logged in) -----
                if(!isset($_SESSION['username'])) { ?>
                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                    <?php
                    // if ?err (in login.php) is active AND ?err is equal to "noUser"
                        if(isset($_GET['err']) && $_GET['err'] == "noUser") {
                            // then ehco this message
                            echo "<span class='loginError'>Fejl i login <br> Ingen bruger fundet</span>";
                        }
                    ?>
                    <!-- ----- show this login form -->
                    <li><a href='./register.php' class='loginBtn'>Opret bruger</a></li>
                    <form action="./includes/login.php" method="post">
                        <div class="login container">
                            <label for="username">Bruger:</label>
                            <input type="text" id="username" name="username" placeholder="Brugernavn"   required>
                            <label for="userpass">Kodeord:</label>
                            <input type="Password" id="userpass" name="userpass" placeholder="Kodeord" required>
                            <input type="submit" value="Log ind">
                            
                    <?php }
                        // if username is set (someone is logged in) - show this instead
                        else {
                            echo "<li class=''><a href='./includes/logout.php'>Log out</a></li>" . "<div class='basket'>
                            <div class='basketContent'>
                                <p>Din indkøbskurv er tom</p>
                            </div>
                            <div class='shopIcon'>
                                <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                            </div>
                        </div>" ;
                        } ?>
                        </div>
                    </form>
            </ul>
        </nav>
    </div>

    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/slider.min.js"></script>
    