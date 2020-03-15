<?php


namespace Ourframework\Core;

abstract class Response
{

    abstract public function send(int $content_length, string $protocol_version): int;
}
