<?php
use bd\php\Connexion;

$cssFile = "/styles/login.css";
require_once __DIR__ . "/../bd/php/Connexion.php";
require_once __DIR__ . "/../bd/Selects.php";

include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $connexion = Connexion::connect();
    if ($connexion){
        $utilisateur = getUtilisateurByPseudo($pseudo, $connexion);
        if ($utilisateur){
            $pswd = $utilisateur["motDePasse"];
            if ($password == $pswd){
                $_SESSION["idUtilisateur"] = $utilisateur["idUtilisateur"];
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["moderateur"] = $utilisateur["moderateur"];
                header("Location: /web/accueil.php");
            }
            else {
                debug_to_console("Mot de passe incorrect.");
            }
        }
        else {
            debug_to_console("Mot de passe incorrect.");
        }
    }
}
?>

    <div class="login_div">
        <img src="../img/image_accueil.png" alt="Image de la page de connexion">
        <div class="aside">
            <img src="../img/logo_site.png" alt="IUT">
            <form action="login.php" method="POST">
                <label class="loginLab">pseudo</label>
                <input class="loginInputs" type="text" name="pseudo" required>
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
include __DIR__ . '/footer.php';
?>