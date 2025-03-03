<?php

namespace bd\php\classes;
class Cuisine{
    private int $idCuisine;
    private array $typesCuisine;

    public function __construct(int $idCuisine){
        $this->idCuisine=$idCuisine;
        $this->typesCuisine=[];
    }

    public function getId():int{
        return $this->id;
    }

    public function getTypeCuisine():String{
        return $this->typeCuisine;
    }

    public function addType(String $type):void{
        array_push($this->typesCuisine, $type);
    }

    public function __toString():String{
        if(sizeof($this->typesCuisine)>0){
            $typesCuisinesString="";
            foreach($this->typesCuisine as $type){
                $typesCuisinesString .= $type . ", ";
            }
            return "Cuisine numéro $this->idCuisine: $typesCuisinesString";
        }
        else{
            return "Cuisine numéro $this->idCuisine: Aucun type";
        }
    }
}
?>