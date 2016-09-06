<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image;

    function __construct($make_model, $price, $miles, $image)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;
    }

    function get_price()
    {
        return $this->price;
    }
    function get_make()
    {
        return $this->make_model;
    }
    function get_miles()
    {
        return $this->miles;
    }
    function get_image()
    {
        return $this->image;
    }
    
    }
?>
