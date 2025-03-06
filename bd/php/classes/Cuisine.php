<?php

namespace bd\php\classes;
class Cuisine{
    private String $typeCuisine;

    public function __construct(String $typeCuisine){
        $this->typeCuisine=$typeCuisine;
    }

    public function getTypeCuisine():String{
        return $this->typeCuisine;
    }
}
?>