<?php

namespace auth\Form;

use Zend\Form\Form;

class formulaire extends Form {

    public function __construct($name = null) {
        // Le nom passé en paramètre sera ignoré du constructeur
        parent::__construct('formulaire');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'login',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Login',
            ),
        ));
        $this->add(array(
            'name' => 'passe',
            'attributes' => array(
                'type' => 'password',
            ),
            'options' => array(
                'label' => 'Passe',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }

}