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
         $routing = $this->reg->getSettingsManger()->getRoutingTable(); //print_r($routing);
         
        foreach ($routing as $route){
            if ($route["path"] == $path){
                $action = $route["action"];
                echo $route["path"];
                echo $path.PHP_EOL;
            }
        }
        $URL_parts = explode("/", $path);
        $URL_size = count($URL_parts);

        $matched_paths = $routing;

       /* Sprawdzenie głębokości */
        for($level = 0; $level < $URL_size; $level++){
            foreach ($routing as $key => $record) {
                if(count(explode("/", $record["path"])) != count($URL_parts)){
                    unset($matched_paths[$key]);
                }
            }
        }

        //sort($matched_parts);

       /* Szukanie wzorca */
        foreach ($matched_paths as $key => $record) {
            $URL_parts_yaml = explode("/", $record["path"]);
            for ($i = 0; $i < $URL_size; $i++) {
                if ($URL_parts[$i] != $URL_parts_yaml[$i]) {
                    //regex
                    if( substr($URL_parts[$i], 0) == '{' && substr($URL_parts[$i], -1) == '}' ){
                        
                        $regex = substr($URL_parts_yaml[$i], 1, -1); //=Number or =String
                        
                        if(is_numeric($URL_parts[$i]) && $regex == "Number") {
                            $action = $record["action"];
                        } else if(is_string($URL_parts) && $regex == "String") {
                            $action = $record["action"];
                        } else {
                            throw new AppException("Invalid regex");
                            //todo:
                            //  · to fix later...
                        }
                    } else if ( $URL_parts_yaml[$i] == '*' && isset($URL_parts[$i])) {
                        $action = $record["action"];
                    }
                    //else unset
                    
                } else {
                    //explicited noted Strinf from routin table
                }
            }
            
            if(isset($matched_paths[$key]))
                $action = $record["action"];
        }
        //print_r($matched_paths);
        var_dump($action);
        if(is_null($action)){
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
