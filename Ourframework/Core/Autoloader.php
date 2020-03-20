<?php


namespace Ourframework\Core;


class Autoloader
{
    private $loaders = [];

    public function __construct()
    {
        $this->setIncludePath();
        $this->setExtensions();
        $this->setLoaders();
        spl_autoload_register(array($this, "autoloadFromComposer"));
        spl_autoload_register(array($this, "autoloadWithNamespaces"));
        //var_dump($this->getAllLoaders());
    }


    public function setIncludePath(string $includePath = null){
        set_include_path(dirname($includePath ? $includePath : getcwd()).DIRECTORY_SEPARATOR);
    }

    public function setExtensions(string $extension = null){
        spl_autoload_extensions($extension ? $extension : ".php");
    }

    public function setLoaders(array $loaders = []){
        $ref = new \ReflectionClass($this);
        $methods = $ref->getMethods(\ReflectionMethod::IS_FINAL);
        if (!empty($loaders)){
            $this->loaders = $loaders;
        } else {
            foreach ($methods as $method){
                $this->loaders[] = $method->getName();
            }
        }
    }

    public function getAllLoaders(){
        return spl_autoload_functions();
    }

    /**
     * All Loader classes must be final and public to be register
     * @param string $path
     */
    final public function autoloadWithNamespaces(string $path){
        if (preg_match('/\\\\/', $path)) {
            $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        }
        if (file_exists(get_include_path()."${path}.php")) {
            require_once("${path}.php");
        }
    }

    /**
     * This method will be called from index.php so autoload path should stay as 'vendor/autoload.php'
     */
    final public function autoloadFromComposer(){
        require_once("vendor/autoload.php");
    }
}