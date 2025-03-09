<?php

namespace data;
use modele\classes\classes\Cuisine;
use modele\classes\classes\Emplacement;
use modele\classes\classes\Restaurant;
use modele\classes\classes\TypeRestaurant;

require_once __DIR__ . '/../modele/classes/Emplacement.php';
require_once __DIR__ . '/../modele/classes/TypeRestaurant.php';
require_once __DIR__ . '/../modele/classes/Restaurant.php';
require_once __DIR__ . '/../modele/classes/Cuisine.php';


class JSONLoader{
    private static array $dataArray;

    public static function getData():array{
        return self::$dataArray;
    }

    public static function loadJSON(String $filePath):void{
        if (!file_exists($filePath)) {
            die("Erreur : Le fichier JSON '$filePath' est introuvable.");
        }
        $dataString=file_get_contents($filePath);
        self::$dataArray=json_decode($dataString, true);
    }

    public static function parse():array{
        $dataObjects=[];
        foreach(self::$dataArray as $line){
            $typeRestaurant = $line["type"] ?? "Inconnu";
            $nomRestaurant = $line["name"] ?? "Sans nom";
            $marqueRestaurant = $line["brand"] ?? "Non spécifié";
            $horaires = $line["opening_hours"] ?? "Non spécifié";
            $vegetarien = isset($line["vegetarian"]) ? (bool)$line["vegetarian"] : false;
            $vegan = isset($line["vegan"]) ? (bool)$line["vegan"] : false;
            $entreeFauteuilRoulant = isset($line["wheelchair"]) ? (bool)$line["wheelchair"] : false;
            $accesInternet = isset($line["internet_access"]) ? (bool)$line["internet_access"] : false;
            $etoiles = isset($line["stars"]) ? (int)$line["stars"] : 0;
            $siret = $line["siret"] ?? "Inconnu";
            $tel = $line["phone"] ?? "Non renseigné";
            $urlWeb = $line["website"] ?? "";
            $facebook = $line["facebook"] ?? "";
            $departement = $line["departement"] ?? "Non renseigné";
            $numDepartement = isset($line["code_departement"]) ? (int)$line["code_departement"] : 0;
            $commune = $line["commune"] ?? "Non renseigné";

            // Création des objets
            $emplacement=new Emplacement($departement, $commune, $numDepartement);
            $type=new TypeRestaurant(0, $typeRestaurant);
            $restaurant=new Restaurant(0, $nomRestaurant, $horaires, $siret, $tel, $urlWeb, $vegetarien, $vegan, $entreeFauteuilRoulant, $accesInternet, $marqueRestaurant, $etoiles, $facebook, $type);
            $cuisines = isset($line["cuisine"]) ? $line["cuisine"]:null;
            if($cuisines!=null){
                foreach($cuisines as $cuisine){
                    $cuisineObject=new Cuisine(0, $cuisine);
                    array_push($dataObjects, $cuisineObject);
                    $restaurant->addCuisine($cuisineObject);
                }
            }
            array_push($dataObjects, $emplacement, $type, $restaurant);
        }
        return $dataObjects;
    }
}
JSONLoader::loadJSON("restaurants_orleans.json");
JSONLoader::parse();
?>