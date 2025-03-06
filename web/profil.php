<?php
$cssFile = "../styles/profil.css";
include 'header.php';
require_once("../bd/Selects.php");

$idUtilisateur = $_SESSION["idUtilisateur"];
$connexion= connexionBd();
$avisUtilisateur = getAvisUtilisateur($connexion, $idUtilisateur);

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