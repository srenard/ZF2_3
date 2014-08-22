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

        /*
          $adapt = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
          $sql = new Sql($adapt);
          $select = $sql->select();
          $select->from('articles')->where("articles_nom = 'taille-crayon'");
          $chaineSql = $sql->getSqlStringForSqlObject($select);
          echo $chaineSql;
          $resultat = $adapt->query($chaineSql, $adapt::QUERY_MODE_EXECUTE);
          return new ViewModel(array('resultat' => $resultat));
         */

        $adapt = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
// Instanciation de Zend\Db\Metadata\Metadata
        $metadata = new \Zend\Db\Metadata\Metadata($adapt);
// Obtention des noms de tables
        $tableNames = $metadata->getTableNames();
// On boucle sur les tables
        foreach ($tableNames as $tableName) {
            echo '<h3>Table ' . $tableName . "</h3>";
// Obtention de la structure des tables
            $table = $metadata->getTable($tableName);
            echo 'Avec les colonnes : ' . "<br />";
// On boucle sur les champs
            foreach ($table->getColumns() as $column) {
                echo $column->getName()
                . ' -> ' . $column->getDataType()
                . "<br />";
            }
            echo "<br />";
            echo 'Avec les contraintes : ' . "<br />";
// Obtention des contraintes
            foreach ($metadata->getConstraints($tableName) as $constraint) {
                /** @var $constraint Zend\Db\Metadata\Object\ConstraintObject */
                echo $constraint->getName()
                . ' -> ' . $constraint->getType()
                . "<br />";
                if (!$constraint->hasColumns()) {
                    continue;
                }
                echo 'Colonne : ' . implode(', ', $constraint->getColumns());
                if ($constraint->isForeignKey()) {
                    $fkCols = array();
                    foreach ($constraint->getReferencedColumns() as $refColumn) {
                        $fkCols[] = $constraint->getReferencedTableName() .
                                '.' . $refColumn;
                    }
                    echo ' => ' . implode(', ', $fkCols);
                }
                echo "<br />";
            }
            echo "<br /><br />";
        }
    }

}
