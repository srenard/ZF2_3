<?php

namespace Application\Controller;

use Application\Controller\IndexController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

//use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

//class IndexControllerTest extends PHPUnit_Framework_TestCase {
//class IndexControllerTest extends AbstractHttpControllerTestCase {
class IndexControllerTest extends AbstractHttpControllerTestCase{
    //protected $controller;
    //protected $request;
    //protected $response;
    //protected $routeMatch;
    //protected $event;
    
    protected $traceError = true;
    
    public function setUp()
    {
        $this->setApplicationConfig(
            include 'config/application.config.php'
        );
        parent::setUp();
    }
    /*
    protected function setUp() {
        $bootstrap = \Zend\Mvc\Application::init(include 'config/application.config.php');
        $this->controller = new IndexController();
        $this->request = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event = $bootstrap->getMvcEvent();
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setEventManager($bootstrap->getEventManager());
        $this->controller->setServiceLocator($bootstrap->getServiceManager());
    }
     */
    public function testIndexActionCanBeAccessed() {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);
        $this->assertModulesLoaded(array('Application'));
        
        
        /*
        $this->routeMatch->setParam('action', 'index');

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
        
        //$this->assertModulesLoaded(array('Application', 'Auth', 'Articles'));
        $this->assertModuleName('Application');
        $this->assertControllerName('indexController');
         
         */
    }

}
