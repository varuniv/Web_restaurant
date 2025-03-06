<?php
$cssFile = "../styles/login.css";
include 'header.php';

function connexionBd(){
    $serverName = "servinfo-maria";
    $dbName="DBdelahaye";
    $username = "delahaye";
    $password = "delahaye";

    $dsn="mysql:dbname=$dbName;host=$serverName";
    try {
      $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
      return $connexion;
    } catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage().PHP_EOL;
    }
}

function getUtilisateurByPseudo($pseudo, $connexion) {
    $sql = "SELECT * FROM UTILISATEUR WHERE pseudo = :pseudo";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];

    $connexion = connexionBd();

    if ($connexion) {
        
        $utilisateur = getUtilisateurByPseudo($pseudo, $connexion);

        if ($utilisateur) {
            
            $pswd = $utilisateur["motDePasse"];

            if ($password == $pswd) {
                
                $_SESSION["idUtilisateur"] = $utilisateur["idUtilisateur"];
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["moderateur"] = $utilisateur["moderateur"];
                header("Location: accueil.php");
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun utilisateur trouvé avec cet pseudo.";
        }
    } else {
        echo "Erreur de connexion à la base de données.";
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
include 'footer.php';
?>