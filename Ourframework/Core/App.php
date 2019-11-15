<?php


namespace Ourframework\Core;


class App
{
    private $reg;
    private function __construct() {
        $this->reg = Register::instance();
    }

    public static function run(){
        $app = new App();
        $apphelper = $app->getAppHelper();
        $requesttype = $apphelper->setup();
        $app->handleRequest($requesttype);
    }

    private function getAppHelper(): ?AppHelper {
        return $this->reg->get(AppHelper::class);
    }

    private function handleRequest(string $requesttype){
        $request = $this->reg->get($requesttype);
        $appcontroller = new AppController();
        $ctrl = $appcontroller->getController($request);
        var_dump($ctrl);
        //$cmd->execute($request);
        //$view = $appcontroller->getView($request);
        //$view->render($request);
    }
}