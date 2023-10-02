<?php

/* 
    * Author: Maher
    * Date: Oct 01 2023
    * Name: cylinder.php
    * Description: this javascript file sends ajax request and handles server's responses.
*/

// classes auto loader
spl_autoload_register(function ($class){
    include "$class.class.php";
});

if( isset($_GET['radius']) && isset($_GET['height']) ){   // if the radius & height is defined in the query request
    $radius = $_GET['radius'];
    $height = $_GET['height'];

    if(
            is_numeric($radius)     // if radius in numeric
            && $radius != 0         // if radius not equal to 0
            && $radius > 0          // if radius greater than 0
            && is_numeric($height)  // if height in numeric
            && $height != 0         // if height not equal to 0
            && $height > 0          // if height greater than 0
      ){
            // instantiate circle & cylinder objects
            $circle = new Circle($_GET['radius']);
            $cylinder = new Cylinder($_GET['height']);
            // echo cylinder object as string
            echo $cylinder;  
    }
}


