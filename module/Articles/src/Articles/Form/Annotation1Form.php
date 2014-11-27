<?php

namespace Articles\Form;

use Zend\Form\Annotation;

/**
 * @Annotation\Name("Annotation1Form");
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty");
 */
class Annotation1Form {
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Nom : "})
     */
    public $nom;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Prénom : "})
     */
    public $prenom;
    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value":"Submit"})
     */
    public $submit;
}
