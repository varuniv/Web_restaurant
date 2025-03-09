<?php
use bd\php\Connexion;
use bd\php\classes\RestaurantImplDao;

$cssFile = "/styles/accueil.css";
include __DIR__ . '/header.php';
require_once __DIR__ . "/../bd/php/Connexion.php";
require_once __DIR__ . "/../bd/php/classes/RestaurantImplDao.php";

$dao = new RestaurantImplDao();

?>
        <form method="post" action="accueil.php">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>

            <label for="horaire">Horaire</label>
            <input type="time" name="horaire" id="horaire" required>

            <label for="siret">Siret</label>
            <input type="text" name="siret" id="siret" required>

            <label for="numTel">Numéro de téléphone</label>
            <input type="tel" name="numTel" id="numTel" required>

            <label for="urlWeb">URL Web</label>
            <input type="url" name="urlWeb" id="urlWeb">

            <label for="vegetarien">Est végétarien ?</label>
            <input type="checkbox" name="vegetarien" id="vegetarien" required>

            <label for="vegan">Est végan ?</label>
            <input type="checkbox" name="vegan" id="vegan" required>

            <label for="entreeFauteuil">A un accès au fauteuil roulant ?</label>
            <input type="checkbox" name="entreeFauteuil" id="entreeFauteuil" required>

            <label for="accesInternet">A un acces Internet ?</label>
            <input type="checkbox" name="accesInternet" id="accesInternet" required>

            <label for="marqueRestaurant">Marque</label>
            <input type="text" name="marqueRestaurant" id="marqueRestaurant" required>

            <label for="urlFacebook">URL Facebook</label>
            <input type="url" name="urlFacebook" id="urlFacebook" required>

            <fieldset>
                <legend>Type du restaurant</legend>
                <?php
                foreach ($dao->getTypeRestaurant() as $typeRestaurant) {
                    echo '<label for="typeRestaurant'.$typeRestaurant->getIdType().'">'.$typeRestaurant->getType().'</label>';
                    echo '<input type="radio" name="typeRestaurant" id="typeRestaurant'.$typeRestaurant->getIdType().'" value="'.$typeRestaurant->getType().'" required>';
                }
                ?>
            </fieldset>

            <fieldset>
                <legend>Cuisines du restaurant</legend>
                <?php
                foreach ($dao->getCuisines() as $cuisine) {
                    echo '<label for="cuisine'.$cuisine->getId().'">'.$cuisine->getTypeCuisine().'</label>';
                    echo '<input type="checkbox" name="cuisine" id="cuisine'.$cuisine->getId().'" value="'.$cuisine->getTypeCuisine().'">';
                }
                ?>
            </fieldset>

            <fieldset>
                <legend>Emplacement du restaurant</legend>
                <label for="numDepartement">Numéro du département :</label>
                <input type="text" id="numDepartement" name="numDepartement" required>

                <label for="departement">Département :</label>
                <input type="text" id="departement" name="departement" required>

                <label for="commune">Commune :</label>
                <input type="text" id="commune" name="commune" required>

            </fieldset>

            <input type="submit" value="Ajouter un restaurant">
        </form>

<?php
include __DIR__ . '/footer.php';
?>