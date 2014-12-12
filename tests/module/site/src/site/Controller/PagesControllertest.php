<?php
namespace Site\Controller;

use PHPUnit_Framework_TestCase;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class PagesControllerTest extends AbstractHttpControllerTestCase{
    
    protected $traceError = true;
    
    public function setUp()
    {
        $this->setApplicationConfig(
            include 'config/application.config.php'
        );
        parent::setUp();
    }
  
    public function testPagesActionCanBeAccessed() {
        $this->dispatch('/histoire1');
        $this->assertResponseStatusCode(200);
        $this->assertModulesLoaded(array('site'));
        $this->assertQueryContentContains('H2', 'Texte histoire1');
    }

}
