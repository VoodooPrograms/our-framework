<?php


namespace Ourframework\Core;

abstract class Request
{

    final public function __construct()
    {
        $this->launch();
    }

    abstract protected function launch();

}
