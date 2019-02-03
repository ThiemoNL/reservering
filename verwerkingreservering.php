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

//datum reservering (wanneer)
$date = mysqli_real_escape_string($db, $_POST['datum']);

//Hoelang wil je reserveren?
$amountdate = mysqli_real_escape_string($db, $_POST['dagen']);


// het ID van de gebruiker
$gebruikersid = $_SESSION['id'];


$toevoegen1 = "INSERT INTO reserveringen(datum, gebruikers_id, aantaldagen) VALUES ('$date','$gebruikersid','$amountdate')";

$toevoegenuitvoeren = mysqli_query($db, $toevoegen1)
or die ('Error' .mysqli_error($db) . '<br> Query:' . $toevoegen1);

//Reserverings ID
//echo $db->insert_id;
$reserveringid = $db->insert_id;

$resSpringQuery = "INSERT INTO reservering_springkussen(reservering_id, springkussen_id) VALUES";
//springkussen(s)
if (isset($_POST['chk_group'])) {
    foreach ($_POST['chk_group'] as $option) {
        $resSpringQuery .= "($reserveringid, ".
            mysqli_real_escape_string($db, $option)."),";
    }
    $resSpringQuery = substr_replace($resSpringQuery, "", -1);
}

$toevoegenuitvoeren = mysqli_query($db, $resSpringQuery)
or die ('Error' .mysqli_error($db) . '<br> Query:' . $resSpringQuery);

header('location:bevestiging.php')
?>