<?php
    include_once "header.php";
?>

    <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="#">Jakker</a></li>
                        <li><a href="#">Bukser</a></li>
                        <li><a href="#">Skjorter</a></li>
                        <li><a href="#">Strik</a></li>
                        <li><a href="#">T-shirts & Tank tops</a></li>
                        <li><a href="#">Tasker</a></li>
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

                // vælg alt* fra tabellen gamingarticle i databasen gamingwebsite
                $sql = "SELECT product.*, users.userName FROM product JOIN users ON product.userId = users.userId";

                // prepare alt data
                $stmt = $dbh->prepare($sql);

                // execute det prepared data
                $stmt->execute();

            
                // mens der stadig er rækker i databasen, skal den kører igennem og indsætte data fra dem i en ny række
                // hiv 1 række ud og gem det i variablen $row
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <!-- en article sat ind i loopet, så den generer en ny article for hver række i databasen -->
                    <article>
                        <img src="./img/<?php echo $row['imgSrc']; ?>" alt="<?php echo $row['imgAlt']; ?>">
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
                                <p>Oprettet: <?php echo $row['releaseDate']; ?> af <?php echo $row['userName'] ?></p>
                            </div>
                        </div>
                            <p class="description">$<?php echo $row['description']; ?>
                            <a href="#">Læs mere...</a></p>
                            <p class="category">Kategori: <?php echo $row['category']; ?></p>
                    </article>
                <?php
                }
                ?>
                
            </div>
        </div>
    </main>

    <?php
        include_once "footer.php";
    ?>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->



    <!-- Add your site or application content here -->

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
</body>

</html>
