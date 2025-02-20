<?php
$cssFile = "../styles/detail.css";
include 'header.php';

if (isset($_GET['idResto'])) {
    $idResto = $_GET['idResto'];
} else {
    echo "Erreur : aucun restaurant sélectionné.";
    exit();
}

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

function getRestaurant($connexion, $id) {
    $sql = "SELECT * FROM Restaurant WHERE idRestaurant = :idR ";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getNomCuisine($connexion, $idC) {
    $sql = "SELECT typeCuisine FROM Cuisine WHERE idCuisine = :idC ";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idC', $idC, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}


$connexion= connexionBd();
$leRestaurant = getRestaurant($connexion, $idResto);
$typeCuisine = getNomCuisine($connexion, $leRestaurant['idCuisine']);
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
            <p class="adresse_p"><?php echo htmlspecialchars($leRestaurant['numDepartement']) . " ". htmlspecialchars($leRestaurant['departement']) . ", ". htmlspecialchars($leRestaurant['commune']); ?></p>
            <div class="categorie_div">
                <?php if (!empty($leRestaurant['typeRestaurant'])) : ?>
                    <p><?php echo htmlspecialchars($leRestaurant['typeRestaurant']); ?></p>
                    <?php if (!empty($typeCuisine['typeCuisine'])) : ?>
                        <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                        <p><?php echo htmlspecialchars($typeCuisine['typeCuisine']); ?></p>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if (!empty($typeCuisine['typeCuisine'])) : ?>
                        <p><?php echo htmlspecialchars($typeCuisine['typeCuisine']); ?></p>
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
        <ul>
            <li>
                <hr />
                <div class="profil_utilisateur">
                    <img src="../img/icon_profil.png" alt="Icon de profil">
                    <h4>Michel Boulanger</h4>
                </div>
                <div class="note_utilisateur">
                    <p>Notes :</p>
                    <p>1/5</p>
                </div>
                <div class="avis_utilisateur">
                    <p>On a eu froid du début à la fin du repas un problème de joint mal isolé sur la porte d’entrée selon la serveuse bref pas une bonne expérience et malgré une réduction de 30 % grâce a la fourchette le prix moyen par personne reste à 35 euros ! La prochaine fois j’irai prendre entrée plat dessert dans une brasserie bocuse à ce prix là Très déçue je ne reviendrai pas</p>
                </div>
                <hr />
            </li>
        </ul>
    </div>
<?php
include 'footer.php';
?>

