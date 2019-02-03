<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}
//e-mail van de gebruiker
$name = $_SESSION['name'];

//verbinding maken met de database
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM `springkussens`";
$result = mysqli_query($db, $query);
//Loop through the result to create a custom array
$springkussens = [];
while ($row = mysqli_fetch_assoc($result)) {
    $springkussens[] = $row;
}

//Close connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reserveren</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Welkom</h1>

<div>
    <h2>Welkom <?= $name; ?>, Je bent ingelogd je kunt nu beginnen met het plaatsen van je reservering.</h2>
</div>
<div>
<form class="login" action="verwerkingreservering.php" method="post">
    <div class="data-field">
        <label for="datum">datum reservering</label>
        <input id="datum" type="date" name="datum" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="2030-12-31" />
    </div>
    <div class="data-field">
        <label for="dagen">aantal dagen</label>
        <input id="dagen" type="number" name="dagen" value="" min="1" max="7" />
    </div>
</div>
<div>
    <table>
        <thead>
        <tr>
            <th>afbeelding</th>
            <th>#</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Selcteer uw springkussen(s)</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php foreach ($springkussens as $springkussen) { ?>
            <tr>
                <td class="image"><img src="<?= $springkussen['afbeelding']; ?>"/></td>
                <td><?= $springkussen['id']; ?></td>
                <td><?= $springkussen['naam']; ?></td>
                <td><?= $springkussen['prijs']; ?></td>
                <td><input type="checkbox" name="chk_group[]" value="<?= $springkussen['id']; ?>" /><br /></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Reserveren"/>
    </div>
</form>
<input type="submit" value="terug naar menu"
       onclick="window.location='menu.php';" />
<div>
    <a href="logout.php">logout</a>
</div>
</body>
</html>