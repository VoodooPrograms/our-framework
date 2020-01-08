<?php


namespace Ourframework\Core;

abstract class Response
{

    abstract public function send(): int;
}
