<?php

use bd\php\Connexion;
use bd\php\classes\RestaurantImplDao;

$cssFile = "/styles/accueil.css";
include __DIR__ . '/header.php';
require_once __DIR__ . "/../bd/php/Connexion.php";
require_once __DIR__ . "/../bd/php/classes/RestaurantImplDao.php";

$connexion= Connexion::connect();

$dao = new RestaurantImplDao();

$lesRestaurants = $dao->getRestaurants();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!empty($_GET)){
        if (!empty($_GET['order'])) {
            if ($_GET['order'] == 'nom'){
                $lesRestaurants = $dao->getRestaurantsOrderedByName();
            }
            else if ( $_GET['order'] == 'note') {
                $lesRestaurants = $dao->getRestaurantsOrderedByNote();
            }
            else if ( $_GET['order'] == 'default') {
                $lesRestaurants = $dao->getRestaurants();
            }
        }

        else if (!empty($_GET['search'])) {
            $lesRestaurants = $dao->getRestaurantsByNom($_GET['search']);
        }

        else {
            header("Location: /web/accueil.php");
            exit();
        }
    }
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
            <img src="/img/ornement_accueil.png" alt="Ornement de la page d'accueil">
            <h1>Nos restaurants</h1>
            <div class="recherche_div">
                <form method="GET" action="">
                    <input type="text" name="search" class="recherche_nom" placeholder="Rechercher un restaurant...">
                    <button type="submit">Rechercher</button>
                </form>
                <div>
                    <form method="GET" action="">
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
        <div id="restaurantsList" class="container liste_restaurant">

        <?php foreach ($lesRestaurants as $leRestaurant) : ?>
            <div class="restaurant_div">
                <div class="img_restaurant_div">
                    <img src="/img/exemple_restaurant.jpg" class="img_card" alt="Image du Restaurant">
                    <h3><?php echo htmlspecialchars($leRestaurant->getNom()); ?></h3>
                    <p><?php echo htmlspecialchars($leRestaurant->getEmplacement()->getNumDepartement()). " ". htmlspecialchars($leRestaurant->getEmplacement()->getCommune()); ?></p>
                </div>
                <div>
                <a href="/web/detail.php?idResto=<?php echo urlencode($leRestaurant->getId()); ?>">Voir les informations</a>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
        </div>
    </div>
<?php
include __DIR__ . '/footer.php';
?>