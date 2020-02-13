<?php


namespace Tests;


use Ourframework\Core\AppController;
use Ourframework\Core\HttpRequest;

class AppControllerTest extends \PHPUnit\Framework\TestCase
{
    private $appcontroller;
    public function setUp(): void
    {
        $_SERVER["REQUEST_METHOD"] = "GET";
        $this->appcontroller = new AppController();
    }

    public function testGetController() {
        // todo This test should be executed, but for now method getController is 'untestable'
        // Add mock for $request
        $request = new HttpRequest();
        $controller = $this->appcontroller->getController($request);
    }
}