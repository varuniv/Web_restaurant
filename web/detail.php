<?php

use bd\php\Connexion;
use bd\php\classes\RestaurantImplDao;

$cssFile = "/styles/detail.css";
include __DIR__ . '/header.php';
require_once __DIR__ . "/../bd/php/Connexion.php";
require_once __DIR__ . "/../bd/Selects.php";
require_once __DIR__ . "/../bd/php/classes/RestaurantImplDao.php";

if (isset($_GET['idResto'])) {
    $idResto = $_GET['idResto'];
} else {
    echo "Erreur : aucun restaurant sélectionné.";
    exit();
}

$connexion= Connexion::connect();
$dao = new RestaurantImplDao();
$idUtilisateur = $_SESSION["idUtilisateur"];
$leRestaurant = $dao->getRestaurant($idResto);
$typeCuisine = $leRestaurant->getCuisines();
$emplacement = $leRestaurant->getEmplacement();
$lesAvis = getAvisRestaurant($connexion, $idResto);

if (isset($_POST['publier'])) {
    $avis = $_POST["avis"];
    $note = (int)$_POST["note"];
    $date = date('Y-m-d');
    publierAvis($connexion, $idUtilisateur, $date, $idResto, $avis, $note);
    $lesAvis = getAvisRestaurant($connexion, $idResto);
}

if (isset($_POST['cancel_idUtilisateur']) && isset($_POST['cancel_dateAvis']) && isset($_POST['cancel_idRestaurant'])) {
    $idUtilisateur = $_POST['cancel_idUtilisateur'];
    $dateAvis = $_POST['cancel_dateAvis'];
    $idRestaurant = $_POST['cancel_idRestaurant'];
    supprimerAvis($connexion, $idUtilisateur, $dateAvis, $idRestaurant);
    $lesAvis = getAvisRestaurant($connexion, $idResto);
}


