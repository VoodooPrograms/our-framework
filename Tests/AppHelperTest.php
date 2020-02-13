<?php


namespace Tests;


use Ourframework\Core\AppHelper;
use Ourframework\Core\HttpRequest;
use Ourframework\Core\Request;

class AppHelperTest extends \PHPUnit\Framework\TestCase
{
    private $apphelpher;
    public function setUp(): void
    {
        $this->apphelpher = new AppHelper();
    }

    public function testSetup(){
        $refconfig = new \ReflectionProperty(AppHelper::class, "config");
        $refrouting = new \ReflectionProperty(AppHelper::class, "routing");
        $refconfig->setAccessible(true);
        $refrouting->setAccessible(true);
        $refconfig->setValue($this->apphelpher, "Ourframework/Config/settings.yaml");
        $refrouting->setValue($this->apphelpher, "Ourframework/Config/routing.yaml");
        $config = $this->apphelpher->setup();
        $this->assertNotNull($config);
        $this->assertEquals(HttpRequest::class, $config);
    }

    public function testLoadConfigFile(){
        $ref = new \ReflectionMethod(AppHelper::class, "loadConfigFile");
        $ref->setAccessible(true);
        $output = $ref->invoke($this->apphelpher, "Ourframework/Config/routing.yaml");
        $this->assertNotNull($output);
    }
}