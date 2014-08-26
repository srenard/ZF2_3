<?php

namespace Clients\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Clients {

    public $id;
    public $nom;
    public $prenom;
    public $client;
    public $profession;
    public $articlesPref; //array
    public $sexe;
    public $couleur;
    public $inputFilter; // objet

    public function __construct($id = '', $nom = '', $prenom = '', $client = '',
            $profession = '', $articlesPref = '', $commentaire = '', $sexe = '',
            $couleur = '') {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->client = $client;
        $this->commentaire = $commentaire;
        $this->profession = $profession;
        $this->sexe = $sexe;
        $this->couleur = $couleur;
    }

    public function getnom() {
        return $this->nom;
    }

    function getArrayCopy() {
        return get_object_vars($this);
    }

    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nom = (isset($data['nom'])) ? $data['nom'] : null;
        $this->prenom = (isset($data['prenom'])) ? $data['prenom'] : null;
        $this->client = (isset($data['client'])) ? $data['client'] : null;
        $this->profession = (isset($data['profession'])) ? $data['profession'] : null;
        $this->articlesPref = (isset($data['articlesPref'])) ? $data['articlesPref'] : null;
        $this->sexe = (isset($data['sexe'])) ? $data['sexe'] : null;
        $this->couleur = (isset($data['couleur'])) ? $data['couleur'] : null;
    }

    public function afficheClient() {
        $ch = 'nom : ' . $this->nom . '<br />';
        $ch .='Prénom : ' . $this->prenom . '<br />';
        if ('oui' === $this->client) {
            $ch .= 'Déjà client<br />';
        }
        $ch .= 'Profession : ' . $this->profession . '<br />';
        $ch .= "Articles préférés :<br />";
        foreach ($this->articlesPref as $art) {
            $ch .= $art . '<br />';
        }
        $ch .="Code sexe : " . $this->sexe . '<br />';
        $ch .="Couleur : " . $this->couleur . '<br />';
        return $ch;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("");
    }

    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                        'name' => 'nom',
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
                                    'max' => 4,
                                ),
                            ),
                        ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}
