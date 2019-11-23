<?php


namespace Ourframework\Core;

/*
 * This class will be much more extended
 */
abstract class Request
{
    protected $path = "/";
    protected $properties = [];
    protected $status = 0;

    final public function __construct(){
        $this->launch();
    }

    abstract protected function launch();

    public function getProperty(string $key): string {
        if (!isset($this->properties[$key])){
            return null;
        }
        return $this->properties[$key];
    }

    public function setProperty(string $key, $val): void {
        $this->properties[$key] = $val;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function setPath(string $path): void {
        $this->path = $path;
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function setStatus(int $status): void {
        $this->status = $status;
    }
}