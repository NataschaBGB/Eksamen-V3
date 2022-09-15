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

        <h2 class="findUs">Find os her</h2>
        <div class="googleMaps" id="googleMap"></div>

        <script>
        function myMap() {
            var mapProp= {
                // where is the map centered by coordinates
                center:new google.maps.LatLng(56.12448447196708, 10.181933500160142),
                // set zoom level
                zoom:15,
            };

            // get map element by ID (id="googleMap" in div) and set it to specifications in function (mapProp)
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            // set new location with coordinates
            var location = new google.maps.LatLng(56.12423330489366, 10.183821775975852);
            // make new variable that contains info on the map marker
            marker = new google.maps.Marker({
                position: location,
                // which map ((var map) element set in div above)
                map: map,
                title: "AspIT København"
            });

            // set marker on "location" variable
            marker.setMap(location)
        }

    </script>

        <!-- link to api key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARNTX4ANhNzXOHmakrwspgk6KtT8w8JSY&callback=myMap"></script>

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
