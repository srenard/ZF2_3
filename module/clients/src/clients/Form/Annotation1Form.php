<?php

namespace Clients\Form;

use Zend\Form\Annotation;
//use Clients\Form\Reset;
use Clients\PersoFilter;

//use Clients\Form\AdresseFieldset;

/**
 * @Annotation\Name("Annotation1Form");
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty");
 */
class Annotation1Form {
    /**
     * @Annotation\ComposedObject("Clients\Form\AdresseFieldset")
     */
    public $adresse;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Nom : "})
     * @Annotation\Attributes({"class":"A_string"})
     * @Annotation\Attributes({"value":"En majuscules, SVP !"})
     * @Annotation\required
     * @Annotation\Validator({"name": "StringLength", 
     * "options": {"min":3, "max": 5}})
     * @Annotation\ErrorMessage
     * ("Entre 3 et 5 caractères, s'il vous plaït !")
     * @Annotation\Filter({"name":"StringToUpper"})
     */
    public $nom;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Prénom : "})
     * @Annotation\Attributes({"class":"A_string"})
     */
    public $prenom;
    /**
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Options({"label":"Profession :","value_options":{
     * "0":"Formateur",
     * "1":"Développeur"}})
     */
    public $profession;
     /**
     * @Annotation\Type("Zend\Form\Element\Radio")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Sexe : ",
     *                      "value_options" : {"1":"Homme","2":"Femme"}})
     * @Annotation\Attributes({"value":"1"})
     */
    public $sexe;
    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Options({"label":"texte"})
     */
    
    public $texte;
    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label":"Abonné à notre Lettre ? ",
     *      "value_options":{"checked":"2"}})
     */
    public $abonne;
   
    /**
     * @Annotation\Type("Clients\Form\Reset")
     * @Annotation\Attributes({"value":"Reset"})
     */
    public $reset;
    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value":"Submit"})
     */
    public $submit;
}