<?php
    include_once "header.php";
?>


<main>
    <form action="" method="post" class="new">
    <h1>Create New User</h1>
        <div class="lbl">
            <label for="imgSrc">Enter user name</label>
            <div class="input">
                <input type="text" name="newUserName" placeholder="Example: Natascha">
            </div>
        </div>

        <div class="lbl">
            <label for="imgAlt">Enter password again</label>
            <div class="input">
                <input type="password" id="newPassword2" name="newPassword2" placeholder="">
            </div>
        </div>

        <div class="lbl">
            <label for="imgAlt">Enter desired password</label>
            <div class="input">
                <input type="password" id="newPassword1" name="newPassword1" placeholder="">
            </div>
        </div>


        <?php
            // hvis username og password x 2 er indtastet
            if(isset($_POST['newUserName'])) {
                $newUserName = $_POST['newUserName'];
                $newPassword1 = $_POST['newPassword1'];
                $newPassword2 = $_POST['newPassword2'];

                // og begge passwords matcher
                if($newPassword1 === $newPassword2) {
                    // opret en ny bruger med det valgte navn
                    include_once("./includes/connect.php");
                    $sql = "SELECT * FROM users WHERE dbUserName = ?";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([$newUserName]);

                    // og hvis brugeren ikke allerede eksiterer i databasen
                    if(empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
                        // så indsæt den nye bruger i databasen med det valgte brugernavn og kodeord
                        $sql = "INSERT INTO `users` (`userId`, `dbUserName`, `userPass`, `accesLevel`) VALUES (?, ?, ?, ?);";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute([NULL, $newUserName, $newPassword2, 3]);
                        echo "<h2 class=\"userCreated\">User created! You can now log in.</h2>";
                    }
                    else {
                        // hvis brugeren allerede eksisterer
                        echo "<h2 class=\"userError\">A user with that name already exists. Please choose another name.</h2>";
                    }
                }
                else {
                    // hvis begge passwords ikke matcher
                    echo "<h2 class=\"userError\">Password doesn't match. Please type password again.</h2>";
                }
            }
        ?>

        <div>
            <input type="submit" value="Create User">
        </div>

        

</main>

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