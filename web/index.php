<?php
$cssFile = "styles/login.css";
include 'header.php';
?>

    <div class="login_div">
        <img src="img/image_accueil.png" alt="Image de la page de connexion">
        <div class="aside">
            <img src="img/logo_site.png" alt="IUT">
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