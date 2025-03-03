<?php

namespace bd\classes;
class Avis{
    private String $avis;
    private String $date;
    private Restaurant $restaurant;

    public function __construct(String $avis, String $date, Restaurant $restaurant){
        $this->avis=$avis;
        $this->date=$date;
        $this->restaurant=$restaurant;
    }

    public function getAvis():String{
        return $this->avis;
    }

    public function getDate():String{
        return $this->date;
    }

    public function getRestaurant():Restaurant{
        return $this->restaurant;
    }

    public function setAvis(String $avis):void{
        $this->avis=$avis;
    }

    public function setDate(String $date):void{
        $this->date=$date;
    }

    public function setRestaurant(Restaurant $restaurant):void{
        $this->restaurant=$restaurant;
    }

    public function __toString():String{
        return "Avis: ".$this->avis." posté le: ".$this->date." ".$this->restaurant->__toString();
    }
}
?>