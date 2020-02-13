<?php


namespace Tests;


use Ourframework\Core\AppController;
use Ourframework\Core\HttpRequest;
use Ourframework\Core\Register;

class AppControllerTest extends \PHPUnit\Framework\TestCase
{
    private $appcontroller;
    private $reg;
    public function setUp(): void
    {
        $_SERVER["REQUEST_METHOD"] = "GET";
        $this->appcontroller = new AppController();
        $this->reg = $this->createMock(Register::class);
    }

    public function testGetController() {
        // todo This test should be executed, but for now method getController is 'untestable'
        // Add mock for $request
        $this->assertTrue(true);
        //$request = new HttpRequest();
        //$controller = $this->appcontroller->getController($request);
    }
}