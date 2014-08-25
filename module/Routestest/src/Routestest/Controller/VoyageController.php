<?php

namespace routestest\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class VoyageController extends AbstractActionController {

    public function accueilAction() {
        $this->layout()->setTemplate('routestest/layoutsLocaux/local_1.phtml');
        return new ViewModel(array('Pascale' => '20'));
    }

}
