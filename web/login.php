<?php
$cssFile = "../styles/login.css";
include 'header.php';

function connexionBd() {
    try {
      $connexion = new PDO('sqlite:C:\Users\delah\Desktop\BUT-Info\SAE\Web_restaurant\Web_restaurant\data\bdd.sqlite');
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connexion;
    } catch (PDOException $e) {
      echo "Erreur de connexion : " . $e->getMessage();
      exit();
    }
}

function getUtilisateurByPseudo($pseudo, $connexion) {
    $sql = "SELECT * FROM UTILISATEUR WHERE pseudo = :pseudo";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


if (isset($_POST['connect'])) {
    
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];

    $connexion = connexionBd();

    if ($connexion) {
        
        $utilisateur = getUtilisateurByPseudo($pseudo, $connexion);

        if ($utilisateur) {
            
            $pswd = $utilisateur["motDePasse"];

            if ($password == $pswd) {
                
                $_SESSION["user_id"] = $id;
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["role"] = $utilisateur["role"];
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