<?php


namespace Ourframework\Core;


class Register
{
    private static $instance;

    private $apphelper;
    private $request;
    private $settingsManger;


    private function __construct(){}
    public function __destruct(){}
    private function __clone(){}

    public static function instance(): Register {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function reset() {
        self::$instance = null;
    }

    /**
     * @return mixed
     */
    public function getAppHelper() : AppHelper
    {
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
    public function getSettingsManger()
    {
        return $this->settingsManger;
    }

    /**
     * @param mixed $settingsManger
     */
    public function setSettingsManger($settingsManger): void
    {
        $this->settingsManger = $settingsManger;
    }

}