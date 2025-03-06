<?php

namespace bd\php\classes;

require_once __DIR__ . "/Cuisine.php";
require_once __DIR__ . "/TypeRestaurant.php";
require_once __DIR__ . "/Emplacement.php";
require_once __DIR__ . "/Restaurant.php";
require_once __DIR__ . "/../Connexion.php";

use bd\classes\Cuisine;
use bd\php\Connexion;
use PDO;

class RestaurantImplDao
{
    // Getters
    public function getRestaurant(int $idRestaurant): Restaurant
    {
        $db = Connexion::connect();
        $selectRestaurant = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where idRestaurant = ?');
        $selectCuisines = $db->prepare('SELECT idType, typeCuisine 
                                FROM CUISINE NATURAL JOIN RESTAURANT 
                                where idRestaurant = ?');
        $selectRestaurant->execute(array($idRestaurant));
        $selectCuisines->execute(array($idRestaurant));
        $restaurant = $selectRestaurant->fetchAll();
        $cuisines = $selectCuisines->fetchAll();

        $idTypeRestaurant = $restaurant[0]["idType"];
        $typeRestaurant = $restaurant[0]["typeRestaurant"];

        $departement = $restaurant[0]["departement"];
        $commune = $restaurant[0]["commune"];
        $numDepartement = $restaurant[0]["numDepartement"];

        $idRestaurant = $restaurant[0]['idRestaurant'];
        $nomRestaurant = $restaurant[0]['nomRestaurant'];
        $horaires = $restaurant[0]['horaires'];
        $siret = $restaurant[0]['siret'];
        $numTel = $restaurant[0]['numTel'];
        $urlWeb = $restaurant[0]['urlWeb'];
        $vegetarien = $restaurant[0]['vegetarien'];
        $vegan = $restaurant[0]['vegan'];
        $entreeFauteuilRoulant = $restaurant[0]['entreeFauteuilRoulant'];
        $accesInternet = $restaurant[0]['accesInternet'];
        $marqueRestaurant = $restaurant[0]['marqueRestaurant'];
        $nbEtoiles = $restaurant[0]['nbEtoiles'];
        $urlFacebook = $restaurant[0]['urlFacebook'];
        $typeRestaurant  = new TypeRestaurant($idTypeRestaurant, $typeRestaurant);
        $emplacement = new Emplacement($departement, $commune, $numDepartement);

        $restaurant = new Restaurant(
            $idRestaurant,
            $nomRestaurant,
            $horaires,
            $siret,
            $numTel,
            $urlWeb,
            $vegetarien,
            $vegan,
            $entreeFauteuilRoulant,
            $accesInternet,
            $marqueRestaurant,
            $nbEtoiles,
            $urlFacebook,
            $typeRestaurant,
            $emplacement);

        foreach ($selectCuisines->fetchAll() as $c){
            $cuisine = new Cuisine($c['idType'], $c['typeCuisine']);
            $restaurant->addCuisine($cuisine);
        }

        return $restaurant;
    }
    public function getRestaurants(): array
    {
        $db = Connexion::connect();
        $selectRestaurants = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT');
        $selectCuisines = $db->prepare('SELECT idType, typeCuisine 
                                FROM CUISINE NATURAL JOIN RESTAURANT 
                                where idRestaurant = ?');
        $selectRestaurants->execute();

        $restaurants = array();

        foreach($selectRestaurants->fetchAll() as $restaurant){
            $idRestaurant = $restaurant["idRestaurant"];
            $selectCuisines->execute(array($idRestaurant));

            $idTypeRestaurant = $restaurant["idType"];
            $typeRestaurant = $restaurant["typeRestaurant"];

            $departement = $restaurant["departement"];
            $commune = $restaurant["commune"];
            $numDepartement = $restaurant["numDepartement"];

            $nomRestaurant = $restaurant['nomRestaurant'];
            $horaires = $restaurant['horaires'];
            $siret = $restaurant['siret'];
            $numTel = $restaurant['numTel'];
            $urlWeb = $restaurant['urlWeb'];
            $vegetarien = $restaurant['vegetarien'];
            $vegan = $restaurant['vegan'];
            $entreeFauteuilRoulant = $restaurant['entreeFauteuilRoulant'];
            $accesInternet = $restaurant['accesInternet'];
            $marqueRestaurant = $restaurant['marqueRestaurant'];
            $nbEtoiles = $restaurant['nbEtoiles'];
            $urlFacebook = $restaurant['urlFacebook'];
            $typeRestaurant  = new TypeRestaurant($idTypeRestaurant, $typeRestaurant);
            $emplacement = new Emplacement($departement, $commune, $numDepartement);

            $restaurant = new Restaurant(
                $idRestaurant,
                $nomRestaurant,
                $horaires,
                $siret,
                $numTel,
                $urlWeb,
                $vegetarien,
                $vegan,
                $entreeFauteuilRoulant,
                $accesInternet,
                $marqueRestaurant,
                $nbEtoiles,
                $urlFacebook,
                $typeRestaurant,
                $emplacement);

            foreach ($selectCuisines->fetchAll() as $c){
                $cuisine = new Cuisine($c['idType'], $c['typeCuisine']);
                $restaurant->addCuisine($cuisine);
            }

            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }
    public function getRestaurantsByType(String $typeRestaurant): array
    {
        $db = Connexion::connect();
        $selectRestaurants = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT
                                where typeRestaurant = ?');
        $selectCuisines = $db->prepare('SELECT idType, typeCuisine 
                                FROM CUISINE NATURAL JOIN RESTAURANT 
                                where idRestaurant = ?');
        $selectRestaurants->execute(array($typeRestaurant));

        $restaurants = array();

        foreach($selectRestaurants->fetchAll() as $restaurant){
            $idRestaurant = $restaurant["idRestaurant"];
            $selectCuisines->execute(array($idRestaurant));

            $idTypeRestaurant = $restaurant["idType"];
            $typeRestaurant = $restaurant["typeRestaurant"];

            $departement = $restaurant["departement"];
            $commune = $restaurant["commune"];
            $numDepartement = $restaurant["numDepartement"];

            $nomRestaurant = $restaurant['nomRestaurant'];
            $horaires = $restaurant['horaires'];
            $siret = $restaurant['siret'];
            $numTel = $restaurant['numTel'];
            $urlWeb = $restaurant['urlWeb'];
            $vegetarien = $restaurant['vegetarien'];
            $vegan = $restaurant['vegan'];
            $entreeFauteuilRoulant = $restaurant['entreeFauteuilRoulant'];
            $accesInternet = $restaurant['accesInternet'];
            $marqueRestaurant = $restaurant['marqueRestaurant'];
            $nbEtoiles = $restaurant['nbEtoiles'];
            $urlFacebook = $restaurant['urlFacebook'];
            $typeRestaurant  = new TypeRestaurant($idTypeRestaurant, $typeRestaurant);
            $emplacement = new Emplacement($departement, $commune, $numDepartement);

            $restaurant = new Restaurant(
                $idRestaurant,
                $nomRestaurant,
                $horaires,
                $siret,
                $numTel,
                $urlWeb,
                $vegetarien,
                $vegan,
                $entreeFauteuilRoulant,
                $accesInternet,
                $marqueRestaurant,
                $nbEtoiles,
                $urlFacebook,
                $typeRestaurant,
                $emplacement);

            foreach ($selectCuisines->fetchAll() as $c){
                $cuisine = new Cuisine($c['idType'], $c['typeCuisine']);
                $restaurant->addCuisine($cuisine);
            }

            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }
    public function getRestaurantsByNom($nomRestaurant): array
    {
        $db = Connexion::connect();
        $selectRestaurants = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT
                                where nomRestaurant LIKE ?');
        $selectCuisines = $db->prepare('SELECT idType, typeCuisine 
                                FROM CUISINE NATURAL JOIN RESTAURANT 
                                where idRestaurant = ?');
        // J'ajoute % pour que l'on puisse avoir tous les restaurants qui commencent par tel nom
        $selectRestaurants->execute(array($nomRestaurant.'%'));

        $restaurants = array();

        foreach($selectRestaurants->fetchAll() as $restaurant){
            $idRestaurant = $restaurant["idRestaurant"];

            $idTypeRestaurant = $restaurant["idType"];
            $typeRestaurant = $restaurant["typeRestaurant"];

            $departement = $restaurant["departement"];
            $commune = $restaurant["commune"];
            $numDepartement = $restaurant["numDepartement"];

            $nomRestaurant = $restaurant['nomRestaurant'];
            $horaires = $restaurant['horaires'];
            $siret = $restaurant['siret'];
            $numTel = $restaurant['numTel'];
            $urlWeb = $restaurant['urlWeb'];
            $vegetarien = $restaurant['vegetarien'];
            $vegan = $restaurant['vegan'];
            $entreeFauteuilRoulant = $restaurant['entreeFauteuilRoulant'];
            $accesInternet = $restaurant['accesInternet'];
            $marqueRestaurant = $restaurant['marqueRestaurant'];
            $nbEtoiles = $restaurant['nbEtoiles'];
            $urlFacebook = $restaurant['urlFacebook'];
            $typeRestaurant  = new TypeRestaurant($idTypeRestaurant, $typeRestaurant);
            $emplacement = new Emplacement($departement, $commune, $numDepartement);

            $restaurant = new Restaurant(
                $idRestaurant,
                $nomRestaurant,
                $horaires,
                $siret,
                $numTel,
                $urlWeb,
                $vegetarien,
                $vegan,
                $entreeFauteuilRoulant,
                $accesInternet,
                $marqueRestaurant,
                $nbEtoiles,
                $urlFacebook,
                $typeRestaurant,
                $emplacement);

            echo $idRestaurant;
            $selectCuisines->execute(array($idRestaurant));
            foreach ($selectCuisines->fetchAll() as $c){
                $cuisine = new Cuisine($c['idType'], $c['typeCuisine']);
                $restaurant->addCuisine($cuisine);
            }

            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }
    public function getRestaurantsByTypeCuisine($typeCuisine){
        $db = Connexion::connect();
        $selectRestaurants = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where typeCuisine = ?');
        $selectCuisines = $db->prepare('SELECT idType, typeCuisine 
                                FROM CUISINE NATURAL JOIN RESTAURANT 
                                where idRestaurant = ?');
        // J'ajoute % pour que l'on puisse avoir tous les restaurants qui commencent par tel nom
        $selectRestaurants->execute(array($typeCuisine));

        $restaurants = array();

        foreach($selectRestaurants->fetchAll() as $restaurant){
            $idRestaurant = $restaurant["idRestaurant"];
            $selectCuisines->execute(array($idRestaurant));

            $idTypeRestaurant = $restaurant["idType"];
            $typeRestaurant = $restaurant["typeRestaurant"];

            $departement = $restaurant["departement"];
            $commune = $restaurant["commune"];
            $numDepartement = $restaurant["numDepartement"];

            $nomRestaurant = $restaurant['nomRestaurant'];
            $horaires = $restaurant['horaires'];
            $siret = $restaurant['siret'];
            $numTel = $restaurant['numTel'];
            $urlWeb = $restaurant['urlWeb'];
            $vegetarien = $restaurant['vegetarien'];
            $vegan = $restaurant['vegan'];
            $entreeFauteuilRoulant = $restaurant['entreeFauteuilRoulant'];
            $accesInternet = $restaurant['accesInternet'];
            $marqueRestaurant = $restaurant['marqueRestaurant'];
            $nbEtoiles = $restaurant['nbEtoiles'];
            $urlFacebook = $restaurant['urlFacebook'];
            $typeRestaurant  = new TypeRestaurant($idTypeRestaurant, $typeRestaurant);
            $emplacement = new Emplacement($departement, $commune, $numDepartement);


            $restaurant = new Restaurant(
                $idRestaurant,
                $nomRestaurant,
                $horaires,
                $siret,
                $numTel,
                $urlWeb,
                $vegetarien,
                $vegan,
                $entreeFauteuilRoulant,
                $accesInternet,
                $marqueRestaurant,
                $nbEtoiles,
                $urlFacebook,
                $typeRestaurant,
                $emplacement);

            foreach ($selectCuisines->fetchAll() as $c){
                $cuisine = new Cuisine($c['idType'], $c['typeCuisine']);
                $restaurant->addCuisine($cuisine);
            }
            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }

    // Insert
    public function insertRestaurant(Restaurant $restaurant): void{
        // Le restaurant doit avoir un type restaurant, une cuisine et un emplacement qui existe dans la base de données
        // L'ID dans l'objet ne sert à rien.
        $db = Connexion::connect();
        $insertRestaurant = $db->prepare('INSERT INTO RESTAURANT(idRestaurant, idType, nomRestaurant, horaires, siret, numTel, urlWeb, commune, vegetarien, vegan, entreeFauteuilRoulant, accesInternet, marqueRestaurant, nbEtoiles, urlFacebook) 
                                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $id = $this->getMinUnusedRestId();

        print($restaurant->getNom() . "\n" .
            $restaurant->getTypeRestaurant()->getId() . "\n" .
            $restaurant->getHoraires() . "\n" .
            $restaurant->getSiret() . "\n" .
            $restaurant->getNumTel() . "\n" .
            $restaurant->getUrlWeb() . "\n" .
            $restaurant->getEmplacement()->getNumDepartement() . "\n" .
            "Vegetarien : " . $restaurant->isVegetarien() . "\n" .
            "Vegan : " . (int)$restaurant->isVegan() . "\n" .
            $restaurant->getEntreeFauteuilRoulant() . "\n" .
            $restaurant->hasAccesInternet() . "\n" .
            $restaurant->getMarqueRestaurant() . "\n" .
            $restaurant->getNbEtoiles() . "\n" .
            $restaurant->getUrlFacebook() . "\n" .
            $id);

        $insertRestaurant->execute(array(
            $id,
            $restaurant->getTypeRestaurant()->getId(),
            $restaurant->getNom(),
            $restaurant->getHoraires(),
            $restaurant->getSiret(),
            $restaurant->getNumTel(),
            $restaurant->getUrlWeb(),
            $restaurant->getEmplacement()->getCommune(),
            (int)$restaurant->isVegetarien(),
            (int)$restaurant->isVegan(),
            (int)$restaurant->getEntreeFauteuilRoulant(),
            (int)$restaurant->hasAccesInternet(),
            $restaurant->getMarqueRestaurant(),
            $restaurant->getNbEtoiles(),
            $restaurant->getUrlFacebook(),
            ));

        // Ne va pas marcher à cause de la facon dont est faite la classe Cuisine.
        foreach ($restaurant->getCuisines() as $cuisine){
            $insertAppartenir = $db->prepare("INSERT INTO APPARTENIR(idRestaurant, idType) values (?, ?)");
            $insertAppartenir->execute(array($id, $cuisine->getId()));
        }
    }

    // Update
    public function updateRestaurant(int $id, Restaurant $newRestaurant){
        $db = Connexion::connect();
        echo $newRestaurant;
        $update = $db->prepare('UPDATE RESTAURANT SET 
                      nomRestaurant = ?,
                      idType = ?,
                      horaires = ?,
                      siret = ?,
                      numTel = ?,
                      urlWeb = ?,
                      commune = ?,
                      vegetarien = ?,
                      vegan = ?,
                      entreeFauteuilRoulant = ?,
                      accesInternet = ?,
                      marqueRestaurant = ?,
                      nbEtoiles = ?,
                      urlFacebook = ?
                      WHERE idRestaurant = ?');
        $update->execute(array(
            $newRestaurant->getNom(),
            $newRestaurant->getTypeRestaurant()->getId(),
            $newRestaurant->getHoraires(),
            $newRestaurant->getSiret(),
            $newRestaurant->getNumTel(),
            $newRestaurant->getUrlWeb(),
            $newRestaurant->getEmplacement()->getNumDepartement(),
            $newRestaurant->isVegetarien(),
            $newRestaurant->isVegan(),
            $newRestaurant->getEntreeFauteuilRoulant(),
            $newRestaurant->hasAccesInternet(),
            $newRestaurant->getMarqueRestaurant(),
            $newRestaurant->getNbEtoiles(),
            $newRestaurant->getUrlFacebook(),
            $id
        ));
    }

    // Delete
    public function deleteRestaurant(int $id): void{
        $db = Connexion::connect();
        $deleteDonner = $db->prepare('DELETE FROM DONNER WHERE idRestaurant = ?');
        $deleteDonner->execute(array($id));
        $deleteAppartenir = $db->prepare('DELETE FROM APPARTENIR WHERE idRestaurant = ?');
        $deleteAppartenir->execute(array($id));
        $deleteResto = $db->prepare('DELETE FROM RESTAURANT WHERE idRestaurant = ?');
        $deleteResto->execute(array($id));
    }

    public function getNomCuisine($idR): array {
        $db = Connexion::connect();
        $sql = "SELECT C.typeCuisine FROM CUISINE C INNER JOIN APPARTENIR A ON C.idCuisine = A.idCuisine WHERE A.idRestaurant = ?";
        $selectNomCuisine = $db->prepare($sql);
        $selectNomCuisine->execute(array($idR));
        return $selectNomCuisine->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getMinUnusedRestId(): int {
        $db = Connexion::connect();
        // Cette fonction va permettre d'avoir le plus petit ID possible d'utiliser
        // C.A.D. s'il y a l'id 0 et 2 elle va renvoyer 1.
        $selectID = $db->prepare("SELECT min(idRestaurant) as idRestaurant FROM RESTAURANT 
                   WHERE idRestaurant+1 NOT IN (SELECT idRestaurant FROM RESTAURANT) 
                   AND EXISTS (SELECT 1 FROM RESTAURANT where idRestaurant = 0)");
        $selectID->execute(array());
        $result = $selectID->fetch();
        $id = ($result["idRestaurant"] != null) ? $result["idRestaurant"] : 0;
        return $id;
    }
}

$emplacement = new Emplacement("", "Paris", 0);
$typeRestaurant = new TypeRestaurant(2, "test");
$resto = new Restaurant(0, "test insert", "08:00-22:00", 12, 0000000000, "test url", true, false, false, true, "test marque", 5, "test url facebook", $typeRestaurant, $emplacement);
$dao = new RestaurantImplDao();
$dao->getNomCuisine(1);
print_r($dao->getNomCuisine(2));
//$restaurants = $dao->getRestaurantsByType("Fast Food");
//print_r($restaurants);