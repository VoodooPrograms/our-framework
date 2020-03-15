<?php


namespace Ourframework\Core;

class HttpRequest extends Request
{
    protected $path = "/";
    protected $status = 0;
    protected $request_method = "GET";
    protected $ip_address = "";
    protected $user_agent = "";
    protected $content_type = "";
    protected $content_length = 0;
    protected $cookies = [];
    protected $properties = [];

    protected function launch()
    {
        $this->setPath($_SERVER["REQUEST_URI"]);
        $this->setRequestMethod($_SERVER["REQUEST_METHOD"]);
        $this->setIpAddress($_SERVER["SERVER_NAME"]);
        $this->setUserAgent($_SERVER["HTTP_USER_AGENT"]);
        $this->setContentType($_SERVER["CONTENT_TYPE"]);
        $this->setContentLength($_SERVER["CONTENT_LENGTH"]);
        $this->setCookies($_COOKIE);

        //dump($this);
//        printf("<br>" .
//        "<div style=\"margin:16px;padding:16px;background-color:#FFFFC0\">" .
//        "<code><span style=\"font-size:150%%\">" .
//        "<b>(DEBUG) HttpRequest constructor called:</b></span>" . PHP_EOL);
//        printf("<br><i>[path]</i> "); var_dump($this->getPath());
//        printf("<br><i>[status]</i> "); var_dump($this->getStatus());
//        printf("<br><i>[request_method]</i> "); var_dump($this->getRequestMethod());
//        printf("<br><i>[ip_address]</i> "); var_dump($this->getIpAddress());
//        printf("<br><i>[user_agent]</i> "); var_dump($this->getUserAgent());
//        printf("<br><i>[content_type]</i> "); var_dump($this->getContentType());
//        printf("<br><i>[content_length]</i> "); var_dump($this->getContentLength());
//        printf("<br></code></div><br>" . PHP_EOL);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path = $path;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getRequestMethod(): string
    {
        return $this->request_method;
    }

    public function setRequestMethod(?string $method): void
    {
        $this->request_method = $method ?? "GET";
    }

    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    public function setIpAddress(?string $address): void
    {
        $this->ip_address = $address ?? "";
    }

    public function getUserAgent(): string
    {
        return $this->user_agent;
    }

    public function setUserAgent(?string $user_agent): void
    {
        $this->user_agent = $user_agent ?? "";
    }

    public function getContentType(): string
    {
        return $this->content_type;
    }

    public function setContentType(?string $content_type): void
    {
        $this->content_type = $content_type ?? "";
    }

    public function getContentLength(): int
    {
        return $this->content_length;
    }

    public function setContentLength(?int $content_length): void
    {
        $this->content_length = $content_length ?? 0;
    }

    public function getCookie(string $name)
    {
        if (!isset($this->cookies[$name])) {
            throw new AppException("(HTTP REQUEST) Cookie \"" . $name . "\" is not set!");
        }

        return $this->cookies[$name];
    }

    public function setCookies(array $cookies): void
    {
        $this->cookies = $cookies;
    }

    public function getProperty(string $key): string
    {
        return $this->properties[$key];
    }

    public function setProperty(string $key, $val): void
    {
        $this->properties[$key] = $val;
    }

}
