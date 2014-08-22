<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class DbController extends AbstractActionController {

    public function test1Action() {
        $adapt = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $res = $adapt->query('SELECT * FROM `articles`', $adapt::QUERY_MODE_EXECUTE);

        //$r = $res->toArray();  //avec var_dump($r) dans la vue
        //$r = $res->count();    //avec echo $r dans la vue
        //$r = $res->getFieldCount();   //avec echo $r dans la vue
        //$res -> current();
        //$res -> next();
        //$r = $res -> current(); //avec echo var_dump($r) dans la vue
        //$res -> current();
        //$res -> next();
        //$res -> next();
        //$res -> rewind();
        //$r = $res->key(); //erreur. Rewind ne peut être utilisé sur ce type de result set
        //This result is a forward only result set, calling rewind() 
        //after moving forward is not supported
        //$res -> current();
        //$res -> next();
        //$r = $res -> key();
        //$res -> current();
        //$res -> next();
        //$res -> next();
        //$res -> next();
        //$r = $res->valid();//avec echo var_dump($r) dans la vue
        //$res = $res->current();
        //return new ViewModel(array('res'=>$res));
        //return new ViewModel(array('r' => $r));

        $adapt = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $sql = new Sql($adapt);
        $select = $sql->select();
        $select->from('articles')->where("articles_nom = 'taille-crayon'");
        $chaineSql = $sql->getSqlStringForSqlObject($select);
        $resultat = $adapt->query($chaineSql, $adapt::QUERY_MODE_EXECUTE);
        return new ViewModel(array('resultat' => $resultat));
    }

}
