<?php


namespace Ourframework\Core;

/*
 * This class should manage all configuration files
 * methods like matchRoute() or matchRegex() will be under Resolver, URLResolver classes
 * More will be discussed during meeting
 */
class SettingsManager
{
    private $reg;
    private $routing = [];
    private $settings = [];
    private $dbsett = [];

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings): void
    {
        $this->settings = $settings;
    }

    public function __construct()
    {
        $this->reg = Register::instance();
    }

    public function setRoutingTable(array $routing): void
    {
        $this->routing = $routing;
    }

    public function getRoutingTable(): array
    {
        return $this->routing;
    }

    public function setDbsett(array $dbsett): void
    {
        $this->dbsett = $dbsett;
    }

    public function getDbsett(): array
    {
        return $this->dbsett;
    }


}
