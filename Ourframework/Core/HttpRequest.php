<?php


namespace Ourframework\Core;


class HttpRequest extends Request
{

    protected function launch()
    {
        $this->setPath($_SERVER["REQUEST_URI"]);
    }
}