<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\I18n\Validator\Alnum;

class validateursController extends AbstractActionController {
    public function valideAction(){
        $validator = new Alnum(array('allowWhiteSpace' => false));
        $resultat = $validator->isValid("Test45");
        return new ViewModel(
                array('resultat' => $resultat));
    }
}