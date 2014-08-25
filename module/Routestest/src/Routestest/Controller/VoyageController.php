<?php

namespace routestest\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class VoyageController extends AbstractActionController {

    public function accueilAction() {
        return new ViewModel(array('Pascale' => '20'));
    }

}
