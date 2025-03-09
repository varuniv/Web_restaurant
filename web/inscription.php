<?php

use bd\php\Connexion;

$cssFile = "/styles/inscription.css";
require_once __DIR__ . "/../bd/php/Connexion.php";

include __DIR__ . '/header.php';

function ajouterUtilisateur($connexion, $pseudo, $motDePasse){
    $insertSql = "INSERT INTO UTILISATEUR (pseudo, motDePasse, moderateur) VALUES (:pseudo, :motDePasse , :moderateur)";
    $insertStmt = $connexion->prepare($insertSql);
    $insertStmt->bindParam(':pseudo', $pseudo);
    $insertStmt->bindParam(':motDePasse', $motDePasse);
    $insertStmt->bindValue(':moderateur', false, PDO::PARAM_BOOL);
    $insertStmt->execute();
}

$connexion= Connexion::connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscription'])) {
    $pseudo = $_POST['pseudo'];
    $motDePasse = $_POST['motDePasse'];

    $sql = "SELECT COUNT(*) FROM UTILISATEUR WHERE pseudo = :pseudo AND motDePasse = :motDePasse";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':motDePasse', $motDePasse);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        ajouterUtilisateur($connexion, $pseudo, $motDePasse);
        header("Location: accueil.php");
    } else {
        echo '<script language="Javascript">alert ("Utilisateur déjà existant" )</script>';
    }
    
}



?>
<div class="container">
    <h1>Formulaire d'inscription</h1>
</div>
<div class="inscription_div">
        <form action="inscription.php" method="POST">
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required value="">
                <label for="motDePasse">Votre mot de passe :</label>
                <input type="password" id="motDePasse" name="motDePasse" required value="">
            <div class="inscription_div">
                <button type="submit" name="inscription" class="btn_inscription">Ajouter</button>
            </div>
        </form>
</div>

<?php
include __DIR__ . '/footer.php';
?>