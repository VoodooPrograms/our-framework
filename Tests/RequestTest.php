<?php


namespace Tests;


use Ourframework\Core\HttpRequest;
use Ourframework\Core\Request;

class RequestTest extends \PHPUnit\Framework\TestCase
{
    private $request;
    public function setUp(): void
    {
        $_SERVER['REQUEST_URI'] = 'www.example.com/blog';
        $this->request = new HttpRequest();
    }

    public function testGetRequest() {
        $this->assertInstanceOf(Request::class, $this->request);
    }

    public function testGetHttpRequest() {
        $this->assertInstanceOf(HttpRequest::class, $this->request);
    }

    public function testSetPath() {
        $this->assertEquals("www.example.com/blog", $this->request->getPath());
    }

    public function testSetProperty() {
        $this->request->setProperty("id", "111");
        $this->assertEquals("111", $this->request->getProperty("id"));
    }

    public function testSetStatus() {
        $this->request->setStatus(1);
        $this->assertEquals(1, $this->request->getStatus());
    }
}