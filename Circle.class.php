<?php

/* 
    * Author: Maher
    * Date: Oct 01 2023
    * Name: Circle.class.php
    * Description: this javascript file sends ajax request and handles server's responses.
*/

// base class

class Circle{
    private static $radius;

    function __construct($r){
        // assigning the $radius at the beginning of instantiating an object from our class
        self::$radius = number_format($r, 2);
    }

    function getRadius(){   // getting the radius
        return self::$radius;
    }

    function getArea(){     // getting the circle area
        $area = pi() * pow(self::$radius, 2);
        return $area;
    }

    function getCircumference(){    // getting the circle circumference
        $circum = 2 * pi() * self::$radius;
        return $circum;
    }
}