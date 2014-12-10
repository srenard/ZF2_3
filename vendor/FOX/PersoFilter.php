<?php

namespace FOX;

use Zend\Filter\FilterInterface;

class PersoFilter implements \Zend\Filter\FilterInterface{
    public function __construct() {
        echo "construct";
        exit();
    }
    public function filter($chaine){
        return $chaine."_ok";
    }
}