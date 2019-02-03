<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}


// het ID van de gebruiker
$gebruikersid = $_SESSION['id'];

//Get variable from session to use
$name = $_SESSION['name'];

require_once "includes/database.php";


$query= "SELECT	res.id, res.datum, res.aantaldagen, spr.springkussen_id 
          FROM reserveringen AS res 
          INNER JOIN reservering_springkussen AS spr ON spr.reservering_id = res.id WHERE gebruikers_id = $gebruikersid";
$result = mysqli_query($db, $query);
    $reserveringen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reserveringen[] = $row;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <table id="orders" >
        <thead>
        <tr>
            <th>id</th>
            <th>datum</th>
            <th>aantaldagen</th>
            <th>springkussennummer</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php foreach ($reserveringen as $reservering) { ?>
            <tr>
                <td><?= $reservering['id']; ?></td>
                <td><?= $reservering['datum']; ?></td>
                <td><?= $reservering['aantaldagen']; ?></td>
                <td><?= $reservering['springkussen_id']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<input type="submit" value="terug naar menu"
       onclick="window.location='menu.php';" />
<input type="submit" value="Log-out"
       onclick="window.location='logout.php';" />
</body>
</html>
