<?php
namespace bd;
use PDO;
use PDOException;
class Connexion{
    private $connexion;

    public static function connect(){
        try {
            $connexion = new PDO("sqlite:data/db.sqlite");
            echo "Connection successed".PHP_EOL;
            return $connexion;
          } catch(PDOException $e) {
            echo "Connection failed: ".$e->getMessage().PHP_EOL;
          }
    }
}

$connexion=Connexion::connect();
?>