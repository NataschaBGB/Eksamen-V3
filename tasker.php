<?php
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Produkter | FancyClothes.dk</title>
    <meta name="description" content="Velkommen til FancyClothes.dk - Produkter, Tasker">
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
            // if session is active / if a user is logged in
            if(isset($_SESSION['username'])) {
                // echo this welcome message
                echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
            }
        ?>

    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <!-- class="active" doesnt work on a (normalize.css line 98) -->
                <li><a href="index.php">Forside</a></li>
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
                            // echo this error message
                            echo "<span class='loginError'>Login error <br> No user found</span>";
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

    <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="jakker.php">Jakker</a></li>
                        <li><a href="bukser.php">Bukser</a></li>
                        <li><a href="skjorter.php">Skjorter</a></li>
                        <li><a href="strik.php">Strik</a></li>
                        <li><a href="sko.php">Sko</a></li>
                        <li><a href="tanktops.php">T-shirts & Tank tops</a></li>
                        <li><a href="tasker.php">Tasker</a></li>
                    </ul>
                </div>
            </div>

            <div class="newsletter">
                <div class="newsTop">
                    <h4>Tilmeld nyhedsbrev</h4>
                </div>
                <div class="newsMain">
                    <form action="">
                        <input type="text" placeholder="Navn">
                        <input type="email" placeholder="Email">
                </div>
                <div class="newsBottom">
                    <input type="submit" value="Tilmeld">
                    </form>
                </div>
            </div>
        </aside>
        <div class="products">
            <h3>INSPIRATION</h3>
            <hr>
            <div class="inspiration">
                <div class="catMen">
                    <img src="img/kategoriHerre.jpg" alt="">
                    <h5>Herretøj</h5>
                    <div class="action">Lær mere</div>
                </div>
                <div class="catWomen">
                    <img src="img/kategoriKvinde.jpg" alt="">
                    <h5>Kvindetøj</h5>
                    <div class="action">Lær mere</div>
                </div>
            </div>


            <div class="frontProducts">
            <?php
                require_once './includes/connect.php';

                // choose all* from table product in the db fancyclothes
                $sql = "SELECT * FROM product WHERE category = 'tasker'";

                // prepare all data
                $stmt = $dbh->prepare($sql);

                // execute the prepared data
                $stmt->execute();

            
                // while there is still rows in the db, run through them all and insert them into a new row on the webpage
                // take one row at a time and save it in the $row variable
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <!-- article in the loop so it generates a new article for each row in the db -->
                    <article>
                        <img src="img/<?php echo $row['imgSrc']; ?>" alt="<?php echo $row['imgAlt']; ?>">
                        <div class="info">
                            <h3 class="title"><?php echo $row['title']; ?></h3>
                            <div class="stars">
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star-o' aria-hidden='true'></i>
                                <i class='fa fa-star-o' aria-hidden='true'></i>
                            </div>
                        </div>
                        <div class="description">
                            <div class="published">
                                <p>Oprettet: <?php echo $row['releaseDate']; ?></p>
                            </div>
                        </div>
                            <p class="description">$<?php echo $row['description']; ?>
                            <a href="#">Læs mere...</a></p>
                            <p class="category">Category: <?php echo $row['category']; ?></p>
                    </article>
                <?php
                }
                ?>
                
            </div>
        </div>
    </main>

    <?php
        require_once "newArticle.php";
    ?>



    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/slider.min.js"></script>
    <script src="js/myScript.js"></script>
    <script>
        $(window).on("load", function() {
            $("#slider").slider();
        });
    </script>

<?php
    include_once "footer.php";
?>  