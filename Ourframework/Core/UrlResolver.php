<?php


namespace Ourframework\Core;


class UrlResolver extends Resolver
{
    private $reg;

    public function __construct() {
        $this->reg = Register::instance();
        $this->reg->setResolver($this);
    }

    public function match(Request $request): ?Controller {
        $path = $request->getPath();
        $routing = $this->reg->getSettingsManger()->getRoutingTable();
        //var_dump($routing);
        foreach ($routing as $route){
            if ($route["path"] == $path){
                $action = $route["action"];
                echo $route["path"];
                echo $path.PHP_EOL;
            }
        }
        if (is_null($action)){
            http_response_code(404);
            throw new AppException("There is no action");
            return new HttpResponse();
        }
        if (!class_exists($action)){
            // don't throw exception here
            throw new AppException("Class do not exist");
        }
        $refclass = new \ReflectionClass($action);
        if (!$refclass->isSubclassOf(Controller::class)){
            // don't throw exception here
        }
        return $refclass->newInstance();
    }
}