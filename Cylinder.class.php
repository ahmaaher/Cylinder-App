<?php

/* 
    * Author: Maher
    * Date: Oct 01 2023
    * Name: Cylinder.class.php
    * Description: this javascript file sends ajax request and handles server's responses.
*/

// Cylinder class

class Cylinder extends Circle{
    private static $height;

    function __construct($h){
        // assigning the $height at the beginning of instantiating an object from our class
        self::$height = $h;
    }

    function getHeight(){       // getting the height of the cylinder
        return self::$height;
    }

    function getBaseArea(){     // getting the base area of the cylinder -> which is the circle area
        return $this->getArea();
    }

    function getVolume(){       // getting the volume of the cylinder
        $volume = $this->getArea() * $this->getHeight();
        return $volume;
    }

    function getLateralSurface(){   // getting the lateral surface area of the cylinder
        $lateral = $this->getCircumference() * self::$height;
        return $lateral;
    }

    function getSurfaceArea(){      // getting the surface area of the cylinder
        // $surface = $this->getCircumference() * (self::$radius + self::$height);
        $surface = $this->getLateralSurface() + (2 * $this->getArea()); // this formula based on client request -> the formula in the above line is also correct
        return $surface;
    }

    function __toString(){      // this function is called when printing the object as string
        // assigning the data to $data variable in JSON format to parse it later to JavaScript object
        $data = '{' . 
                    '"Radius": "' . number_format($this->getRadius(), 2) . '", ' .
                    '"Height": "' . number_format($this->getHeight(), 2) . '", ' .
                    '"Base": "' . number_format($this->getBaseArea(), 2) . '", ' .
                    '"Volume": "' . number_format($this->getVolume(), 2) . '", ' .
                    '"Lateral": "' . number_format($this->getLateralSurface(), 2) . '", ' .
                    '"Surface": "' . number_format($this->getSurfaceArea(), 2) . '"' .
                '}';
        return $data;
    }


}