<?php


namespace Ourframework\Core;

class HttpRequest extends Request
{

    protected function launch()
    {
        if (isset($_SERVER["REQUEST_URI"])) {
            $this->setPath($_SERVER["REQUEST_URI"]);
        } else {
            $this->setPath("/");
        }
    }
}
