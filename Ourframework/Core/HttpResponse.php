<?php


namespace Ourframework\Core;

class HttpResponse extends Response
{
    protected $status = 0;
    protected $headers = [];
    protected $body = "";

    public function __construct()
    {
        $this->setDefaultHeaders();
    }

    public static function createResponse(
        string $body = "",
        array $headers = []
    ): HttpResponse {
        $response = new HttpResponse;

        if (isset($body)) {
            $response->setBody($body);
        }

        if (isset($headers)) {
            foreach ($headers as $key => $value) {
                if (is_int($key) && is_string($value)) {
                    $response->setStatus($key);
                    $response->setHeader($value);
                }
            }

            $response->setStatus(0);
        }

        return $response;
    }

    public function send(): int
    {
        echo $this->body;
        return 1;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getHeader(): string
    {
        if (!isset($this->headers[$this->status])) {
            throw new AppException(
                "HttpResponse::getHeader():" . PHP_EOL .
                "Header not set for HTTP status code " . $this->status . "."
            );
        }

        return $this->headers[$this->status];
    }

    public function setHeader(string $msg): void
    {
        $this->headers[$this->status] = $msg;
    }

    protected function setDefaultHeaders(): void
    {
        $this->headers = array(
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

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

}
