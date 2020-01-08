<?php


namespace Tests;


use Ourframework\Core\AppHelper;

class AppHelperTest extends \PHPUnit\Framework\TestCase
{
    private $apphelpher;
    public function setUp(): void
    {
        $this->apphelpher = new AppHelper();
    }

    public function testSetup(){
        $filename = "Ourframework/Config/settings.yaml";
        $config = $this->apphelpher->setup();
        $this->assertIsArray($config);
    }
}