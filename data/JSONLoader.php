<?php

namespace data;
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
            echo "Type: ".$line["type"].PHP_EOL;
            echo "Name: ".$line["name"].PHP_EOL;
            echo "Brand: ".$line["brand"].PHP_EOL;
            echo "Hours: ".$line["opening_hours"].PHP_EOL;
            echo "Cuisine: ".$line["cuisine"].PHP_EOL;
            echo "Vegetarien: ".$line["vegetarien"].PHP_EOL;
            echo "Vegan: ".$line["vegan"].PHP_EOL;
            echo "Internet: ".$line["internet_access"].PHP_EOL;
            echo "Stars: ".$line["stars"].PHP_EOL;
            echo "Siret: ".$line["siret"].PHP_EOL;
            echo "Phone: ".$line["phone"].PHP_EOL;
            echo "Website: ".$line["website"].PHP_EOL;
            echo "Facebook: ".$line["facebook"].PHP_EOL;
            echo "Region: ".$line["region"].PHP_EOL;
            echo "Dep: ".$line["departement"].PHP_EOL;
            echo "Num dep: ".$line["code_departement"].PHP_EOL;
            echo "Commune: ".$line["commune"].PHP_EOL;
            $typeRestaurant=$line["type"];
            $nomRestaurant=$line["name"];
            $marqueRestaurant=$line["brand"];
            $horaires=$line["opening_hours"];
            $cuisine=$line["cuisine"];
            $vegetarien=$line["vegetarien"];
            $vegan=$line["vegan"];
            $accesInternet=$line["internet_access"];
            $etoiles=$line["stars"];
            $siret=$line["siret"];
            $tel=$line["phone"];
            $siteWeb=$line["website"];
        }
        return $dataObjects;
    }
}
JSONLoader::loadJSON("data/restaurants_orleans.json");
JSONLoader::parse();
?>