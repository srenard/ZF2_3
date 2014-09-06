<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Dom\Query;
use Zend\View\Model\ViewModel;

class DomtestController extends AbstractActionController {

    public function d1Action() {
        $t = '';
        $fichier = fopen('public/test_dom.xhtml', 'r+');
        while ($ligne = fgets($fichier)) {
            $t .= $ligne;
        }
        $dom = new Query($t);
        $res = $dom->execute('.post-content');
        return new ViewModel(
                array(
            'r' => $res
        ));
    }

}
