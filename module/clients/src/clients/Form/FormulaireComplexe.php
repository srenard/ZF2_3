<?php

namespace Clients\Form;

use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class FormulaireComplexe extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('formulaireComplexe', array('method' => 'post'));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
            'attributes' => array(
                'value' => '45',
            ),
        ));

        $this->add(array('name' => 'nom',
            'Attributes' => array('type' => 'text'),
            'options' => array(
                'label' => 'Votre nom  '
            ),
        ));
        $this->add(array('name' => 'prenom',
            'Attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Votre prénom  '
            )
        ));
        $this->add(array('name' => 'client',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Cochez cette case si vous êtes déjà client  ',
                'use_hidden_element' => 'true',
                'checked_value' => 'oui',
                'unchecked_value' => 'non'
            )
        ));
        $this->add(array('name' => 'profession',
            'type' => 'select',
            'options' => array(
                'label' => 'Votre profession ',
                'value_options' => array(
                    '0' => 'Choisissez ! !',
                    '1' => 'Ouvrier',
                    '2' => 'Employé',
                ),
                'Attributes' => array(
                    'id' => 'testid',
                ),
            )
        ));
        $this->add(array('name' => 'articlesPref',
            'type' => 'Collection',
            'options' => array(
                'label' => 'Vos articles préférés',
                'count' => '10',
                'should_create_template' => false,
                'target_element' => new Element\text()
            )
        ));
        $this->add(array('name' => 'sexe',
            'type' => 'radio',
            'options' => array(
                'label' => "Votre sexe",
                'value_options' => array(
                    '0' => 'masculin',
                    '1' => 'féminin',
                )
            )
        ));
        $this->add(array('name' => 'couleur',
            'options' => array(
                'label' => 'Couleur préférée'
            )
        ));
        $this->add(array(
            'name' => 'reset',
            'attributes' => array('value' => 'Effacer', 'type' => 'reset',
            ),
        ));
        $this->add(array(
            'name' => 'envoyer',
            'attributes' => array('value' => 'OK', 'type' => 'submit', 'id' => "test"
            ),
        ));
    }

}
