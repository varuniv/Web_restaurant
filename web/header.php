<?php

session_start();

if (isset($_GET['deconnexion'])) {
    $_SESSION['idUtilisateur'] = '';
    $_SESSION["pseudo"] = '';
    $_SESSION['moderateur'] = 0;
    header("Location: /web/login.php");
}
?>

<!doctype html>
<html lang="fr" style="height:100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Iutables'o</title>
    <?php
    if (isset($cssFile)) {
        echo '<link rel="stylesheet" href="'.$cssFile.'">';
    } else {
        echo '<link rel="stylesheet" href= "/styles/accueil.css">';
    }
    ?>
</head>
<body style="margin: 0;height:100%;background-color: #EFEFE1;">
    <header style="position: sticky;top: 0;">
        <nav class="navbar d-flex justify-content-between " style="background-color: #065b16">
            <div class="mx-3">
                <a href="/web/accueil.php"><img src="/img/logo_site.png" alt="Accueil" style="max-height:50px"></a>
            </div>
            <div class="mx-3">
                <?php if (isset($_SESSION["idUtilisateur"]) && !empty($_SESSION["idUtilisateur"])): ?>
                    <a class="btn" style="background-color:#EFEFE1" href="/web/profil.php">Mon profil</a>
                    <a class="btn" style="background-color:#EFEFE1" href="?deconnexion=true">Déconnexion</a>
                <?php else : ?>
                    <a class="btn" style="background-color:#EFEFE1" href="/web/login.php">Se connecter</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
</body>
</html>
