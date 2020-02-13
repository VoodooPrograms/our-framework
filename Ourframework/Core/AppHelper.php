<?php


namespace Ourframework\Core;

class AppHelper
{
    /*
     * These vars will be loaded from config.yaml
     */
    private $config = "Config/settings.yaml"; //
    private $routing = "Config/routing.yaml"; //
    private $registry;
    private $settings_manager;

    public function __construct()
    {
        $this->registry = Register::instance();
        $this->settings_manager = new SettingsManager();
        $this->registry->setSettingsManager($this->settings_manager);
    }

    public function setup(): string
    {
        $settings = $this->loadConfigFile($this->config);
        $routing = $this->loadConfigFile($this->routing);
        $this->setSettings($settings);
        $this->setRouting($routing);
        if (isset($_SERVER["REQUEST_METHOD"])) {
            $request = new HttpRequest();
        } else {
            $request = new HttpRequest();
            // $request = new CliRequest();
            // There will be more type of request eg. CliRequest, ApiRequest
        }
        $this->registry->setRequest($request);
        return get_class($request);
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
        $this->settings_manager->setDbsett($settings["settings"]);
    }

    public function setRouting(array $routing): void
    {
        $this->settings_manager->setRoutingTable($routing["routing"]);
    }
}
