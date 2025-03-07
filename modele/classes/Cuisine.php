<?php

namespace modele\classes\classes;
class Cuisine{
    private int $idCuisine;
    private String $typeCuisine;

    public function __construct(int $idCuisine=null, String $typeCuisine){
        $this->idCuisine = $idCuisine;
        $this->typeCuisine=$typeCuisine;
    }

    public function setId(int $idCuisine):void{
        $this->idCuisine = $idCuisine;
    }

    public function getId():int{
        return $this->idCuisine;
    }

    public function getTypeCuisine():String{
        return $this->typeCuisine;
    }
}
?>