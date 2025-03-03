<?php

namespace bd\classes;
class Emplacement{
    private String $departement;
    private String $commune;
    private int $numDepartement;

    public function __construct(String $departement, String $commune, int $numDepartement){
        $this->departement=$departement;
        $this->commune=$commune;
        $this->numDepartement=$numDepartement;
    }

    public function getDepartement():String{
        return $this->departement;
    }

    public function getCommune():String{
        return $this->commune;
    }

    public function getNumDepartement():int{
        return $this->numDepartement;
    }

    public function setDepartement(String $departement):void{
        $this->departement=$departement;
    }

    public function setCommune(String $commune):void{
        $this->commune=$commune;
    }

    public function setNumDepartement(int $numDepartement):void{
        $this->numDepartement=$numDepartement;
    }

    public function __toString():String{
        return "Emplacement: $this->departement ($this->numDepartement), $this->commune";
    }
}
?>