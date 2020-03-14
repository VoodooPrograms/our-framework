<?php


namespace Ourframework\Core;

class HttpResponse extends Response
{
    protected $headers;
    protected $body = "";

    public function __construct()
    {
        $this->headers = new Headers;
        $this->setDefault();
    }

    public function setDefault(): void
    {
        $this->headers->setDefault(200);

        /* DEBUG */
        dump($this);
    }

    private function sendBody(): int
    {
        echo $this->getBody();
        return 1;
    }

    public function sendHeaders(int $content_length, string $protocol_version): int
    {
        $this->headers->send($content_length, $protocol_version);
        return 1;
    }

    public function send(int $content_length, string $protocol_version): int
    {
        if (!isset($this->body)) {
            throw new AppException(
                "HttResponse::send():" . PHP_EOL .
                "Body is empty!"
            );

            return 0;
        }

        $this->sendHeaders($content_length, $protocol_version);
        $this->sendBody();

        return 1;
    }

    public function getHeader(int $status): string
    {
        $result = $this->headers[$status];

        if (!isset($result)) {
            throw new AppException(
                "HttpResponse::getHeader():" . PHP_EOL .
                "Header not set for HTTP status code " . $this->status . "."
            );
        }

        return $result;
    }

    public function addHeader(int $status, string $desription = null): void
    {
        $this->headers[$this->status] = $msg;
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
