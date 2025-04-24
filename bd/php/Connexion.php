<?php
namespace bd\php;
use PDO;
use PDOException;
class Connexion{
    private $connexion;

    public static function connect(){
      $serverName = "servinfo-maria";
      $dbName="DBguihard";
      $username = "guihard";
      $password = "guihard";
  
      $dsn="mysql:dbname=$dbName;host=$serverName";
      try {
        $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
        
        return $connexion;
      } catch(PDOException $e) {
        echo "Connection failed: ".$e->getMessage().PHP_EOL;
      }
  }
}
?>