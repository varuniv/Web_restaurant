<?php
$cssFile = "../styles/detail.css";
include 'header.php';

if (isset($_GET['idResto'])) {
    $idResto = $_GET['idResto'];
} else {
    echo "Erreur : aucun restaurant sélectionné.";
    exit();
}

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

function getRestaurant($connexion, $id) {
    $sql = "SELECT * FROM RESTAURANT WHERE idRestaurant = :idR ";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getEmplacement($connexion, $commune){
    $sql = "SELECT * FROM EMPLACEMENT WHERE commune = :commune";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':commune', $commune, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getNomCuisine($connexion, $idR) {
    $sql = "SELECT C.typeCuisine FROM CUISINE C INNER JOIN APPARTENIR A ON C.idCuisine = A.idCuisine WHERE A.idRestaurant = :idR";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAvisRestaurant($connexion, $idR) {
    $sql = "SELECT U.pseudo, D.dateAvis, D.avis, D.note FROM DONNER D JOIN UTILISATEUR U ON D.idUtilisateur = U.idUtilisateur WHERE D.idRestaurant = :idR ORDER BY D.dateAvis DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$connexion= connexionBd();
$leRestaurant = getRestaurant($connexion, $idResto);
$typeCuisine = getNomCuisine($connexion, $idResto);
$emplacement = getEmplacement($connexion, $leRestaurant['commune']);
$lesAvis = getAvisRestaurant($connexion, $idResto);
?>
    <div class="container container_background">
        <div class="description_div">
            <div class="notes_div">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
            </div>
            <h2><?php echo htmlspecialchars($leRestaurant['nomRestaurant']); ?></h2>
            <p class="adresse_p"><?php echo htmlspecialchars($emplacement['numDepartement']) . " ". htmlspecialchars($emplacement['departement']) . ", ". htmlspecialchars($leRestaurant['commune']); ?></p>
            <div class="categorie_div">
                <?php if (!empty($leRestaurant['typeRestaurant'])) : ?>
                    <p><?php echo htmlspecialchars($leRestaurant['typeRestaurant']); ?></p>
                    <?php if (!empty($typeCuisine)) : ?>
                        <?php foreach ($typeCuisine as $cuisine) : ?>
                            <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                            <p><?php echo htmlspecialchars($cuisine['typeCuisine']); ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if (!empty($typeCuisine['typeCuisine'])) : ?>
                        <?php foreach ($typeCuisine as $cuisine) : ?>
                            <p><?php echo htmlspecialchars($cuisine['typeCuisine']); ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($leRestaurant['vegetarien']) : ?>
                    <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                    <p>Végétarien</p>
                <?php endif; ?>
                <?php if ($leRestaurant['vegan']) : ?>
                    <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                    <p>Végan</p>
                <?php endif; ?>
                <?php if ($leRestaurant['entreeFauteuilRoulant']) : ?>
                    <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                    <p>Access Handicapé</p>
                <?php endif; ?>
            </div>
            <div class="flex_row_div">
                <div class="moitie_div">
                    <?php if (!empty($leRestaurant['horaires'])) : ?>
                        <div class="flex_row_div">
                            <p class="description_p">Horaires :</p>
                            <p><?php echo htmlspecialchars($leRestaurant['horaires']); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($leRestaurant['numTel'])) : ?>
                        <div class="flex_row_div">
                            <p class="description_p">Téléphone :</p>
                            <p><?php echo htmlspecialchars($leRestaurant['numTel']); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($leRestaurant['urlWeb'])) : ?>
                        <div class="flex_row_div">
                            <p class="description_p">Site :</p>
                            <a href="<?php echo htmlspecialchars($leRestaurant['urlWeb']); ?>"><?php echo htmlspecialchars($leRestaurant['urlWeb']); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($leRestaurant['urlFacebook'])) : ?>
                        <div class="flex_row_div">
                            <p class="description_p">Facebook :</p>
                            <a href="<?php echo htmlspecialchars($leRestaurant['urlFacebook']); ?>"><?php echo htmlspecialchars($leRestaurant['urlFacebook']); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="moitie_div">
                    <?php if (!empty($leRestaurant['marqueRestaurant'])) : ?>
                        <div class="marque_div">
                            <p><?php echo htmlspecialchars($leRestaurant['marqueRestaurant']); ?></p>
                        </div>
                    <?php endif; ?>
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

