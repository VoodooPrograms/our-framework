<?php


namespace Tests;


use Ourframework\Core\SettingsManager;

class SettingsManagerTest extends \PHPUnit\Framework\TestCase
{

    private $settingsManager;
    public function setUp(): void
    {
        $this->settingsManager = new SettingsManager();
    }

    public function testSetDbsett(){
        $this->assertNull($this->settingsManager->setDbsett( array() ));
    }

    public function testSetRoutingTable(){
        $this->assertNull($this->settingsManager->setRoutingTable( array() ));
    }

    /**
     * @depends testSetRoutingTable
     * todo There is some problems with assertIsArray, it should be put in place of assertNotNull
     */
    public function testGetRoutingTable(){
        $this->assertNotNull($this->settingsManager->getRoutingTable());
    }
}