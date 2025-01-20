<?php
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/Web_restaurant/styles/login.css">
    <title>Restaurant</title>
</head>
<body class="h-100">
    <div class="login_div">
        <img src="../img/image_accueil.png" alt="Image de la page de connexion">
        <div class="aside">
            <img src="../img/logo_site.png" alt="IUT">
            <form action="login.php" method="POST">
                <label class="loginLab">Email</label>
                <input class="loginInputs" type="text" name="email" required>
                <label class="loginLab">Mot de passe</label>
                <input class="loginInputs" type="password" name="password" required>
                <div class="submit-btn">
                    <input id="connect" name="connect" type="submit" value="Se connecter">
                </div>
            </form>
        </div>
    </div>
</body>
</html>