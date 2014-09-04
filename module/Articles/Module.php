<?php

namespace Articles;

use Zend\ModuleManager\ModuleManager;
use Articles\Model\Articles;
use Articles\Model\ArticlesTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
//Pour Attacher un événement
use Zend\Mvc\MvcEvent;

use Articles\Model\CreaPdf;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Articles\Model\ArticlesTable' => function($sm) {
            $tableGateway = $sm->get('ArticlesTableGateway');
            $table = new ArticlesTable($tableGateway);
            return $table;
        },
                'ArticlesTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Articles());
            return new TableGateway('articles', $dbAdapter, null, $resultSetPrototype);
        },
                'CreaPdf' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            return new CreaPdf($dbAdapter);
        },
            ),
        );
    }

    /*
      public function onBootstrap(MvcEvent $event) {
      $eventManager = $event->getApplication()->getEventManager();
      $eventManager->attach(MvcEvent::EVENT_DISPATCH, function($e) {
      $date = new \DateTime();
      $date->setTimestamp($e->getApplication()
      ->getRequest()->getServer()->REQUEST_TIME);
      echo $date->format('Y-m-d H:i:s');
      }, 100);
      }
     */

    /*
      public function onBootstrap(MvcEvent $event) {
      $eventManager = $event->getApplication()->getEventManager();
      $eventManager->attach(MvcEvent::EVENT_DISPATCH, function($e) {
      foreach ($this->getServiceConfig()['factories'] as $fabrique => $classe) {
      echo $fabrique . "<br />";
      }
      }, 100);
      }
     */
}
