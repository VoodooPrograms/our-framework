<?php
namespace Ourframework\Core;


/**
 * Class UrlResolver
 * @package Ourframework\Core
 */
class UrlResolver extends Resolver
{
    private $reg;
    public function __construct() {
        $this->reg = Register::instance();
        $this->reg->setResolver($this);
    }

    public function match(Request $request, array $routing): ?Controller {
        $path = $request->getPath();

        $action = $this->oneToOne($path, $routing);

        if (!isset($action)) {

            $URL_parts = explode("/", $path);
            $URL_size = count($URL_parts);
            $matched_paths = $routing;

            for ($level = 0; $level < $URL_size; $level++) {
                foreach ($routing as $key => $record) {
                    if (count(explode("/", $record["path"])) != count($URL_parts)) {
                        unset($matched_paths[$key]);
                    }
                }
            }

            foreach ($matched_paths as $key => $record) {
                $URL_parts_yaml = explode("/", $record["path"]);
                for ($i = 0; $i < $URL_size; $i++) {
                    if($this->isRegex($URL_parts_yaml[$i], $URL_parts[$i])){
                        $action = $record["action"];
                    } else if ($URL_parts_yaml[$i] == '*' && isset($URL_parts[$i])) {
                        $action = $record["action"];
                    } else if ($URL_parts_yaml[$i] != $URL_parts[$i]){
                        break;
                    }
                }
            }
        }
        return $this->validateAction($action);
    }

    private function isRegex(string $routing_part, string $request_part): bool {
        if (substr($routing_part, 0, 1) == '{' && substr($routing_part, -1, 1) == '}') {
            $regex = substr($routing_part, 1, -1);
            if ($this->isNumber($request_part) && $regex == "Number") {
                return true;
            } else if ($this->isNotNumber($request_part) && $regex == "String") {
                return true;
            } else {
                //todo 1. Think what framework should do when someone misspell Regex eg. like Strnig number
                //todo 2. Allow people to use regular php regular expr. like this {<phpregex>/^[A-Za-z0-9_- ]+$/}
                //throw new AppException("Resolver can't resolve this regex: ".$URL_parts_yaml[$i]);
            }
        }
        return false;
    }

    /**
     * Iterates every char in $var and checking that specified char is (or not) a digit
     *
     * @param $var
     * @return bool
     */
    private function isNumber($var): bool {
        $size = strlen($var);
        $digits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        for($i = 0; $i < $size; $i++) {
            if( !in_array($var[$i], $digits) ) return false; //if char IS NOT a digit return false
        }
        return true;
    }

    /**
     * @param $var
     * @return bool
     */
    private function isNotNumber($var): bool {
        return !$this->isNumber($var);
    }

    /**
     * @param string|null $action
     * @return Controller
     * @throws AppException
     * @throws \ReflectionException
     */
    private function validateAction(string $action = null): Controller {
        if(is_null($action)){
            http_response_code(404);
            throw new AppException("There is no action for this url");
        }
        if (!class_exists($action)){
            throw new AppException("Class do not exist");
        }
        $refclass = new \ReflectionClass($action);
        if (!$refclass->isSubclassOf(Controller::class)){
            throw new AppException("This class is not subclass of Controller");
        }
        return $refclass->newInstance();
    }

    /**
     * @param string $path
     * @param array $routing
     * @return string|null
     */
    private function oneToOne(string $path, array $routing): ?string {
        foreach ($routing as $route){
            if ($route["path"] == $path){
                $action = $route["action"];
            }
        }
        return isset($action) ? $action : null;
    }

}