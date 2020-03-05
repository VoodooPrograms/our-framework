<?php


namespace Tests;


use function foo\func;
use Ourframework\Core\HttpResponse;


class HttpResponseTest extends \PHPUnit\Framework\TestCase
{
    private $response;

    public function setUp(): void
    {
        $this->response = new HttpResponse();
    }

    public function testCreateResponse(){
        $this->assertInstanceOf(HttpResponse::class, $this->response);
    }

    public function testSend(){
        $this->assertIsInt($this->response->send());
    }

    public function testStatus(){
        $refstatus = new \ReflectionProperty(HttpResponse::class, "status");
        $refstatus->setAccessible(true);
        $status = $refstatus->getValue($this->response);
        $this->assertNull($this->response->setStatus($status));
        $this->assertIsInt($this->response->getStatus());
    }

    public function testHeader(){
        $this->assertNull($this->response->setHeader(""));
        $this->assertIsString($this->response->getHeader());
    }

    public function testSetDefaultHeaders(){
        $ref = new \ReflectionMethod(HttpResponse::class, "setDefaultHeaders");
        $ref->setAccessible(true);
        $output = $ref->invoke($this->response);
        $this->assertNull($output);
    }

    public function testBody(){
        $refbody = new \ReflectionProperty(HttpResponse::class, "body");
        $refbody->setAccessible(true);
        $body = $refbody->getValue($this->response);
        $this->response->setBody("body");

        $this->assertNotNull($this->response->getBody());
        $this->assertIsString($this->response->getBody());
    }
}