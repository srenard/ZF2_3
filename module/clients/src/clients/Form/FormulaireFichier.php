<?php

namespace Clients\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class FormulaireFichier extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('formulaireFichier', array('method' => 'post'));

        $this->add(array('name' => 'f',
            'Attributes' => array('id' => 'f',
                'type' => 'file',
            ),
            'options' => (array(
        'label' => 'Fichier à télécharger : ',
            ))
        ));
    }

}
