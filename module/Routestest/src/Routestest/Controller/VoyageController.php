<?php

namespace routestest\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class VoyageController extends AbstractActionController {
    /*
      public function accueilAction() {
      $this->layout()->setTemplate('routestest/layoutsLocaux/local_1.phtml');
      return new ViewModel(array('Pascale' => '20'));
      }
     */

    public function accueilAction() {
        $this->layout()->setTemplate('Routestest/layoutsLocaux/local_1.phtml');
        $pays = $this->params()->fromRoute('pays');
        return new ViewModel(array('Pascale' => '20', 'pays' => $pays));
    }

    public function accueilblogAction() {
        $this->layout()->setTemplate('Routestest/layoutsLocaux/local_1.phtml');
        return new ViewModel();
    }

    public function articleAction() {
        $this->layout()->setTemplate('Routestest/layoutsLocaux/local_1.phtml');
        return new ViewModel();
    }

    public function auteurAction() {
        $this->layout()->setTemplate('Routestest/layoutsLocaux/local_1.phtml');
        return new ViewModel();
    }

}
