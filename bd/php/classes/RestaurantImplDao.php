<?php

namespace bd\php\classes;

use bd\php\classes\Restaurant;
require_once __DIR__ . "/../Connexion.php";
use bd\php\Connexion;
class RestaurantImplDao
{
    // Getters
    public function getRestaurant(int $idRestaurant){
        $db = Connexion::connect();
        $select = $db->prepare('SELECT * FROM RESTAURANT 
                                natural join CUISINE 
                                natural join TYPERESTAURANT 
                                natural join EMPLACEMENT 
                                where idRestaurant = ?');
        $select->execute(array($idRestaurant));
        $answer = $select->fetchAll();
        print_r($answer);
        // Creer le restaurant
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