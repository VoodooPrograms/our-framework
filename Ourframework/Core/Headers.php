<?php


namespace Ourframework\Core;

class Headers implements \ArrayAccess
{
    protected $list = [];

    static protected $default_headers = [];

    public function __construct()
    {
        $this->default_headers = array(
            200 => "OK",
            301 => "Moved Permanently",
            400 => "Bad Request",
            401 => "Unauthorized",
            403 => "Forbidden",
            404 => "Not Found",
            405 => "Method Not Allowed",
            408 => "Request Timeout",
            500 => "Internal Server Error",
            502 => "Bad Gateway",
            504 => "Gateway Timeout",
        );
    }

    public function setDefault(?int $status): void
    {
        /* Clear current list of headers */
        $this->list = [];

        /* Add one header (optional) */
        if (isset($status)) {
            $this->addHeader($status, null);
        }
    }

    public function addHeader(int $status, string $description = null): void
    {
        if (!isset($description)) {
            $description = $this->default_headers[$status];
        }

        $this->list[$status] = $description ?? "";
    }

    public function send(int $content_length = 0, string $protocol_version = "HTTP/1.0"): void
    {
        foreach ($this->list as $status => $description) {
            header($protocol_version . " " . $status . " " . $description);
        }

        // TODO: make use of "content_length" param
    }

    public function offsetSet($offset, $value)
    {
        if (!is_null($offset)) {
            addHeader($value);
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->list[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->list[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->list[$offset] ?? "";
    }

}
