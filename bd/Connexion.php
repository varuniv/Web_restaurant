<?php
namespace bd;
use PDO;
use PDOException;
class Connexion{
    private $connexion;

    public static function connect(){
        try {
            $connexion = new PDO("pgsql:host=db.bhgnkwowmmjrtnpwmeyn.supabase.co;port=5432;dbname=postgres;user=postgres;password=Alex7896?");
            echo "Connection successed".PHP_EOL;
            return $connexion;
          } catch(PDOException $e) {
            echo "Connection failed: ".$e->getMessage().PHP_EOL;
          }
    }
}

$connexion=Connexion::connect();
?>