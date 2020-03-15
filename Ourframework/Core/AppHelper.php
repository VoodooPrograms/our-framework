<?php


namespace Ourframework\Core;

class AppHelper
{
    /*
     * These vars will be loaded from config.yaml
     */
    private const SETTINGS_FILE_NAME = "Config/settings.yaml";
    private $config = "Config/settings.yaml"; //
    private $dbsett = "Config/dbsett.yaml"; //
    private $routing = "Config/routing.yaml"; //
    private $registry;
    private $settings_manager;

    public function __construct()
    {
        $this->registry = Register::instance();
        $this->settings_manager = new SettingsManager();
        $this->registry->setSettingsManager($this->settings_manager);
    }

    public function setup()
    {
        $dbsett = $this->loadConfigFile($this->dbsett);
        $routing = $this->loadConfigFile($this->routing);
        $settings = $this->loadConfigFile($this->config);
        $this->setSettings($settings);
        $this->setDbsett($dbsett);
        $this->setRouting($routing);
        if (isset($_SERVER["REQUEST_METHOD"])) {
            $request = new HttpRequest();
        } else {
            $request = new HttpRequest(); # This will be changed
            // $request = new CliRequest();
            // There will be more type of request eg. CliRequest, ApiRequest
        }
        $this->registry->setRequest($request);
    }

    private function loadConfigFile(string $file): array
    {
        if (!file_exists($file)) {
            throw new AppException("File '$file' does not exist");
        }
        $settings = yaml_parse_file($file);
        return $settings;
    }

    /*
     * We will get to that later...
     */
    public function setSettings(array $settings): void
    {
        $this->settings_manager->setSettings($settings["settings"]);
    }

    public function setRouting(array $routing): void
    {
        $this->settings_manager->setRoutingTable($routing["routing"]);
    }

    public function setDbsett(array $dbsett): void
    {
        $this->settings_manager->setDbsett($dbsett["database"]);
    }
}
