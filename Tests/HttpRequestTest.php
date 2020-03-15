<?php


namespace Tests;


use Ourframework\Core\HttpRequest;


class HttpRequestTest extends \PHPUnit\Framework\TestCase
{
    private $request;

    public function setUp(): void
    {
        $_SERVER['REQUEST_URI'] = 'www.example.com/blog';
        $_SERVER['REQUEST_METHOD'] = 'www.example.com/blog';
        $_SERVER['SERVER_NAME'] = 'www.example.com/blog';
        $_SERVER['HTTP_USER_AGENT'] = 'www.example.com/blog';
        $_SERVER['CONTENT_TYPE'] = 'www.example.com/blog';
        $_SERVER['CONTENT_LENGTH'] = 0;
        $this->request = new HttpRequest();
    }

    /*public function testLaunch(){
         $ref = new \ReflectionMethod(HttpRequest::class, "launch");
         $ref->setAccessible(true);
         $output = $ref->invoke($this->request);
         $this->assertNull($output);
     }*/

    public function testPath(): void
    {
        $refpath = new \ReflectionProperty(HttpRequest::class, "path");
        $refpath->setAccessible(true);
        $path = $refpath->getValue($this->request);
        $this->assertNull($this->request->setPath($path));
        $this->assertIsString($this->request->getPath());
    }

    public function testStatus(): void
    {
        $refstatus = new \ReflectionProperty(HttpRequest::class, "status");
        $refstatus->setAccessible(true);
        $status = $refstatus->getValue($this->request);
        $this->assertNull($this->request->setStatus($status));
        $this->assertIsInt($this->request->getStatus());
    }

    public function testRequestMethod(): void
    {
        $ref_request_method = new \ReflectionProperty(HttpRequest::class, "request_method");
        $ref_request_method->setAccessible(true);
        $request_method = $ref_request_method->getValue($this->request);
        $this->assertNull($this->request->setRequestMethod($request_method));
        $this->assertIsString($this->request->getRequestMethod());
    }

    public function testIpAddress(): void
    {
        $ref_ip_address = new \ReflectionProperty(HttpRequest::class, "ip_address");
        $ref_ip_address->setAccessible(true);
        $ip_address = $ref_ip_address->getValue($this->request);
        $this->assertNull($this->request->setIpAddress($ip_address));
        $this->assertIsString($this->request->getIpAddress());
    }

    public function testUserAgent(): void
    {
        $ref_user_agent = new \ReflectionProperty(HttpRequest::class, "user_agent");
        $ref_user_agent->setAccessible(true);
        $user_agent = $ref_user_agent->getValue($this->request);
        $this->assertNull($this->request->setUserAgent($user_agent));
        $this->assertIsString($this->request->getUserAgent());
    }

    public function testContentType(): void
    {
        $ref_content_type = new \ReflectionProperty(HttpRequest::class, "content_type");
        $ref_content_type->setAccessible(true);
        $content_type = $ref_content_type->getValue($this->request);
        $this->assertNull($this->request->setContentType($content_type));
        $this->assertIsString($this->request->getContentType());
    }

    public function testContentLength(): void
    {
        $ref_content_length = new \ReflectionProperty(HttpRequest::class, "content_length");
        $ref_content_length->setAccessible(true);
        $content_length = $ref_content_length->getValue($this->request);
        $this->assertNull($this->request->setContentLength($content_length));
        $this->assertIsInt($this->request->getContentLength());
    }

    /**
     * @dataProvider cookiesProvider
     */
    public function testCookie($provided_cookies): void
    {
        $refcookies = new \ReflectionProperty(HttpRequest::class, "cookies");
        $refcookies->setAccessible(true);
        $cookies = $refcookies->getValue($this->request);
        $this->assertNull($this->request->setCookies($cookies));
        $this->request->setCookies($provided_cookies);
        $this->assertIsString($this->request->getCookie('SimpleName'));
    }

    public function cookiesProvider()
    {
        return [
            [['SimpleName' => 'SimpleText']]
        ];
    }

    public function testProperty(): void
    {
        $this->assertNull($this->request->setProperty('SimpleKey',0));
        $this->assertIsString($this->request->getProperty('SimpleKey'));
    }

}