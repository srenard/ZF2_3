<?php
namespace Clients\Form;

use Zend\Form\Annotation;

class AdresseFieldset{
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Adresse : "})
     */
    public $adresse1;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Complément d'adresse : "})
     */
    public $adresse2;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Code postal : "})
     */
    public $cp;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Ville : "})
     */
    public $ville;
}
