<?php

use bd\php\Connexion;

$cssFile = "/styles/accueil.css";
include __DIR__ . '/header.php';
require_once __DIR__ . "/../bd/Selects.php";
require_once __DIR__ . "/../bd/php/Connexion.php";

$connexion= Connexion::connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['order'] == 'nom'){
        $lesRestaurants = getRestaurantsByName($connexion);
    }
    if ( $_POST['order'] == 'note') {
        $lesRestaurants = getRestaurantsByNote($connexion);
    }
    if ( $_POST['order'] == 'default') {
        $lesRestaurants = getRestaurants($connexion);
    }
} else {
    $lesRestaurants = getRestaurants($connexion);
}
?>
        <div class="container">
            <h1>Le Restaurant de la semaine</h1>
        </div>
        <div class="container restau_semaine_div">
            <div class="moitie_div description_semaine">
                <h2>Nom du restaurant de la semaine</h2>
                <p class="adresse_p">Adresse</p>
                <p>Description du restaurant : Difficile de trouver meilleur emplacement. Situé au cœur de Paris devant le jardin du Luxembourg Riverains, touristes et bobos en goguette prennent déjà d’assaut sa terrasse ensoleillée pour siroter leurs cocktails.</p>
            </div>
            <div class="img_restaurant_div moitie_div">
                <img src="../img/restaurant_semaine.png" alt="Image du restaurant de la semaine">
            </div>
        </div>     
        <div class="container">
            <img src="../img/ornement_accueil.png" alt="Ornement de la page d'accueil">
            <h1>Nos restaurants</h1>
            <div class="recherche_div">
                <input type="text" class="recherche_nom" placeholder="Rechercher un restaurant...">
                <div>
                    <form method="POST" action="">
                        <select class="tri_select" name="order">
                            <option value="default">Trier par défaut</option>
                            <option value="nom">Trier par nom</option>
                            <option value="note">Trier par note</option>
                        </select>
                        <button type="submit">Trier</button>
                    </form>
                </div>
            </div>
        <div>
        <div class="container liste_restaurant">

        <?php foreach ($lesRestaurants as $leRestaurant) : ?>
            <div class="restaurant_div">
                <div class="img_restaurant_div">
                    <img src="../img/exemple_restaurant.jpg" class="img_card" alt="Image du Restaurant">
                    <h3><?php echo htmlspecialchars($leRestaurant['nomResto']); ?></h3>
                    <p><?php echo htmlspecialchars($leRestaurant['dep']). " ". htmlspecialchars($leRestaurant['ville']); ?></p>
                </div>
                <div>
                <a href="detail.php?idResto=<?php echo urlencode($leRestaurant['idResto']); ?>">Voir les informations</a>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
        </div>
    </div>
<?php
include __DIR__ . '/footer.php';
?>