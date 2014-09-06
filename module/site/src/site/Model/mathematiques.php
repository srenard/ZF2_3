<?php

namespace site\Model;

use Zend\Math\Rand;
use Zend\Math\BigInteger\BigInteger;

/**
 * Test de Zend\Math
 */
abstract class Mathematiques {

    /**
     * Obtention d’octets aléatoires
     * 
     * @param int $n Nombre d’octets demandés
     * @return string
     */
    public static function octets($n) {
        return Rand::getBytes($n, true);
    }

    /**
     * Obtention d’un booléen aléatoire
     * 
     * @return bool
     */
    public static function bool() {
        return Rand::getBoolean(true);
    }

    /**
     * Otention d’un entier aléatoire
     * 
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function entier($min, $max) {
        return Rand::getInteger($min, $max, true);
    }

    /**
     * Obtention d’un flottant aléatoire
     * 
     * @return float
     */
    public static function flottant() {
        return Rand::getFloat(true);
    }

    /**
     * Obtention d’une chaîne aléatoire
     * 
     * @param int $n Longueur de la chaîne souhaitée
     * @param string $ch Chaîne dans laquelle doivent être choisis les caractères
     * @return string
     */
    public static function chaine($n, $ch) {
        return Rand::getString($n, $ch, true);
    }

    /**
     * Calcul de la factorielle (calcul précis utilisant bcmath)
     * 
     * @param int $n Nombre dont on veut calculer la factorielle
     * @return string Factorielle calculée
     */
    public static function facto($n) {
        $bigInt = BigInteger::factory('bcmath');
        $f = 1;
        for ($k = 1; $k < $n + 1; $k++) {
            $f = $bigInt->mul($f, $k);
        }
        return $f;
    }

    /**
     * Calcul de la factorielle
     * (calcul approché utilisant la formule de Stirling)
     * @param int $n Nombre dont on veut calculer la factorielle
     * @return int
     */
    public static function quasiFacto($n) {
        return(sqrt(2 * M_PI * $n) * pow($n / M_E, $n)) * (1 + (1 / (12 * $n)));
    }

    /*
      public static function factoto($n){
      $f = 1;
      for ($i = 1; $i < $n + 1; $i++){
      $f = $f * $i;
      }
      return $f;
      }
     */
}