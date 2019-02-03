<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserveren bij kim's</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Vul je gegevens in om een account aan te maken.</h1>
    <section class="container">
        <section class="form">
            <form class="login" action="registreren.php" method="post">
            <div class="data-field">
                <label for="voornaam">voornaam</label>
                <input id="voornaam" required type="text" name="voornaam" placeholder="Wat is uw voornaam?"/>
            </div>
            <div class="data-field">
                <label for="achternaam">achternaam</label>
                <input id="achternaam" required type="text" name="achternaam" placeholder="Wat is uw achternaam?"/>
            </div>
            <div class="data-field">
                <label for="email">e-mailadres</label>
                <input id="email" required type="email" name="email" placeholder="Wat is uw E-mailadres?"/>
            </div>
            <div class="data-field">
                <label for="wachtwoord">wachtwoord</label>
                <input id="wachtwoord" required type="password" name="wachtwoord" placeholder="Vul hier uw wachtwoord in."/>
            </div>
            <div class="data-submit">
                <input type="submit" name="submit" value="Registreren"/>
            </div>
            </form>
        </section>
        <section>
            <input class="inlogknop" type="submit" value="inloggen"
                   onclick="window.location='login.php';" />
        </section>
            <h1>heeft u al een account log dan hier in</h1>
    </section>

</body>
</html>
