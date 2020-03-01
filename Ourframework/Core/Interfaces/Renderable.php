<?php


namespace Ourframework\Core\Interfaces;

/*
 * All of the custom template engines should implement this method
 */
interface Renderable
{
    public function render(string $template=null, array $parr=[]);
}