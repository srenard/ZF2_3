<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;

class DbController extends AbstractActionController {

    public function test1Action() {
        $adapt = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $res = $adapt->query('SELECT * FROM `articles`', $adapt::QUERY_MODE_EXECUTE);
        $res = $res->current();
        return new ViewModel(array('res' => $res));
    }

}
