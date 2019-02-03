<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "reservering";

// verbinding maken met de DATABASE
$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName)
or die ('Error'.mysqli_connect_error());
?>