<?php

namespace auth;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
//pour ACL
use Zend\Mvc\MvcEvent,
Zend\ModuleManager\Feature\ConfigProviderInterface;

class module implements AutoloaderProviderInterface {

    public function getAutoloaderConfig() {
        return array(
            'Zend\loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    // pour authentification
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'auth\Model\PersoStorage' => function($sm) {
            return new \auth\Model\PersoStorage('zf_tutorial');
        },
                'AuthService' => function($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'admin', 'admin_login', 'admin_passe', 'SHA1(?)');
            $authService = new AuthenticationService();
            $authService->setAdapter($dbTableAuthAdapter);
            $authService->setStorage($sm->get('auth\Model\PersoStorage'));
            return $authService;
        },
            ),
        );
    }

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach('route', array($this, 'loadConfiguration'), 2);
// D'autres méthodes peuvent être ajoutées ici
    }

    public function loadConfiguration(MvcEvent $e) {
        $application = $e->getApplication();
        $sm = $application->getServiceManager();
        $sharedManager = $application->getEventManager()->getSharedManager();
        $router = $sm->get('router');
        $request = $sm->get('request');
        $matchedRoute = $router->match($request);
        if (null !== $matchedRoute) {
            $sharedManager->attach(
                    'Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) use ($sm) {
                $sm->get('ControllerPluginManager')->get('aclplugin')
                        ->autorisation($e); // Appel du plugin
            }
            );
        }
    }

}
