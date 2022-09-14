<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrer Ny Bruger | FancyClothes.dk</title>
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

<?php
    include_once "header.php";
?>


<main class="container">
    <form action="" method="post" class="new">
    <h1>Opret ny bruger</h1>
        <div class="lbl">
            <label for="imgSrc">Indtast ønskede brugernavn</label>
            <div class="input">
                <input type="text" name="newUserName" placeholder="Example: Natascha">
            </div>
        </div>

        <div class="lbl">
            <label for="userPassword1">Indtast dit ønskede kodeord</label>
            <div class="input">
                <input type="password" id="newPassword1" name="newPassword1" placeholder="">
            </div>
        </div>

        <div class="lbl">
            <label for="userPassword2">Indtast kodeord igen</label>
            <div class="input">
                <input type="password" id="newPassword2" name="newPassword2" placeholder="">
            </div>
        </div>

        <div class="lbl">
            <label for="userEmail">Din E-mail adresse</label>
            <div class="input">
                <input type="email" id="userEmail" name="userEmail" placeholder="">
            </div>
        </div>


        <?php
            // if username and password x 2 is typed in
            if(isset($_POST['newUserName'])) {
                $newUserName = $_POST['newUserName'];
                $newPassword1 = $_POST['newPassword1'];
                $newPassword2 = $_POST['newPassword2'];
                $newUserEmail = $_POST['userEmail'];

                // and both passwords match
                if($newPassword1 === $newPassword2) {
                    // make a new user with the chosen name
                    include_once("./includes/connect.php");
                    $sql = "SELECT * FROM users WHERE userName = ?";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([$newUserName]);

                    // and if the user doesnt already exists in the db
                    if(empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
                        // then insert the new user into the db
                        $sql = "INSERT INTO `users` (`userId`, `userName`, `userPass`, `userMail`) VALUES (?, ?, ?, ?);";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute([NULL, $newUserName, $newPassword2, $newUserEmail]);
                        echo "<h2 class=\"userCreated\">Bruger oprettet! Du kan nu logge ind.</h2>";
                    }
                    else {
                        // if the user already exists
                        echo "<h4 class='userError'>En bruger med samme navn eksisterer allerede. Vælg venligst et andet brugernavn.</h4>";
                    }
                }
                else {
                    // if both passwords doesnt match
                    echo "<h4 class='userError'>De to kodeord matcher ikke. Indtast kodeord igen.</h4>";
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