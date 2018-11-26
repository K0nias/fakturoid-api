<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Client\ClientInterface;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Response;
use K0nias\FakturoidApi\Tests\Http\Request\Mock\SluglessRequestMock;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{

    protected function createClientMockWithStatusCode(int $statusCode): ClientInterface
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


    public function testUnauthorizedRequest(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidAuthorizationException::class);

        $api = $this->createApi('slug', $this->createClientMockWithStatusCode(401));

        $request = $this->createMock(RequestInterface::class);

        $api->process($request);
    }

    public function testRequestUrlWithoutSlug(): void
    {
        $slug = 'slug';
        $api = $this->createApi($slug);

        $request = new SluglessRequestMock();

        $this->assertSame('https://app.fakturoid.cz/api/v2/slug_less_uri.json', $api->getRequestUrl($request));
    }

    public function testRequestUrl(): void
    {
        $slug = 'slug';
        $api = $this->createApi($slug);

        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')
            ->willReturn(Method::post());

        $request->method('getUri')
            ->willReturn('uriTEST');

        $this->assertSame(sprintf('https://app.fakturoid.cz/api/v2/accounts/%s/uriTEST', $slug), $api->getRequestUrl($request));
    }

    public function testGetRequestUrlWithParameters(): void
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

        $this->assertSame(sprintf('https://app.fakturoid.cz/api/v2/accounts/%s/uriTEST?test=1', $slug), $api->getRequestUrl($request));
    }

}
