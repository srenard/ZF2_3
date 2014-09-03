<?php

namespace Site\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use site\Model\Mathematiques;

class PagesController extends AbstractActionController {

    public function accueilAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Page d\'accueil',
        ));
    }

    public function societeAction() {
        $this->layout()->setTemplate('site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre société',
        ));
    }

    public function histoireAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre histoire',
        ));
    }

    /*
      public function histoire1Action() {
      $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
      return new ViewModel(array(
      'titre' => 'Notre histoire 1',
      ));
      }
     */

    public function histoire1Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
/*
        $cache = \Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem'
                    ),
                    'plugins' => array(
                        // Pour enpêcher les excetions en cas d'erreur de cache
                        'exception_handler' => array(
                            'throw_exceptions' => false
                        ),
                    )
        ));
        $key = 'r7';
        $result = $cache->getItem($key, $success);
        if (!$success) {
            $result = Mathematiques::quasifacto(150);
            $cache->setItem($key, $result);
            //echo "calcul";
        } else {
            //echo 'non calcul';
        }
        return new ViewModel(array(
            'titre' => 'Notre histoire',
            'r1' => Mathematiques::octets(4),
            'r2' => Mathematiques::bool(),
            'r3' => Mathematiques::entier(10, 20),
            'r4' => Mathematiques::flottant(),
            'r5' => Mathematiques::chaine(20, "abc"),
            'r6' => Mathematiques::facto(150),
            'r7' => $result
                //'r7' => Mathematiques::quasifacto(150),
                // 'r8' => Mathematiques::factoto(150)
        ));
 
 */
         return new ViewModel(array(
            'titre' => 'Notre histoire',
        ));
    }

    public function histoire2Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre histoire 2',
        ));
    }

    public function histoire3Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre histoire 3',
        ));
    }

    public function histoire4Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre histoire 4',
        ));
    }

    public function histoire5Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre histoire 5',
        ));
    }

    public function h2010Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'H2010',
        ));
    }

    public function h2011Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'H2011',
        ));
    }

    public function h2012Action() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'H2012',
        ));
    }

    public function groupeAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Notre groupe',
        ));
    }

    public function contactAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Contactez-nous !',
        ));
    }

    public function messageAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Votre message',
        ));
    }

    public function planAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        //$vue = new ViewModel();
        //$vue->setTerminal(true);
        //return($vue);
        return new ViewModel(array(
            'titre' => 'Plan',
        ));
    }

    public function artAction() {
        $this->layout()->setTemplate('Site/layout/layoutStatique.phtml');
        return new ViewModel(array(
            'titre' => 'Art',
        ));
    }

}
