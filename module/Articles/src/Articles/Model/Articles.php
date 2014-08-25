<?php

namespace Articles\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Articles {

    public $articles_id;
    public $articles_nom;
    public $articles_ref;
    public $articles_stock;
    public $articles_min;
    public $articles_prix;
    protected $inputFilter;

    public function exchangeArray($data) {
        $this->articles_id = (isset($data['articles_id'])) ? $data['articles_id'] : null;
        $this->articles_nom = (isset($data['articles_nom'])) ? $data['articles_nom'] : null;
        $this->articles_ref = (isset($data['articles_ref'])) ? $data['articles_ref'] : null;
        $this->articles_stock = (isset($data['articles_stock'])) ? $data['articles_stock'] : null;
        $this->articles_min = (isset($data['articles_min'])) ? $data['articles_min'] : null;
        $this->articles_prix = (isset($data['articles_prix'])) ? $data['articles_prix'] : null;
    }

    /**
     * Nécessaire à l'hydrateur
     * @return type
     */
    public function getArrayCopy() {
        return get_object_vars($this);
    }

    /**
     * 
     * @param \Zend\InputFilter\InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Non utilisé");
    }
    /**
     * Obtention d'un filtre d'entrée
     * 
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            // Le champ ne peut être vide
            // Il est transformmé en entier
            $inputFilter->add($factory->createInput(array(
                        'name' => 'articles_id',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'Int'),
                        ),
            )));
            // Le champ ne peut être vide
            // Suppression des balises et des espaces à gauche et à droite
            // Vérification de la longueur de la chaîne
            $inputFilter->add($factory->createInput(array(
                        'name' => 'articles_nom',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
            // Le champ ne peut être vide
            // Suppression des balises et des espaces à gauche et à droite
            // Vérification de la longueur de la chaîne
            $inputFilter->add($factory->createInput(array(
                        'name' => 'articles_ref',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}