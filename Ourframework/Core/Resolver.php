<?php


namespace Ourframework\Core;

abstract class Resolver
{
    abstract public function match(Request $request, array $routing): ?Controller;
}
