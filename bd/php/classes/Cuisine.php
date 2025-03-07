<?php

namespace bd\classes;
class Cuisine{
    private int $idCuisine;
    private String $typeCuisine;

    public function __construct(int $idCuisine, String $typeCuisine){
        $this->idCuisine=$idCuisine;
        $this->typeCuisine=$typeCuisine;
    }

    public function getId():int{
        return $this->id;
    }

    public function getTypeCuisine():String{
        return $this->typeCuisine;
    }
}
?>