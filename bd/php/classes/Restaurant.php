<?php

namespace bd\php\classes;
use bd\php\classes\TypeRestaurant;
use bd\php\classes\Cuisine;
use bd\php\classes\Emplacement;

class Restaurant{
    private String $nomRestaurant;
    private String $horaires;
    private String $siret;
    private String $numTel;
    private String $urlWeb;
    private bool $vegetarien;
    private bool $vegan;
    private bool $entreeFauteuilRoulant;
    private bool $accesInternet;
    private String $marqueRestaurant;
    private int $nbEtoiles;
    private String $urlFacebook;
    private TypeRestaurant $typeRestaurant;
    private array $cuisines;
    private Emplacement $emplacement;

    public function __construct(String $nomRestaurant, String $horaires, String $siret, String $numTel, String $urlWeb, bool $vegetarien, bool $vegan, bool $entreeFauteuilRoulant, bool $accesInternet, String $marqueRestaurant, int $nbEtoiles, String $urlFacebook, TypeRestaurant $typeRestaurant){
        $this->nomRestaurant=$nomRestaurant;
        $this->horaires=$horaires;
        $this->siret=$siret;
        $this->numTel=$numTel;
        $this->urlWeb=$urlWeb;
        $this->vegetarien=$vegetarien;
        $this->vegan=$vegan;
        $this->entreeFauteuilRoulant=$entreeFauteuilRoulant;
        $this->accesInternet=$accesInternet;
        $this->marqueRestaurant=$marqueRestaurant;
        $this->nbEtoiles=$nbEtoiles;
        $this->urlFacebook=$urlFacebook;
        $this->typeRestaurant=$typeRestaurant;
        $this->cuisines=[];
    }

    public function getNom():String{
        return $this->nomRestaurant;
    }

    public function getHoraires():String{
        return $this->horaires;
    }

    public function getSiret():String{
        return $this->siret;
    }

    public function getNumTel():String{
        return $this->numTel;
    }

    public function getUrlWeb():String{
        return $this->urlWeb;
    }

    public function isVegetarien():bool{
        return $this->vegetarien;
    }

    public function isVegan():bool{
        return $this->vegan;
    }

    public function getEntreeFauteuilRoulant():bool{
        return $this->entreeFauteuilRoulant;
    }

    public function hasAccesInternet():bool{
        return $this->accesInternet;
    }

    public function getMarqueRestaurant():String{
        return $this->marqueRestaurant;
    }

    public function getNbEtoiles():int{
        return $this->nbEtoiles;
    }

    public function getUrlFacebook():String{
        return $this->urlFacebook;
    }

    public function getTypeRestaurant():TypeRestaurant{
        return $this->typeRestaurant;
    }

    public function getEmplacement():Emplacement{
        return $this->empacement;
    }

    public function getCuisines():array{
        return $this->cuisines;
    }

    public function setNom(String $nom):void{
        $this->nom=$nom;
    }

    public function setHoraires(String $horaires):void{
        $this->horaires=$horaires;
    }

    public function setSiret(String $siret):void{
        $this->siret=$siret;
    }

    public function setNumTel(String $numTel):void{
        $this->numTel=$numTel;
    }

    public function setUrlWeb(String $urlWeb):void{
        $this->urlWen=$urlWeb;
    }

    public function setVegetarien(bool $vegetarien):void{
        $this->vegetarien=$vegetarien;
    }

    public function setVegan(bool $vegan):void{
        $this->vegan=$vegan;
    }

    public function setEntreeFauteuilRoulant(bool $entreeFauteuilRoulant):void{
        $this->entreeFauteuilRoulant=$entreeFauteuilRoulant;
    }

    public function setAccesInternet(bool $accesInternet):void{
        $this->accesInternet=$accesInternet;
    }

    public function setMarqueRestaurant(String $marqueRestaurant):void{
        $this->marqueRestaurant=$marqueRestaurant;
    }

    public function setNbEtoiles(int $nbEtoiles):void{
        $this->nbEtoiles=$nbEtoiles;
    }

    public function setUrlFacebook(String $urlFacebook):void{
        $this->urlFacebook=$urlFacebook;
    }

    public function setTypeRestaurant(TypeRestaurant $typeRestaurant):void{
        $this->typeRestaurant=$typeRestaurant;
    }

    public function setCuisines(array $cuisines):void{
        $this->cuisines=$cuisines;
    }

    public function setEmplacement(Emplacement $emplacement):void{
        $this->emplacement=$emplacement;
    }

    public function addCuisine(Cuisine $cuisine):void{
        array_push($this->cuisines, $cuisine);
    }

    public function __toString():String{
        return $this->nom." ".$this->typeRestaurant->__toString()." ".$this->cuisine->__toString()." Il ouvre à $this->horaires Num Siret: $this->siret Tel: $this->numTel".$this->emplacement->__toString();
    }
}
?>