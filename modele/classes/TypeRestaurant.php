<?php

namespace modele\classes\classes;
class TypeRestaurant{
    private int $idType;
    private String $type;

    public function __construct(int $idType=null, String $type){
        $this->idType = $idType;
        $this->type=$type;
    }

    public function getIdType(): int
    {
        return $this->idType;
    }

    public function getType():String{
        return $this->type;
    }

    public function setIdType(int $idType): void
    {
        $this->idType = $idType;
    }

    public function setType(String $type):void{
        $this->type=$type;
    }

    public function __toString():String{
        return "Type de restaurant: $this->type";
    }
}
?>