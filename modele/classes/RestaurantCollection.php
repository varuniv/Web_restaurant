<?php
namespace modele\classes;
class RestaurantCollection{
    private array $restaurants;
    private IteratorRestaurants $iteratorNomRestaurant;
    private IteratorRestaurants $iteratorTypeRestaurant;
    private IteratorRestaurants $iteratorTypeCuisine;

    public function __construct(IteratorRestaurants $iteratorNomRestaurant, IteratorRestaurants $iteratorTypeRestaurant, IteratorRestaurants $iteratorTypeCuisine){
        $this->restaurants=[];
        $this->iteratorNomRestaurant=$iteratorNomRestaurant;
        $this->iteratorTypeRestaurant=$iteratorTypeRestaurant;
        $this->iteratorTypeCuisine=$iteratorTypeCuisine;
    }

    public function getRestaurants():array{
        return $this->restaurants;
    }

    public function getIteratorNomRestaurants():IteratorRestaurants{
        return $this->iteratorNomRestaurant;
    }

    public function getIteratorTypeRestaurants():IteratorRestaurants{
        return $this->iteratorTyprRestaurant;
    }

    public function getIteratorTypeCuisine():IteratorRestaurants{
        return $this->iteratorTypeCuisine;
    }

    public function addRestaurant(Restaurant $restaurant):void{
        array_push($this->restaurants, $restaurant);
    }

    public function setIteratorNomRestaurants(IteratorRestaurants $iterator):void{
        $this->iteratorNomRestaurant=$iterator;
    }

    public function setIteratorTypeRestaurants(IteratorRestaurants $iterator):void{
        $this->iteratorTyprRestaurant=$iterator;
    }

    public function setIteratorTypeCuisine(IteratorRestaurants $iterator):void{
        $this->iteratorTypeCuisine=$iterator;
    }
}
?>