<?php


namespace Ourframework\Core;

/*
 * Register class - there are all core pieces and getters and setters for them
 * This is singleton class
 * Every communication between classes should be put here
 */
class Register
{
    private static $instance;

    private $apphelper;
    private $appcontroller;
    private $request;
    private $settingsManager;
    private $resolver;


    private function __construct()
    {
    }
    public function __destruct()
    {
    }
    private function __clone()
    {
    }

    public static function instance(): Register
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function reset()
    {
        echo "Hej";
        self::$instance = null;
    }

    /**
     * @return mixed
     */
    public function getAppHelper() : AppHelper
    {
        if (!isset($this->apphelper)) {
            $this->apphelper = new AppHelper();
        }
        return $this->apphelper;
    }

    /**
     * @param mixed $apphelper
     */
    public function setAppHelper(AppHelper $apphelper): void
    {
        $this->apphelper = $apphelper;
    }

    /**
     * @return mixed
     */
    public function getAppcontroller()
    {
        return $this->appcontroller;
    }

    /**
     * @param mixed $appcontroller
     */
    public function setAppcontroller($appcontroller): void
    {
        $this->appcontroller = $appcontroller;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getSettingsManager()
    {
        return $this->settingsManager;
    }

    /**
     * @param mixed $settingsManager
     */
    public function setSettingsManager($settingsManager): void
    {
        $this->settingsManager = $settingsManager;
    }

    /**
     * @return mixed
     */
    public function getResolver()
    {
        return $this->resolver;
    }

    /**
     * @param mixed $resolver
     */
    public function setResolver($resolver): void
    {
        $this->resolver = $resolver;
    }
}
