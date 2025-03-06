<?php

namespace bd\classes;
class TypeRestaurant{
    private String $type;

    public function __construct(String $type){
        $this->type=$type;
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