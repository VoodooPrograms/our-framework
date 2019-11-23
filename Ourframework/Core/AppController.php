<?php


namespace Ourframework\Core;


class AppController
{
    private $setmgr = null;
    private $reg;

    public function __construct(){
        $this->reg = Register::instance();
        $this->reg->setAppcontroller($this);
        $this->setmgr = $this->reg->getSettingsManger();
    }

    public function getController(Request $request): Controller {
        $controler = $this->setmgr->matchRoute($request);
        return new $controler;
    }

    /*
     * This will be function responsible for getting proper view
     */
    public function getView(Request $request){

    }
}