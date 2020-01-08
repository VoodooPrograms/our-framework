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
        // Add mock for $request
        $request = new HttpRequest();
        $controller = $this->appcontroller->getController($request);
    }
}