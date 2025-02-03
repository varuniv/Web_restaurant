<?php

namespace modele\classes;

class NomRestaurantOrderIterator implements \Iterator
{
    private $collection;
    private $position = 0;

    public function __construct($collection) {
        $this->collection = $collection;
    }

    public function current()
    {
        return  $this->collection[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}