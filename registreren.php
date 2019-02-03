<?php
require_once "includes/database.php";

// Functies worden hier aangemaakt

$firstname = mysqli_real_escape_string($db, $_POST['voornaam']);
$lastname = mysqli_real_escape_string($db, $_POST['achternaam']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['wachtwoord']);

//Password hash hier
$options = [
    'cost' => 12,
];
$passwordhash = password_hash("$password", PASSWORD_DEFAULT, $options);

$toevoegen = "INSERT INTO gebruikers( voornaam, achternaam, email, wachtwoord) VALUES ('$firstname','$lastname','$email','$passwordhash')";

$toevoegenuitvoeren = mysqli_query($db, $toevoegen)
or die ('Error' .mysqli_error($db) . '<br> Query:' . $toevoegen);

header('Location:login.php');
?>