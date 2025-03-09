<?php
$cssFile = "../styles/profil.css";
include 'header.php';
require_once("../bd/Selects.php");

$idUtilisateur = $_SESSION["idUtilisateur"];
$connexion= connexionBd();
$avisUtilisateur = getAvisUtilisateur($connexion, $idUtilisateur);

if (isset($_POST['cancel_idUtilisateur']) && isset($_POST['cancel_dateAvis']) && isset($_POST['cancel_idRestaurant'])) {
    $idUtilisateur = $_POST['cancel_idUtilisateur'];
    $dateAvis = $_POST['cancel_dateAvis'];
    $idRestaurant = $_POST['cancel_idRestaurant'];
    supprimerAvis($connexion, $idUtilisateur, $dateAvis, $idRestaurant);
    $avisUtilisateur = getAvisUtilisateur($connexion, $idUtilisateur);
}

?>

    <div class="container">
        <h1><?php echo htmlspecialchars($_SESSION["pseudo"]); ?></h1>
    </div>
    <div class="container">
        <h2>Vos avis :</h2>
        <ul>
            <?php if (!empty($avisUtilisateur)) : ?>
                <?php foreach ($avisUtilisateur as $avis) : ?>
                    <li>
                        <div>
                            <h4><?php echo htmlspecialchars($avis['nomRestaurant'])?></h4>
                        </div>
                        <div class="note_utilisateur">
                            <p>Notes :</p>
                            <p><?php echo htmlspecialchars($avis['note'])?>/5</p>
                            <div class="date_avis">
                                <p><?php echo htmlspecialchars($avis['dateAvis'])?></p>
                            </div>
                            <form method="POST" onsubmit="return confirmCancel()">
                                <input type="hidden" name="cancel_idUtilisateur" value="<?php echo htmlspecialchars($idUtilisateur); ?>">
                                <input type="hidden" name="cancel_dateAvis" value="<?php echo htmlspecialchars($avis['dateAvis']); ?>">
                                <input type="hidden" name="cancel_idRestaurant" value="<?php echo htmlspecialchars($avis['idRestaurant']); ?>">
                                <button type="submit" name="cancel" class="btn border-1 border-dark btn-base">Supprimer le commentaire</button>
                            </form>
                        </div>
                        <div class="avis_utilisateur">
                            <p><?php echo htmlspecialchars($avis['avis']); ?></p></p>
                        </div>
                        <hr />
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php
include 'footer.php';
?>