<?php


namespace Ourframework\Core;


class App
{
    private $reg;

    private function __construct() {
        $this->reg = Register::instance();
    }

    public static function run() : void{
        $app = new App();
        $apphelper = $app->getAppHelper();
        $requesttype = $apphelper->setup();
        $app->handleRequest();
    }

    private function getAppHelper(): ?AppHelper {
        return $this->reg->getAppHelper();
    }

    private function handleRequest() {
        $request = $this->reg->getRequest();
        $appcontroller = new AppController();
        //$ctrl = $appcontroller->getController($request);
        //var_dump($ctrl);
        //$cmd->execute($request);
        //$view = $appcontroller->getView($request);
        //$view->render($request);
    }
}