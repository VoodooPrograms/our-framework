<?php


namespace Ourframework\Core;

/*
 * This class should manage all configuration files
 * methods like matchRoute() or matchRegex() will be under Resolver, URLResolver classes
 * More will be discussed during meeting
 */
class SettingsManager
{
    private $reg;
    private $routing = [];
    private $dbsett = [];


    public function __construct()
    {
        $this->reg = Register::instance();
    }

    public function setRoutingTable(array $routing): void
    {
        $this->routing = $routing;
    }

    public function getRoutingTable(): array
    {
        return $this->routing;
    }

    public function setDbsett(array $dbsett): void
    {
        $this->dbsett = $dbsett;
    }

    //todo Delete this
    public function matchRoute(Request $request)
    {
        $path = $request->getPath();
        foreach ($this->routing as $route) {
            if ($route["path"] == $path) {
                $action = $route["action"];
                echo $route["path"];
                echo $path.PHP_EOL;
            }
        }
        if (is_null($action)) {
            http_response_code(404);
            return new HttpResponse();
        }
        if (!class_exists($action)) {
            // don't throw exception here
        }
        $refclass = new \ReflectionClass($action);
        if (!$refclass->isSubclassOf(Controller::class)) {
            // don't throw exception here
        }
        return $refclass->newInstance();
    }

    //todo Delete this
    public function matchRegex(Request $request)
    {
        $url = parse_url($request->getPath());
        $arr = explode("/", $url["path"]);
        $pattern = preg_quote($url["path"], "/");
        echo $pattern;
        echo "<br />";
        echo $url["path"];
        foreach ($this->routing as $route) {
            if (preg_match("/${pattern}/", $route["path"])) {
                echo "Match".PHP_EOL;
            }
            if ($route["path"] == $url["path"]) {
                // Here someone need to extend it
            }
        }
    }
}
