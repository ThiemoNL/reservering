<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

//Get variable from session to use
$name = $_SESSION['name'];

require_once "includes/database.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TussenMenu</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="container" >
        <section class="login" >
    <h1>Welkom bij Kim's!</h1>
    <div>
        <h2>Hallo <?= $name; ?>, dit is het reserveringsmenu wat wilt u doen?</h2>
    </div>
    <input class="data-submit" type="submit" value="reservering maken"
           onclick="window.location='reservering.php';" />
    <input class="data-submit" type="submit" value="mijn reserveringen"
           onclick="window.location='mijnreservering.php';" />
            <input class="data-submit" type="submit" value="uitloggen"
                   onclick="window.location='logout.php';" />
        </section>
    </section>
</body>
</html>
