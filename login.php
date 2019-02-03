<?php
session_start();

require_once "includes/database.php";

//If already logged in, no need to be here
if (isset($_SESSION['name'])) {
    header('Location: reservering.php');
    exit;
}
//On post submit, check the credentials
if (isset($_POST['submit'])) {
    //Retrieve values (email safe for query)
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    //Get password & name from DB
    $query = "SELECT wachtwoord, email, id, voornaam FROM gebruikers WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    //Go on if we got an user (which means email is correct)
    if ($user) {
        echo "U heeft $password ingevuld als wachtwoord dit klopt niet";
        if (password_verify("$password", $user['wachtwoord'])) {
            //echo 'het is gelukt';
            //Set session variable, redirect & exit script
            $_SESSION['name'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header('Location: menu.php');
            exit;
        } else {
            $message = "Je wachtwoord bestaat niet!";
        }
    } else {
        $message = "Je email bestaat niet!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Login</h1>
<?php if (isset($message)) { ?>
    <div><?= $message; ?></div>
<?php } ?>

<section class="container">
<section class="form">
    <form  class="login" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="data-field"><label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Vul hier uw email in" required/></div>
        <div class="data-field"><label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" placeholder="Vul hier uw wachtwoord in" required/></div>
        <div class="data-submit"><input type="submit" name="submit" value="Inloggen"/></div>
    </form>
</section>
    <input class="inlogknop" type="submit" value="Ik heb nog geen account"
           onclick="window.location='index.php';" />
</section>
</body>
</html>