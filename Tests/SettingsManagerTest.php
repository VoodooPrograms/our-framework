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

    public function testGetRoutingTable(){
        $this->assertIsArray($this->settingsManager->getRoutingTable());
        //$this->assertNotNull($this->settingsManager->getRoutingTable()); // version for Bartosz :D
    }
}