<?php
session_start();
//Destroy the whole session, redirect & exit script
session_destroy();
header('Location: login.php');
exit;
?>