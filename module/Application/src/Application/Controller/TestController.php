<?php
namespace Application\Controller;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class TestController extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->stApplicationConfig(
                include''
                );
        parent::setUp();
    }
    public function test1()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);
        
        $this->assertModuleName('Application');
    }
}