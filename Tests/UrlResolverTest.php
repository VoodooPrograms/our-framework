<?php


namespace Tests;


use Ourframework\Core\AppException;
use Ourframework\Core\AppHelper;
use Ourframework\Core\Controller;
use Ourframework\Core\HttpRequest;
use Ourframework\Core\Request;
use Ourframework\Core\SettingsManager;
use Ourframework\Core\UrlResolver;
use Ourframework\User\Controllers\BlogController;
use Tests\Data\CsvIterator;
use Symfony\Component\Yaml\Yaml;

class UrlResolverTest extends \PHPUnit\Framework\TestCase
{
    private $resolver;
    private $request;

    public function setUp(): void
    {
        $this->resolver = new UrlResolver();
        $this->request = $this->createMock(HttpRequest::class);
    }

    /**
     * @dataProvider urlProvider
     */
    public function testMatch(string $url): void
    {
        $this->request->expects($this->any())
            ->method('getPath')
            ->will($this->returnValue($url));
        $routing = $this->loadConfigFile("Tests\Data\\routing_test.yaml");
        $controller = $this->resolver->match($this->request, $routing["routing"]);
        $this->assertInstanceOf(Controller::class, $controller);
    }

    public function urlProvider()
    {
        return new CsvIterator('Tests\Data\data.csv');
    }

    public function testIsNumber(): void
    {
        $ref = new \ReflectionMethod($this->resolver, "isNumber");
        $ref->setAccessible(true);
        $output = $ref->invoke($this->resolver, "0123456789");
        $this->assertTrue($output);
    }


    public function testIsNotNumber(): void
    {
        $ref = new \ReflectionMethod($this->resolver, "isNotNumber");
        $ref->setAccessible(true);

        // This should be expanded for every character from urlencode() function
        $not_numeric = implode("," ,array_merge(range('a', 'z'), range('A', 'Z')));
        $output = $ref->invoke($this->resolver, $not_numeric);
        $this->assertTrue($output);

        // Leave this
        $numeric = "0123456789";
        $isFalse = $ref->invoke($this->resolver, $numeric);
        $this->assertFalse($isFalse);
    }

    private function loadConfigFile(string $file): array
    {
        if (!file_exists($file)) {
            throw new AppException("File '$file' does not exist");
        }
        $settings = Yaml::parseFile($file);
        return $settings;
    }
}