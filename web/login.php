<?php
$cssFile = "../styles/login.css";
include 'header.php';
?>

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
                    <input id="connect" class="btn_login" name="connect" type="submit" value="Se connecter">
                </div>
            </form>
            <div class="sinscrire_div">
                <a href="inscription.php" class="btn_sinscrire">S'inscrire</a>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
?>