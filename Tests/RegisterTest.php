<?php


namespace Tests;


use Ourframework\Core\App;
use Ourframework\Core\AppController;
use Ourframework\Core\AppHelper;
use Ourframework\Core\Controller;
use Ourframework\Core\HttpRequest;
use Ourframework\Core\Register;
use Ourframework\Core\Request;
use Ourframework\Core\Resolver;
use Ourframework\Core\SettingsManager;

class RegisterTest extends \PHPUnit\Framework\TestCase
{
    private $register;
    public function setUp(): void
    {
        $this->register = Register::instance();
    }

    public function tearDown(): void
    {

    }

    public function testRequest(){
        $request = $this->createMock(Request::class);
        $this->register->setRequest($request);
        $this->assertNotNull($this->register->getRequest());
        $this->assertInstanceOf(Request::class, $this->register->getRequest());
    }

    public function testAppController() {
        $appcontroller = $this->createMock(AppController::class);
        $this->register->setAppController($appcontroller);
        $this->assertNotNull($this->register->getAppController());
        $this->assertInstanceOf(AppController::class, $this->register->getAppController());
    }

    public function testAppHelper(){
        $apphelper = $this->createMock(AppHelper::class);
        $this->register->setAppHelper($apphelper);
        $this->assertNotNull($this->register->getAppHelper());
        $this->assertInstanceOf(AppHelper::class, $this->register->getAppHelper());
    }

    public function testResolver(){
        $resolver = $this->createMock(Resolver::class);
        $this->register->setResolver($resolver);
        $this->assertNotNull($this->register->getResolver());
        $this->assertInstanceOf(Resolver::class, $this->register->getResolver());
    }

    public function testSettingManager(){
        $settingsmanager = $this->createMock(SettingsManager::class);
        $this->register->setSettingsManager($settingsmanager);
        $this->assertNotNull($this->register->getSettingsManager());
        $this->assertInstanceOf(SettingsManager::class, $this->register->getSettingsManager());
    }
}