<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

//Get variable from session to use
$name = $_SESSION['name'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bedankt voor het reserveren</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
<h1><?php $name?> Bedankt voor het reserveren</h1>
<h2>We zullen zo spoedig mogelijk contact met je opnemen</h2>
</div>
<section class="login">
<div>
    <input class="data-submit" type="submit" value="terug naar menu"
           onclick="window.location='menu.php';" />
    <input class="data-submit" type="submit" value="mijn reserveringen"
           onclick="window.location='mijnreservering.php';" />
    <input class="data-submit" type="submit" value="nog een reservering maken"
           onclick="window.location='reservering.php';" />
    <input class="data-submit" type="submit" value="uitloggen"
           onclick="window.location='logout.php';" />
</div>
</section>

</body>
</html>