?>
    <div class="container container_background">
        <div class="description_div">
            <div class="notes_div">
                <?php for ($i = 0; $i < $leRestaurant->getNbEtoiles(); $i++) {
                    echo '<img class="icon_notes" src="/img/fourchette_dorée.jpg" alt="Note du restaurant">';
                } ?>
            </div>
            <h2><?php echo htmlspecialchars($leRestaurant->getNom()); ?></h2>
            <p class="adresse_p"><?php echo htmlspecialchars($emplacement->getNumDepartement()) . " ". htmlspecialchars($emplacement->getDepartement()) . ", ". htmlspecialchars($emplacement->getCommune()); ?></p>
            <div class="categorie_div">
                <?php if (!empty($leRestaurant->getTypeRestaurant()->getType())) : ?>
                    <p><?php echo htmlspecialchars($leRestaurant->getTypeRestaurant()->getType()); ?></p>
                    <?php if (!empty($typeCuisine)) : ?>
                        <?php foreach ($typeCuisine as $cuisine) : ?>
                            <img class="point_dore" src="/img/point_or.png" alt="Petit point en or">
                            <p><?php echo htmlspecialchars($cuisine->getTypeCuisine()); ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if (!empty($typeCuisine)) : ?>
                        <?php foreach ($typeCuisine as $cuisine) : ?>
                            <p><?php echo htmlspecialchars($cuisine->getTypeCuisine()); ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($leRestaurant->isVegetarien()) : ?>
                    <img class="point_dore" src="/img/point_or.png" alt="Petit point en or">
                    <p>Végétarien</p>
                <?php endif; ?>
                <?php if ($leRestaurant->isVegan()) : ?>
                    <img class="point_dore" src="/img/point_or.png" alt="Petit point en or">
                    <p>Végan</p>
                <?php endif; ?>
                <?php if ($leRestaurant->getEntreeFauteuilRoulant()) : ?>
                    <img class="point_dore" src="/img/point_or.png" alt="Petit point en or">
                    <p>Access Handicapé</p>
                <?php endif; ?>
            </div>
            <div class="flex_row_div">
                <div class="moitie_div">
                    <div class="flex_row_div">
                        <p>Cuisine : <?php echo htmlspecialchars($leRestaurant->getMarqueRestaurant()); ?></p>
                    </div>
                    <div class="flex_row_div">
                        <p class="description_p">Horaires :</p>
                        <p><?php echo htmlspecialchars($leRestaurant->getHoraires()); ?></p>
                    </div>
                    <div class="flex_row_div">
                        <p class="description_p">Téléphone :</p>
                        <p><?php echo htmlspecialchars($leRestaurant->getNumTel()); ?></p>
                    </div>
                    <div class="flex_row_div">
                        <p class="description_p">Site :</p>
                        <a href="<?php echo htmlspecialchars($leRestaurant->getUrlWeb()); ?>"><?php echo htmlspecialchars($leRestaurant->getUrlWeb()); ?></a>
                    </div>
                    <div class="flex_row_div">
                        <p class="description_p">Facebook :</p>
                        <a href="<?php echo htmlspecialchars($leRestaurant->getUrlFacebook()); ?>"><?php echo htmlspecialchars($leRestaurant->getUrlFacebook()); ?></a>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container">
        <img src="../img/ornement_accueil.png" alt="Ornement">
    </div>
    <div class="container">
        <h3>Avis :</h3>
        <hr />
        <ul>
            <?php if (!empty($lesAvis)) : ?>
                <?php foreach ($lesAvis as $avis) : ?>
                    <li>
                        <div class="profil_utilisateur">
                            <img src="../img/icon_profil.png" alt="Icon de profil">
                            <h4><?php echo htmlspecialchars($avis['pseudo'])?></h4>
                        </div>
                        <div class="note_utilisateur">
                            <p>Notes :</p>
                            <p><?php echo htmlspecialchars($avis['note'])?>/5</p>
                            <div class="date_avis">
                                <p><?php echo htmlspecialchars($avis['dateAvis'])?></p>
                            </div>
                            <?php if ($_SESSION["moderateur"]==1) : ?>
                                <form method="POST" onsubmit="return confirmCancel()">
                                    <input type="hidden" name="cancel_idUtilisateur" value="<?php echo htmlspecialchars($avis['idUtilisateur']); ?>">
                                    <input type="hidden" name="cancel_dateAvis" value="<?php echo htmlspecialchars($avis['dateAvis']); ?>">
                                    <input type="hidden" name="cancel_idRestaurant" value="<?php echo htmlspecialchars($idResto); ?>">
                                    <button type="submit" name="cancel" class="btn border-1 border-dark btn-base">Supprimer le commentaire</button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <div class="avis_utilisateur">
                            <p><?php echo htmlspecialchars($avis['avis']); ?></p>
                        </div>
                        <hr />
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php if (isset($_SESSION["idUtilisateur"]) && !empty($_SESSION["idUtilisateur"])): ?>
        <div class="container">
            <form action="detail.php?idResto=<?php echo urlencode($idResto); ?>" method="POST">
                <label class="donnerAvis_lab">Donner votre Avis :</label>
                <input class="avis_input" type="text" name="avis" required>
                <label class="donnerNote_lab">Note sur 5 :</label>
                <div class="note_Rbtn">
                    <label>
                        <input type="radio" name="note" value="0" required> 0
                    </label>
                    <label>
                        <input type="radio" name="note" value="1" required> 1
                    </label>
                    <label>
                        <input type="radio" name="note" value="2" required> 2
                    </label>
                    <label>
                        <input type="radio" name="note" value="3" required> 3
                    </label>
                    <label>
                        <input type="radio" name="note" value="4" required> 4
                    </label>
                    <label>
                        <input type="radio" name="note" value="5" required> 5
                    </label>
                </div>
                <div class="submit-btn">
                    <input id="publier" class="btn_publier" name="publier" type="submit" value="Publier">
                </div>
            </form>
        </div>
    <?php endif; ?>
<?php
include 'footer.php';
?>

