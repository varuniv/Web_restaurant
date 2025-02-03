<?php

namespace bd\classes;
class Utilisateur{
    private int $idUtilisateur;
    private String $pseudo;
    private String $password;
    private array $favoris;

    public function __construct(int $idUtilisateur, String $pseudo, String $password){
        $this->idUtilisateur=$idUtilisateur;
        $this->pseudo=$pseudo;
        $this->password=$password;
        $this->favoris=[];
    }

    public function getId():int{
        return $this->idUtilisateur;
    }

    public function getPseudo():String{
        return $this->pseudo;
    }

    public function getPassword():String{
        return $this->password;
    }

    public function setPseudo($pseudo):void{
        $this->pseudo=$pseudo;
    }

    public function setPassword($password):void{
        $this->password=$password;
    }

    public function addFavoris(Restaurant $restaurant):void{
        array_push($this->favoris, $restaurant);
    }

    public function __toString():String{
        return "Utilisateur numéro $this->idUtilisateur\nPseudo: $this->pseudo\nMot de passe: $this->password";
    }
}
?>