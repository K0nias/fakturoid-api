<?php declare(strict_types = 1);

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Client\ClientInterface;
use K0nias\FakturoidApi\Exception\InvalidAuthorizationException;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Response;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{

    protected function createClientMockWithStatusCode(int $statusCode)
    {
        $response = new Response($statusCode, '');

        $mock = $this->createMock(ClientInterface::class);

        $mock->method('processRequest')
            ->willReturn($response);

        return $mock;
    }

    protected function createApi(string $slug, ?ClientInterface $client = null): Api
    {
        return new Api($slug, 'email@email.cz', 'api_key', $client);
    }


    public function testUnauthorizedRequest()
    {
        $this->expectException(InvalidAuthorizationException::class);

        $api = $this->createApi('slug', $this->createClientMockWithStatusCode(401));

        $request = $this->createMock(RequestInterface::class);

        $api->process($request);
    }

    public function testRequestUrl()
    {
        $slug = 'slug';
        $api = $this->createApi($slug);


        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')
            ->willReturn(Method::post());

        $request->method('getUri')
            ->willReturn('uriTEST');

        $this->assertSame("https://app.fakturoid.cz/api/v2/accounts/{$slug}/uriTEST", $api->getRequestUrl($request));
    }

    public function testGetRequestUrlWithParameters()
    {
        $slug = 'slug';
        $api = $this->createApi($slug);


        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')
            ->willReturn(Method::get());

        $request->method('getData')
            ->willReturn(['test' => 1]);

        $request->method('getUri')
            ->willReturn('uriTEST');

        $this->assertSame("https://app.fakturoid.cz/api/v2/accounts/{$slug}/uriTEST?test=1", $api->getRequestUrl($request));
    }
}