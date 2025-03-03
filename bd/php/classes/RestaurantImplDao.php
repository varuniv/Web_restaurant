<?php

namespace bd\php\classes;

require_once __DIR__ . "/Cuisine.php";
require_once __DIR__ . "/TypeRestaurant.php";
require_once __DIR__ . "/Emplacement.php";
require_once __DIR__ . "/Restaurant.php";
require_once __DIR__ . "/../Connexion.php";
use bd\php\Connexion;

class RestaurantImplDao
{
    // Getters
    public function getRestaurant(int $idRestaurant){
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

        $cuisine = new Cuisine(0);
        foreach ($cuisines as $c){
            $idTypeCuisine = $c["idType"];
            $cuisine->addType($c["typeCuisine"]);
        }
        print_r($restaurant);
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

        return new Restaurant($idRestaurant,
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
            $cuisine,
            $emplacement);
    }
    public function getRestaurants(){
        $db = Connexion::connect();
        $select = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT');
        $select->execute();
        $answer = $select->fetchAll();
        print_r($answer);
        // Creer les restaurants
    }
    public function getRestaurantByType($typeRestaurant){
        $db = Connexion::connect();
        $select = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where idType = ?');
        $select->execute(array($typeRestaurant));
        $answer = $select->fetchAll();
        print_r($answer);
    }
    public function getRestaurantByNom($nomRestaurant){
        $db = Connexion::connect();
        $select = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where nomRestaurant = ?');
        $select->execute(array($nomRestaurant));
        $answer = $select->fetchAll();
        print_r($answer);
    }
    public function getRestaurantByTypeCuisine($typeCuisine){
        $db = Connexion::connect();
        $select = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where typeCuisine = ?');
        $select->execute(array($typeCuisine));
        $answer = $select->fetchAll();
        print_r($answer);
    }

    // Insert
    public function insertRestaurant(Restaurant $restaurant){
        // Faire requete
    }

    // Update
    public function updateRestaurant(int $id, Restaurant $restaurant){
        // Faire requete
    }

    // Delete
    public function deleteRestaurant(int $id){
        // Faire requete
    }
}

$dao = new RestaurantImplDao();
$restaurants = $dao->getRestaurant(1);
print($restaurants);