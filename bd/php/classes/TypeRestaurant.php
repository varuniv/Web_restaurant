<?php

namespace bd\php\classes;
class TypeRestaurant{
    private int $idType;
    private String $type;

    public function __construct(int $idType, String $type){
        $this->idType=$idType;
        $this->type=$type;
    }

    public function getId():int{
        return $this->id;
    }

    public function getType():String{
        return $this->type;
    }

    public function setType(String $type):void{
        $this->type=$type;
    }

    public function __toString():String{
        return "Type de restaurant: $this->type";
    }
}
?>